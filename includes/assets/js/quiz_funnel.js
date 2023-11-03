jQuery(document).ready(function() {
  rbt_call_selecte_drop_down();


  jQuery('.rbt_quiz_funnel_field_outer_div .quiz_form_id').on('select2:selecting', function(e) {
    
    var form_id = e.params.args.data.id;
    rbtq_select_for_funnel(this,form_id);

  });
});

function rbtq_funnel_reload_new_question(obj = ''){
  var form_id = jQuery(document).find('.rbt_quiz_funnel_field_outer_div .quiz_form_id').val();
  rbtq_select_for_funnel(obj,form_id, funnel_action = 'load_new_question');
}

function rbtq_funnel_reset_connection(obj = ''){
  var current_obj = jQuery(this);
      swal({
            title: 'Reset connections',
            text: '',
            //type: "warning",
            showCancelButton: true,
            showCloseButton: true,
            confirmButtonColor: "#007bff",
            confirmButtonText: "Yes",
            customClass: '',
            
      }).then((result) => {
            if (result.value) {
              var form_id = jQuery(document).find('.rbt_quiz_funnel_field_outer_div .quiz_form_id').val();
             rbtq_select_for_funnel(obj,form_id, funnel_action = 'reset_connction');
           }
      });
}

function rbtq_funnel_save(obj = ''){

  var form_id = jQuery('.rbt_quiz_funnel_field_outer_div .rbt_select2_drop_down').val();

   var quiz_branching_enable = jQuery('input#quiz_branching_enable').prop('checked');
   if(quiz_branching_enable){
      quiz_branching_enable = 'Y';
   }else{
      quiz_branching_enable = 'N';
   }
  var funnel_data = editor.export();
  funnel_data = JSON.stringify(funnel_data);
  var send_data = {'form_id':form_id,'quiz_branching_enable':quiz_branching_enable, 'funnel_data':funnel_data, 'type':'save_quiz_funnel','action':'save_quiz_funnel'};
  var response = rbt_call_ajax_data(obj, send_data,false,true);
}



function rbtq_select_for_funnel(obj = '', form_id = 0, funnel_action = ''){
  
  console.log("form_id");
  console.log(form_id);
  jQuery('.rbt_funnel_options').hide();
  jQuery('#drawflow').html('');
  var current_obj = obj;
  console.log("rbt_quiz_select_for_funnel call");
  var send_data = {'form_id':form_id, 'type':'load_quiz_funnel','action':'load_quiz_funnel', 'funnel_action':funnel_action};
  var response = rbt_call_ajax_data(obj, send_data);
  if(response.success){
      jQuery('.rbt_funnel_options').show();
      console.log(response.drawflowArr);
      rbtCreateBranch(JSON.stringify(response.drawflowArr),response);  
      editor.zoom_out();
      editor.zoom_out();
  }
}

 function  rbt_alignment_answer_node_style(){
  jQuery('.parent-node').each(function(){
  var ans_top_list =  [] 
  jQuery(this).find('.funnel_answer_title').each(function(){
    var x = jQuery(this).position();
    var ans_top = x.top;
    ans_top_list.push(ans_top);
  });
  
  jQuery(this).find('.outputs .output').each(function(index){
    jQuery(this).css({'position': 'absolute','bottom': 0,'right': '-10px',top: (ans_top_list[index]+10)+'px'});
  });
  
  
  var node_id = jQuery(this).find('.drawflow-node').attr('id');
  editor.updateConnectionNodes(node_id);
  
  });
}


function rbtCreateBranch(drawflowArr, response){

    //drawflowArr = JSON.parse(drawflowArr);
    //drawflowArr = jQuery.trim(drawflowArr); 
  
    console.log("drawflowArr");
    console.log(drawflowArr);
    drawflowArr = JSON.parse(drawflowArr);
  
    console.log(drawflowArr);
   // editor.drawflow = {"drawflow":{"Home":{"data":{"1":{"id":1,"name":"welcome","data":{},"class":"welcome","html":"\n    <div>\n      <div class=\"title-box\">👏 Welcome!!</div>\n      <div class=\"box\">\n        <p>Simple flow library <b>demo</b>\n        <a href=\"https://github.com/jerosoler/Drawflow\" target=\"_blank\">Drawflow</a> by <b>Jero Soler</b></p><br>\n\n        <p>Multiple input / outputs<br>\n           Data sync nodes<br>\n           Import / export<br>\n           Modules support<br>\n           Simple use<br>\n           Type: Fixed or Edit<br>\n           Events: view console<br>\n           Pure Javascript<br>\n        </p>\n        <br>\n        <p><b><u>Shortkeys:</u></b></p>\n        <p>🎹 <b>Delete</b> for remove selected<br>\n        💠 Mouse Left Click == Move<br>\n        ❌ Mouse Right == Delete Option<br>\n        🔍 Ctrl + Wheel == Zoom<br>\n        📱 Mobile support<br>\n        ...</p>\n      </div>\n    </div>\n    ","typenode": false, "inputs":{},"outputs":{},"pos_x":50,"pos_y":150},"2":{"id":2,"name":"slack","data":{},"class":"slack","html":"\n          <div>\n            <div class=\"title-box\"><i class=\"fab fa-slack\"></i> Slack chat message</div>\n          </div>\n          ","typenode": false, "inputs":{"input_1":{"connections":[{"node":"7","input":"output_1"}]}},"outputs":{},"pos_x":1028,"pos_y":87},"3":{"id":3,"name":"telegram","data":{"channel":"channel_2"},"class":"telegram","html":"\n          <div>\n            <div class=\"title-box\"><i class=\"fab fa-telegram-plane\"></i> Telegram bot</div>\n            <div class=\"box\">\n              <p>Send to telegram</p>\n              <p>select channel</p>\n              <select df-channel>\n                <option value=\"channel_1\">Channel 1</option>\n                <option value=\"channel_2\">Channel 2</option>\n                <option value=\"channel_3\">Channel 3</option>\n                <option value=\"channel_4\">Channel 4</option>\n              </select>\n            </div>\n          </div>\n          ","typenode": false, "inputs":{"input_1":{"connections":[{"node":"7","input":"output_1"}]}},"outputs":{},"pos_x":1032,"pos_y":184},"4":{"id":4,"name":"email","data":{},"class":"email","html":"\n            <div>\n              <div class=\"title-box\"><i class=\"fas fa-at\"></i> Send Email </div>\n            </div>\n            ","typenode": false, "inputs":{"input_1":{"connections":[{"node":"5","input":"output_1"}]}},"outputs":{},"pos_x":1033,"pos_y":439},"5":{"id":5,"name":"template","data":{"template":"Write your template"},"class":"template","html":"\n            <div>\n              <div class=\"title-box\"><i class=\"fas fa-code\"></i> Template</div>\n              <div class=\"box\">\n                Ger Vars\n                <textarea df-template></textarea>\n                Output template with vars\n              </div>\n            </div>\n            ","typenode": false, "inputs":{"input_1":{"connections":[{"node":"6","input":"output_1"}]}},"outputs":{"output_1":{"connections":[{"node":"4","output":"input_1"},{"node":"11","output":"input_1"}]}},"pos_x":607,"pos_y":304},"6":{"id":6,"name":"github","data":{"name":"https://github.com/jerosoler/Drawflow"},"class":"github","html":"\n          <div>\n            <div class=\"title-box\"><i class=\"fab fa-github \"></i> Github Stars</div>\n            <div class=\"box\">\n              <p>Enter repository url</p>\n            <input type=\"text\" df-name>\n            </div>\n          </div>\n          ","typenode": false, "inputs":{},"outputs":{"output_1":{"connections":[{"node":"5","output":"input_1"}]}},"pos_x":341,"pos_y":191},"7":{"id":7,"name":"facebook","data":{},"class":"facebook","html":"\n        <div>\n          <div class=\"title-box\"><i class=\"fab fa-facebook\"></i> Facebook Message</div>\n        </div>\n        ","typenode": false, "inputs":{},"outputs":{"output_1":{"connections":[{"node":"2","output":"input_1"},{"node":"3","output":"input_1"},{"node":"11","output":"input_1"}]}, "output_2":{"connections":[{"node":"2","output":"input_1"},{"node":"3","output":"input_1"},{"node":"11","output":"input_1"}]}},"pos_x":347,"pos_y":87},"11":{"id":11,"name":"log","data":{},"class":"log","html":"\n            <div>\n              <div class=\"title-box\"><i class=\"fas fa-file-signature\"></i> Save log file </div>\n            </div>\n            ","typenode": false, "inputs":{"input_1":{"connections":[{"node":"5","input":"output_1"},{"node":"7","input":"output_1"}]}},"outputs":{},"pos_x":1031,"pos_y":363}}},"Other":{"data":{"8":{"id":8,"name":"personalized","data":{},"class":"personalized","html":"\n            <div>\n              Personalized\n            </div>\n            ","typenode": false, "inputs":{"input_1":{"connections":[{"node":"12","input":"output_1"},{"node":"12","input":"output_2"},{"node":"12","input":"output_3"},{"node":"12","input":"output_4"}]}},"outputs":{"output_1":{"connections":[{"node":"9","output":"input_1"}]}},"pos_x":764,"pos_y":227},"9":{"id":9,"name":"dbclick","data":{"name":"Hello World!!"},"class":"dbclick","html":"\n            <div>\n            <div class=\"title-box\"><i class=\"fas fa-mouse\"></i> Db Click</div>\n              <div class=\"box dbclickbox\" ondblclick=\"showpopup(event)\">\n                Db Click here\n                <div class=\"modal\" style=\"display:none\">\n                  <div class=\"modal-content\">\n                    <span class=\"close\" onclick=\"closemodal(event)\">&times;</span>\n                    Change your variable {name} !\n                    <input type=\"text\" df-name>\n                  </div>\n\n                </div>\n              </div>\n            </div>\n            ","typenode": false, "inputs":{"input_1":{"connections":[{"node":"8","input":"output_1"}]}},"outputs":{"output_1":{"connections":[{"node":"12","output":"input_2"}]}},"pos_x":209,"pos_y":38},"12":{"id":12,"name":"multiple","data":{},"class":"multiple","html":"\n            <div>\n              <div class=\"box\">\n                Multiple!\n              </div>\n            </div>\n            ","typenode": false, "inputs":{"input_1":{"connections":[]},"input_2":{"connections":[{"node":"9","input":"output_1"}]},"input_3":{"connections":[]}},"outputs":{"output_1":{"connections":[{"node":"8","output":"input_1"}]},"output_2":{"connections":[{"node":"8","output":"input_1"}]},"output_3":{"connections":[{"node":"8","output":"input_1"}]},"output_4":{"connections":[{"node":"8","output":"input_1"}]}},"pos_x":179,"pos_y":272}}}}}
    editor.drawflow = drawflowArr;

    if(response.max_funnel_questions_active){
      jQuery('#drawflow').addClass('max_funnel_questions_active');
    }else{
      jQuery('#drawflow').removeClass('max_funnel_questions_active');
    }

    if(response.quiz_branching_enable && (response.quiz_branching_enable == 'Y')){
        jQuery('input#quiz_branching_enable').prop('checked',true);
    }else{
        jQuery('input#quiz_branching_enable').prop('checked',false);
    }
    editor.start();

    if(typeof response != 'undefined'){
      if(typeof response.funeel_answer_delete_ids != 'undefined'){
        jQuery.each(response.funeel_answer_delete_ids , function(key, value){
        jQuery.each(value, function(num, output){
          
          var rbt_str = output;
          var rbt_str_array = rbt_str.split("_");
          
          
          var new_number = rbt_str_array[1]-num;
          output = rbt_str_array[0]+'_'+new_number;
          
          editor.removeNodeOutput(key, output); 
        });
        });
      }
  }

  editor.zoom_reset();
    
  rbt_alignment_answer_node_style(); 
  return false;
   
} 
