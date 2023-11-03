jQuery('document').ready(function(){
	
	/*  chat event start here */
	if(jQuery('.chatbot-open-container').length != 0){
		
		jQuery(document).on("click", ".chatbot-open-container", function(){
			var current_obj = jQuery(this);
			rbtShowChatBox(current_obj);
		});
		
		jQuery(document).on('click',function(event){

			if(!jQuery(event.target).closest('.rbt-chat-contanier').length && !jQuery(event.target).closest('.chatbot-open-container').length){
			   var current_obj = jQuery(this);
			   rbtHideChatBox(current_obj);
			}
		});
		
		jQuery(document).on("click", ".chatbot-new-message-send-button", function(){
			var current_obj = jQuery(this);
			rbtChatSendMsgAjax(current_obj);
		});
	}
	/*  chat event start end */
});


/* chat function start here */

function rbtShowChatBox(current_obj){
	jQuery(current_obj).closest('.rbt_frontend_outer_div').find(".rbt-chat-contanier").show(500,'swing');
}

function rbtHideChatBox(current_obj){
	jQuery(".rbt-chat-contanier").hide(500,'swing');
}

function rbtChatAddMessage(current_obj,type, text) {
	
	if(text == 'loader'){
		var messageDiv = '<div class="rbt-chat-message chatbot-received-messages chat-loader-wrapper"><p><div class="dot-pulse"></div></p></div>';
	}else if (type == "sent") {
		var messageDiv = '<div class="rbt-chat-message chatbot-sent-messages"><p>'+text+'</p></div>';
	} else if (type == "received") {
		var messageDiv = '<div class="rbt-chat-message chatbot-received-messages"><p>'+text+'</p></div>';
	}

	jQuery(current_obj).closest('.rbt_frontend_outer_div').find(".rbt-chat-messages").prepend(messageDiv);
}


function rbtChataddLoader(current_obj) {
	rbtChatGenerateResponse(current_obj,'loader');
}

function rbtChatRemoveLoader(current_obj) {
	jQuery(current_obj).closest('.rbt_frontend_outer_div').find(".rbt-chat-contanier .chat-loader-wrapper").remove();
}


function rbtChatGenerateResponse(current_obj,prompt) {
     rbtChatAddMessage(current_obj,"received", prompt);
}


function rbtChatSendMsgAjax(current_obj) {
	
	var parent_obj = jQuery(current_obj).closest('.rbt_frontend_outer_div');
	newText = parent_obj.find(".chatbot-input").val();
	if (newText != "") {
		//parent_obj.find(".chatbot-input").val('');
		rbtChatAddMessage(current_obj,"sent", newText);
		rbtChataddLoader(current_obj);
		var form_id = parent_obj.find('input[name="rbt_form_id"]').val();
		parent_obj.find(".chatbot-input").val('');
		
		setTimeout(function(){
			
			var send_data = {action_name:'save_form_fe',form_id:form_id,msg:newText,action_type:'chat_query'};
			var response =  rbt_call_ajax_data(this,send_data,'');
			console.log("+++++++++ response ++++++++++++");
			console.log(response);
			rbtChatRemoveLoader(current_obj);
			if(response.success){
				rbtChatGenerateResponse(current_obj,response.system_chat_response);
				return false;
			}
			
		},100);
		/*   
		if(response.error){
				alert(response.error);
				return false;
		}
		
		
		*/
	}
}

/* chat function start here */

