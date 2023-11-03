
(function($) {
    $.fn.rbtQuizInit = function( options ) {
		 
    	 var $this = $(this);
    	 var this_id = $this.attr('id');
    	 var show_screen_animation = $this.find('input[type="hidden"][name="show_screen_animation_type"].rbt_hidden_field_fe').val();
    	 var quiz_form_id = $this.find('input[name="rbt_form_id"]').val();

    	 var show_screen_animation_class = '';
    	
    	this.init = function(){
        	this.beforeStart();
        	this.startScreenBtnTrigger();
        	this.optInScreenAction();
        	this.QuestionScreenSubmitBtnTrigger();
        	this.QuestionScreenAnswerSelectedTrigger();
        	this.OutcomeScreenSubmitBtnTrigger();
        };
        
        userRegister = function(parent_obj,form_fields) {
	  
		   var send_data = {action_name:'save_form_fe',form_id:quiz_form_id,form_fields:form_fields,action_type:'quiz_user_registration'};
		   var output =	 rbt_call_ajax_data(this,send_data,'');
		   return output;
		}

         this.beforeStart = function(){
			if(show_screen_animation == 'show_left_right'){
				show_screen_animation_class = 'quiz_screen_slide_right_show';
			}else if(show_screen_animation == 'show_right_left'){
				show_screen_animation_class = 'quiz_screen_slide_left_show';
			}
         };
         
         errorMsgHtml= function(msg = '') {
			 var html = '<div class="rbt_field_error_msg">'+msg+'</div>';
			 return html;
		 }
		 
         nextShowScreen= function(parent_obj = '', current_obj = '') {
			 
			  if(jQuery(parent_obj).length != 0 ){
				  rbtErrorSuccessMsgHtmlHide(this_id);
				  var screen_name = jQuery(parent_obj).attr('data-screen');
				  console.log("screen_name "+screen_name);
				  var next_selector =  parent_obj.next('.template_quiz_item_html_wrapper');
				  if(screen_name == 'start'){
				  }else if(screen_name == 'opt_in'){
				  }else if(screen_name == 'questions'){
					
					var next_question_has = current_obj.closest('.template_html_question').next('.template_html_question').length;
					
					if(next_question_has != 0 ){
						parent_obj = current_obj.closest('.template_html_question');
						next_selector =  parent_obj.next('.template_html_question');
					}else{
						parent_obj = current_obj.closest('.template_quiz_item_html_wrapper');
						next_selector =  parent_obj.next('.template_quiz_item_html_wrapper');
						next_selector.find('.rbtqresult_template_wrapper:first').show();
					}
					parent_obj.find('.q_errors_wrapper').html('');
					
				  }else if(screen_name == 'outcomes'){
					  
				  }else{
					  return false;
				  }
				  
				  parent_obj.hide();
				  next_selector.addClass(show_screen_animation_class).removeClass('rbt_display_none' );
				  
				  
			  }
		};
		
		 previousShowScreen= function(parent_obj = '', current_obj = '') {
			  if(jQuery(parent_obj).length != 0 ){
				  rbtErrorSuccessMsgHtmlHide(this_id);
				  var screen_name = jQuery(parent_obj).attr('data-screen');
				  console.log("screen_name "+screen_name);
				  var next_selector =  parent_obj.prev('.template_quiz_item_html_wrapper');
				  if(screen_name == 'start'){
				  }else if(screen_name == 'opt_in'){
				  }else if(screen_name == 'questions'){
					
					var next_question_has = current_obj.closest('.template_html_question').prev('.template_html_question').length;
					
					if(next_question_has != 0 ){
						parent_obj = current_obj.closest('.template_html_question');
						next_selector =  parent_obj.prev('.template_html_question');
						console.log( '+++1+++' );
					}else{
						parent_obj = current_obj.closest('.template_quiz_item_html_wrapper');
						next_selector =  parent_obj.prev('.template_quiz_item_html_wrapper');
						console.log(' +++2+++ ');
					}
					parent_obj.find('.q_errors_wrapper').html('');
					
				  }else if(screen_name == 'outcomes'){
				  }else{
					  return false;
				  }
				  
				  parent_obj.addClass('rbt_display_none');
				  next_selector.addClass(show_screen_animation_class).addClass('rbt_display_none').show();
				  
			  }
		};


        this.startScreenBtnTrigger = function(){

        	 $this.on('click','.template_quiz_item_html_wrapper .rbtq-start-btn', function(){
				 
        	 	var current_obj = jQuery(this);
        	 	 var send_data = {action_name:'save_form_fe',form_id:quiz_form_id,action_type:'quiz_start_screen_trigger'};
				 var return_data =	 rbt_call_ajax_data(this,send_data,'');
				if(return_data.error){
					rbtErrorSuccessMsgHtmlShow(this_id,rbtErrorHtml(return_data.error));
					return false; 	
				}else if(!return_data.success){
					return false; 	
				}
        	 	
				var parent_selector = jQuery(current_obj).closest('.template_quiz_item_html_wrapper');
				nextShowScreen(parent_selector);
				
            });
        }

        this.optInScreenAction = function(){
			
        	 $this.on('click','.template_quiz_item_html_wrapper .skip_optin', function(){
				 var current_obj = jQuery(this);
				 var parent_selector = jQuery(current_obj).closest('.template_quiz_item_html_wrapper'); 
				 nextShowScreen(parent_selector);
		     });
		     
		     var form_obj = jQuery(this).find('.rbtq_signup_form');
        	  var form_id =  form_obj.attr('id');	 
				 
        	 $this.on('click','.template_quiz_item_html_wrapper .rbtqoptin_continue_btn', function(){
				 
				var current_obj = jQuery(this);
				var parent_selector = jQuery(current_obj).closest('.template_quiz_item_html_wrapper'); 
				rbtErrorSuccessMsgHtmlHide(this_id);
				var form_fields = form_obj.serializeArray();
				console.log(form_id);
        	 	var from_validation_status = rbt_form_validation(form_id, '',form_obj);

        	 	if(from_validation_status){
        	 		return false;
        	 	}  
        	 	
        	 	
        	 	var return_data = userRegister($this,form_fields);  
        	 	console.log('return_data');
        	 	console.log(return_data);    
        	 	if(return_data.error){
					rbtErrorSuccessMsgHtmlShow(this_id,rbtErrorHtml(return_data.error));
					return false; 	
				}else if(!return_data.success){
					return false; 	
				}
			
				nextShowScreen(parent_selector);
                
            });
        }


        this.QuestionScreenAnswerSelectedTrigger = function(){
			
			 $this.on('click','.template_html_questions .rbtq_question_ans_item', function(){
        	 	var current_obj = jQuery(this);
				var parent_selector = jQuery(current_obj).closest('.template_quiz_item_html_wrapper.template_html_questions');
				var ans_parent_selector = jQuery(current_obj).closest('.question_add_answer_outer_main_div');
				
				var parent_question_selector = jQuery(current_obj).closest('.template_html_question');
				
				var question_type = parent_question_selector.attr('data-q-type');
				if(question_type == 'multi'){
					
				}else{
					ans_parent_selector.find('.rbtq_question_ans_item').removeClass('answer_selected');
				}
				current_obj.toggleClass('answer_selected');
			});
			
		}
		
        this.QuestionScreenSubmitBtnTrigger = function(){
        	
			
			 $this.on('click','.template_html_questions .q_prev_btn', function(){
				 var current_obj = jQuery(this);
        	 	 var parent_selector = current_obj.closest('.template_quiz_item_html_wrapper.template_html_questions');
				 previousShowScreen(parent_selector,current_obj);

			 });
			 
			 $this.on('click','.template_html_questions .skip_question', function(){
				 var current_obj = jQuery(this);
        	 	 var parent_selector = current_obj.closest('.template_quiz_item_html_wrapper.template_html_questions');
        	 	 nextShowScreen(parent_selector ,current_obj);
			 });
			 $this.on('click','.template_html_questions .q_next_btn', function(){
				var current_obj = jQuery(this);
        	 	var parent_selector = current_obj.closest('.template_quiz_item_html_wrapper.template_html_questions');
        	 	var parent_question_selector = current_obj.closest('.template_html_question');
        	 	var answer_selector = parent_question_selector.find('.rbtq_question_ans_item.answer_selected');
				var answer_selector_length = answer_selector.length;
				var question_skip = parent_question_selector.attr('data-q-skip');
				var question_error_msg = parent_question_selector.attr('data-q-error-msg');
				
				if(answer_selector_length == 0 && question_skip == 'N'){
					parent_question_selector.find('.q_errors_wrapper').html(errorMsgHtml(question_error_msg));
					return false;
				}
				
				nextShowScreen(parent_selector ,current_obj);
				
			 });
			 
			 
			 $this.on('click','.template_html_questions .rbtq_question_ans_item', function(){
				 
				 
        	 	var current_obj = jQuery(this);
        	 	var parent_selector = current_obj.closest('.template_quiz_item_html_wrapper.template_html_questions');
				var parent_question_selector = current_obj.closest('.template_html_question');
				var parent_questions_selector = current_obj.closest('.template_quiz_item_html_wrapper.template_html_question');
				var answer_selector = parent_question_selector.find('.rbtq_question_ans_item.answer_selected');
				var answer_selector_length = answer_selector.length;
				var question_id = 0;
				var answer_ids = [];
				
				question_id = parent_question_selector.attr('data-q-id');
				var question_type = parent_question_selector.attr('data-q-type');
				if(answer_selector_length != 0){
					
					answer_selector.each(function(){
						answer_id = answer_selector.closest('.template_html_answer').attr('data-qa-id');
						answer_ids.push(answer_id);

					});
				}
				
				console.log("question_id "+question_id);
				console.log("answer_ids ");
				console.log(answer_ids);
				console.log("question_type ");
				console.log(question_type);
				
				if(question_type != 'multi'){
					nextShowScreen(parent_selector ,current_obj);
			    }
				
            });
        }


        this.OutcomeScreenSubmitBtnTrigger = function(){
        	 $this.on('click','.template_quiz_item_html_wrapper .rbtq_result_continue_btn', function(){
        	 	var current_obj = jQuery(this);
        	 	alert("Thanks for take the quiz");
            });
        }

        return this.init();

    }
}( jQuery ));



jQuery(document).ready(function(){    
    if(jQuery('.rbt_form_outer_quiz').length > 0){
        jQuery( ".rbt_form_outer_quiz" ).each(function( index,element ) {
            if(!jQuery(this).hasClass('rbt-js-render')){
                var id = jQuery(this).attr('id');
                jQuery(this).addClass('rbt-js-render');
                jQuery('#'+id).rbtQuizInit();
            }
        });
    }
});


