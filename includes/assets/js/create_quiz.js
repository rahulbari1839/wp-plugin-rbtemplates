jQuery(document).ready(function(){
    rbt_console_log('my test case');
    rbtq_add_temp_customizer_init();
    rbt_change_placehoder('rbt_field_change_placehoder');
    rbt_mediauploader_image(img_resizeable_call = 'Y');
   
    rbt_template_drag_drop_element_customizer_init();
   // rbt_template_drag_drop_element_customizer_level_2_init();
    rbt_drag_drop_element_delete();
    rbtValidateTabs(tab_class = 'rbt_tabs');

    rbtq_rbtq_dropdown_custom_list_value_select_event();
    rbtq_rbtq_events();

    rbtq_add_ans_all_common_plugins_on_page_load();
     rbt_template_sortable_element_customizer_init('rbt_templates_tabs_outer','rbt_ul_li','Drop Here');
   

});

function rbt_refesh_customizer_values(obj){

    var current_obj = obj;
    jQuery(current_obj).closest('.customized-optional').find('.rbt_enable_color_customizer').each(function(){
        jQuery(this).trigger('change');
    });

    jQuery(current_obj).closest('.customized-optional').find('.rbt_enable_progress_customizer').each(function(){
        jQuery(this).trigger('change');
    });

    jQuery(current_obj).closest('.customized-optional').find('.rbt_enable_select_customizer').each(function(){
        jQuery(this).trigger('change');
    });
}

function rbtq_add_ans_all_common_plugins_on_page_load(question_type = ''){
    rbt_tiny_mce_editor();
    rbt_img_resizeable();
    rbt_template_sortable_element_customizer_init('rbt_template_enable_sortable_outer','rbt_template_enable_sortable_item_section');
}

function rbtq_rbtq_events(){


    // question answer tick is correct 
    jQuery(document).on('click','#rbt_tab_2 input[name="show_ans_tag_option"]',function(){
        var selector = jQuery('.template_html_wrapper .question_add_answer_outer_div  .ans_tag_outer_wrapper');
        if(jQuery(this).prop('checked')){
            selector.show();
        }else{
            selector.hide();
        }
    });

     // tick currect answer on question screen
    jQuery(document).on('click','.rbtq_question_is_right_ans',function() {
        var rbt_is_checked = jQuery(this).prop('checked');
        var outer_obj = jQuery(this).closest('.template_html_wrapper');
        var question_type = outer_obj.find('.rbtq_quest_ans_type_value').attr('value');
        if(question_type == 'single'){
            jQuery(this).closest('.rbtq_question_ans_item').siblings().find('.rbtq_question_is_right_ans').prop('checked',false);
        }
       if(rbt_is_checked){
            console.log('test');
            jQuery(this).attr('checked',true).addClass('fffffffff');
        }else{
             jQuery(this).removeAttr('checked');
              console.log('test1111');
        }
        
    });
    // optin skip button event 
    jQuery(document).on('click','.rbtq_optin_skip_enable_checkbox',function(){
        if(jQuery(this).prop('checked')){
            jQuery('.quiz_optin_template_outer').find('.skip_optin').show();
        }else{
           jQuery('.quiz_optin_template_outer').find('.skip_optin').hide();
        }
    });

    // question skip button event 
    jQuery(document).on('click','.rbtq_question_skip_enable_checkbox',function(){
        if(jQuery(this).prop('checked')){
            jQuery(this).closest('.template_html_wrapper').find('.skip_question').show();
        }else{
            jQuery(this).closest('.template_html_wrapper').find('.skip_question').hide();
        }
    });


     // Enable answer with image option 
    jQuery(document).on('click','.rbtq_question_ans_with_img_enable_checkbox',function(){
        if(jQuery(this).prop('checked')){
            jQuery(this).closest('.template_html_wrapper').find('.question_add_answer_outer_div').addClass('ans_with_img_enable');
        }else{
           jQuery(this).closest('.template_html_wrapper').find('.question_add_answer_outer_div').removeClass('ans_with_img_enable');
        }
    });


     // delete questin answer event 
    jQuery(document).on('click','.rbtq_question_ans_delete_btn',function(){
       
       var current_obj = jQuery(this);
        swal({
            title: rbt_global_quiz_delete_action_title,
            text: rbt_global_quiz_delete_action_des,
            //type: "warning",
            showCancelButton: true,
            showCloseButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Delete!",
            customClass: '',
            
        }).then((result) => {
            if (result.value) {
               var delete_ans_id = jQuery(current_obj).closest('.rbtq_question_ans_item').attr('data-db-id');
               var delete_attr_id = jQuery(current_obj).closest('.rbtq_question_ans_item').attr('id');
               jQuery(current_obj).closest('.rbtq_question_ans_item').remove();
               var delete_form_screen = 'answer';
               var send_data = {'type':'delete_quiz_item_by_screen','action':'delete_quiz_item_by_screen', delete_form_screen,'delete_db_id':delete_ans_id};
                rbt_call_ajax_data(current_obj, send_data);

                

                 jQuery(document).find('#outcome_mapping_ans_'+delete_attr_id).remove();

            }
        });
    });


    jQuery(document).on('click','.rbtq_question_ans_input',function() {
        jQuery(this).focus(); 
        if(jQuery(this).closest('.rbt_template_enable_sortable_outer').length !=0){
            jQuery(this).addClass('rbt_template_disable_sortable_outer'); 
            return false;
        }
    });

    jQuery(document).on('blur','.rbtq_question_ans_input',function() {

        if(jQuery(this).closest('.rbt_template_enable_sortable_outer').length !=0){
            jQuery(this).removeClass('rbt_template_disable_sortable_outer'); 
            return false;
        }
    });

    jQuery(document).on('click','.quiz_type_wrapper input[name="quiz_type"]',function() {
        jQuery('.quiz_type_wrapper .quiz-radio-btn--outer').removeClass('checked_cls');
        jQuery(this).closest('.quiz-radio-btn--outer').addClass('checked_cls');

        var quiz_type =  jQuery(this).val();
        // hide and show some of the section on the base of Quiz type
        //jQuery('.quiz_question_template_outer .answer-options').hide();
        jQuery('.quiz_question_template_outer .rbtq_question_is_right_ans_checkbox_outer').hide();
        jQuery('.quiz_question_template_outer .ans_poins_outer_wrapper ').hide();
        if(quiz_type == 'personality'){
            
        }else if(quiz_type == 'scoring'){
            //jQuery('.quiz_question_template_outer .answer-options').show();
             jQuery('.quiz_question_template_outer .ans_poins_outer_wrapper ').show();
        }else if(quiz_type == 'assessment'){
             //jQuery('.quiz_question_template_outer .answer-options').show();
             jQuery('.quiz_question_template_outer .rbtq_question_is_right_ans_checkbox_outer').show();
            
        }
            rbt_console_log("quiz_type:"+quiz_type);
    });


    // multiple select drop down toggle
    jQuery(document).on('click','.multi-select-dropdown-link',function(){    
        jQuery(this).find('.fa').toggleClass('fa-angle-up fa-angle-down');
        jQuery(this).closest('.multi-select-dropdown').find('.multi-select-dropdown-list').toggle('slow');
    });

    // change ans text on outcome mapping screen
    jQuery(document).on('change keyup paste','.rbtq_question_ans_item_inner .rbt_tiny_mce_editor',function() {
        var ans_text = jQuery(this).text();
        var ans_attr_id = jQuery(this).closest('.rbtq_question_ans_item').attr('id');
        jQuery(document).find("#outcome_mapping_ans_"+ans_attr_id+' .ans_text_outcome_mapping').text(ans_text);
    });

    //manage_ans_tags_show_hide
    jQuery(document).on('click','.manage_ans_tags_show_hide',function() {
        var parent_obj = jQuery(this).closest('.ans_tag_outer_wrapper');
         jQuery(this).closest('.rbtq_question_ans_item').siblings().find('select[name="ans_tags"]').hide();
        parent_obj.find('select[name="ans_tags"]').toggle('slow');
    });


     //manage_outcome_tags_show_hide
    jQuery(document).on('click','.manage_outcome_tags_show_hide',function() {
        var parent_obj = jQuery(this).closest('.outcome_title_wrapper');
        parent_obj.find('select[name="outcome_tags"]').toggle('slow');
    });


}


function rbtq_rbtq_dropdown_custom_list_value_select_event(){
    jQuery(document).on('click','.rbtq_dropdown_custom_list .dropdown-menu .dropdown-item',function(){
        var rbt_value = jQuery(this).attr('value');
        var rbt_text = jQuery(this).text();

        var rbt_value_old = jQuery(this).closest('.rbtq_dropdown_custom_list').find('.dropdown-toggle').attr('value');

       

        if(rbt_value != rbt_value_old && jQuery(this).closest('.rbtq_dropdown_custom_list').find('.rbtq_quest_ans_type_value').length != 0){
            rbtq_question_type_change(this);
            return false;
        }
       rbt_console_log("rbt_value "+rbt_value);
       rbt_console_log("rbt_text "+rbt_text);
       rbt_console_log("rbt_value_old "+rbt_value_old);
        jQuery(this).closest('.rbtq_dropdown_custom_list').find('.dropdown-toggle').text(rbt_text).attr('value',rbt_value);
    });

}

function rbtq_question_type_change(obj){

    var current_obj = jQuery(obj);
    var parent_obj =  jQuery(current_obj).closest('.template_html_wrapper');
    if(parent_obj.find('.question_add_answer_outer_div .rbtq_question_ans_item').length != 0){
        swal({
            text: rbt_global_quiz_question_type_change_action_title,
            title: "",
            //type: "warning",
            showCancelButton: true,
            showCloseButton: true,
            confirmButtonColor: "#24bd92",
            confirmButtonText: "Yes!",
            customClass: '',        
            }).then((result) => {  
                if (result.value){
                     var rbt_value = jQuery(current_obj).attr('value');
                     var rbt_text = jQuery(current_obj).text();
                     jQuery(current_obj).closest('.rbtq_dropdown_custom_list').find('.dropdown-toggle').text(rbt_text).attr('value',rbt_value);

                    rbtq_question_answer_wrapper_empty(current_obj);

                    jQuery(parent_obj).find('.rbtq_add_new_answer_trigger_btn').trigger('click');
                   

                }
            });
    }

}


function rbtq_answer_layout_choose(obj){
    jQuery(obj).closest('.answer-view-options').find('.rbtq_ans_layout_type').removeClass('rbtq_ans_layout_type_selected');
    jQuery(obj).addClass('rbtq_ans_layout_type_selected');
    var ans_layout =  jQuery(obj).attr('ans-layout');
    var parent_obj =  jQuery(obj).closest('.template_html_wrapper');

    parent_obj.find('.question_add_answer_outer_div').removeClass('rbtq_quest_layout_one_col_row  rbtq_quest_layout_two_col_row  rbtq_quest_layout_three_col_row');
    
    parent_obj.find('.question_add_answer_outer_div').addClass(ans_layout);

}

function rbtq_question_show_hide_add_answer_btn(action= '',ans_button_trigger_obj = ''){

    if(action == 'show'){
        jQuery(ans_button_trigger_obj).closest('.template_html_wrapper').find('.rbtq_question_ans_add_btn_mapping_wrapper').show();
    }else{
         jQuery(ans_button_trigger_obj).closest('.template_html_wrapper').find('.rbtq_question_ans_add_btn_mapping_wrapper').hide();
    }
}



 function rbtq_question_answer_wrapper_empty(obj = ''){
    var parent_obj = jQuery(obj).closest('.template_html_wrapper');
    parent_obj.find('.question_add_answer_outer_div').html('');
    // need to reset outcome
    parent_obj.find('.ans_outcome_container').html('');
    parent_obj.find('.outcome-option-skip').trigger('click');
    parent_obj.find('.rbtq_ans_layout_type[ans-layout="rbtq_quest_layout_one_col_row"]').trigger('click');
    if(parent_obj.find('.rbtq_question_ans_with_img_enable_checkbox').prop('checked')){
        parent_obj.find('.rbtq_question_ans_with_img_enable_checkbox').trigger('click');
    }
    
}

function rbtq_add_new_answer_trigger(obj = ''){
  
    var quiz_type =  jQuery("#rbt_tab_1 input[name='quiz_type']:checked").val();
    var show_ans_tag_option =  jQuery("#rbt_tab_2 input[name='show_ans_tag_option']").prop('checked');
   
    var current_obj = obj;
    var ans_button_trigger_obj = obj;
    rbt_console_log('rbtq_add_new_answer_trigger call');
    var outer_obj = jQuery(current_obj).closest('.template_html_wrapper');

    var question_type = '';
    var ans_layout = '';
    var ans_with_img = 'N';
    var ans_html = '';
    


    question_type = outer_obj.find('.rbtq_quest_ans_type_value').attr('value');
    ans_layout = outer_obj.find('.rbtq_ans_layout_type_selected').attr('ans-layout');
    ans_with_img_option = outer_obj.find('.rbtq_question_ans_with_img_enable_checkbox').prop('checked');
    if(ans_with_img_option){
        ans_with_img = 'Y';
    }




     var rbtq_question_round_no = rbt_rand_date_time('question_ans');
     var rbtq_question_ans_empty_img = rbt_global_quiz_question_ans_img;
     var show_ans_box_for_scroing_and_assessment = 'style="display:none;"';
     var currect_ans_checkbox_show = 'style="display:none;"';
     var points_ans_checkbox_show = 'style="display:none;"';
     var tag_ans_checkbox_show = 'style="display:none;"';
     var ans_box_html = '';
     var ans_box_inner_html = '';
     var ans_box_option_html = '';
     var ans_delete_box_html = '';
     var rbtq_i = 1;
     var rbtq_j = 1;
     var rbtq_ans_text = 'Type Answer Here';
     var already_added_answer = 0;
     var question_type_class = 'question_type_'+question_type;
     var ans_item_more_class = '  ';

     var question_type_array = ['single','multi','text','yes_no','file_upload','slider','date','ranking_choices','fill_in_blank'];

     if(jQuery.inArray(question_type, question_type_array) !== -1){

     }else{
        rbt_swal_message('','Question type is wrong!','Add Answer');
        return false;
     }

    show_ans_box_for_scroing_and_assessment = '';
    if(quiz_type == 'personality'){
            
    }else if(quiz_type == 'scoring'){
        
        points_ans_checkbox_show = '';
    }else if(quiz_type == 'assessment'){
         currect_ans_checkbox_show = '';
    }

    if(show_ans_tag_option){
        tag_ans_checkbox_show = '';
    }

    rbt_console_log("quiz_type:"+quiz_type);


    var parent_obj =  jQuery(ans_button_trigger_obj).closest('.template_html_wrapper');
    if(parent_obj.find('.question_add_answer_outer_div .rbtq_question_ans_item').length != 0){
        already_added_answer = parent_obj.find('.question_add_answer_outer_div .rbtq_question_ans_item').length;
    }

    rbtq_question_show_hide_add_answer_btn('show',ans_button_trigger_obj);

    if(question_type == 'text' ||  question_type == 'fill_in_blank' || question_type == 'file_upload' || question_type == 'slider'){

         ans_item_more_class = ans_item_more_class+' rbt_template_disable_sortable_outer ';
    }

    if(question_type == 'text' || question_type == 'yes_no' || question_type == 'fill_in_blank' || question_type == 'file_upload' || question_type == 'slider'){

        rbtq_question_show_hide_add_answer_btn('hide',ans_button_trigger_obj);
        rbtq_question_answer_wrapper_empty(ans_button_trigger_obj);
    }

    if(question_type == 'file_upload' || question_type == 'slider'){
         jQuery(ans_button_trigger_obj).closest('.template_html_wrapper').find('.rbtq_question_ans_with_img_enable_checkbox').closest('.rbtq_question_item_section ').hide();
    }else{
        jQuery(ans_button_trigger_obj).closest('.template_html_wrapper').find('.rbtq_question_ans_with_img_enable_checkbox').closest('.rbtq_question_item_section ').show();
    }


     ans_delete_box_html = rbtq_quest_ans_delete_html(rbtq_question_round_no);
    
     if(question_type == 'single' || question_type == 'multi' || question_type == 'text' || question_type == 'yes_no' || question_type == 'fill_in_blank' || question_type == 'ranking_choices'){

       
        if(question_type == 'yes_no'){
            rbtq_j = 2;
            
        }else if(question_type == 'ranking_choices'){
            rbtq_j = 10;
        }

        if(question_type == 'fill_in_blank' || question_type == 'text' ){
             currect_ans_checkbox_show = 'style="display:none;"';
        }
        
        

        for(rbtq_i; rbtq_i <= rbtq_j; rbtq_i++){
            
            rbtq_question_round_no = rbt_rand_date_time('question_ans');
            ans_delete_box_html = rbtq_quest_ans_delete_html(rbtq_question_round_no);
          

             if(question_type == 'yes_no'){
                if(rbtq_i == 1){
                     rbtq_ans_text = 'Yes';
                }else{
                    rbtq_ans_text = 'No';
                }
             }else if(question_type == 'ranking_choices'){
                    rbtq_ans_text  = rbtq_i; 
             }
            ans_box_inner_html = ''; 
            ans_box_option_html = ''; 

            ans_box_inner_html += "<figure class='rbtq_question_ans_item_img rbt_img_resizeable_outer rbt_change_img_outer'><img src='"+rbtq_question_ans_empty_img+"' class='rbt_change_img img_"+rbtq_question_round_no+"' data-class='img_"+rbtq_question_round_no+"'><span class='rbt_change_img_icon rbt_backend_show'><i class='fa fa-camera'></i></span></figure>";
            
            if(question_type == 'fill_in_blank'){
                ans_box_inner_html += "<input type='text' class='rbt_field_change_placehoder rbtq_question_ans_input  rbtq_question_input_ans_100w rbtq_question_fill_in_blank_ans_field' name='rbtq_question_ans_"+rbtq_question_round_no+"' placeholder='Enter the text here' >";
            }else if(question_type == 'text'){

            ans_box_inner_html += "<textarea class='rbt_field_change_placehoder rbtq_question_ans_input rbtq_question_input_ans_100w rbtq_question_ans_textarea_ans_field ' name='rbtq_question_ans_"+rbtq_question_round_no+"' placeholder='Enter the text here' ></textarea>";
            }else{

            ans_box_inner_html += "<div class='rbtq_question_ans_text rbt_tiny_mce_editor'><div>"+rbtq_ans_text+"</div></div>";
            }


           var ans_option_html = rbt_global_quiz_question_answer_option_section_html;

           ans_option_html =  rbt_replace_text_with_other_value(data = ans_option_html,search = '&&currect_ans_checkbox_show&&',replace_text = currect_ans_checkbox_show);
           ans_option_html =  rbt_replace_text_with_other_value(data = ans_option_html,search = '&&points_ans_checkbox_show&&',replace_text = points_ans_checkbox_show);
           ans_option_html =  rbt_replace_text_with_other_value(data = ans_option_html,search = '&&tag_ans_checkbox_show&&',replace_text = tag_ans_checkbox_show);

            ans_box_inner_html +=ans_option_html;
           

            /*ans_box_option_html += "<div class='answer-options rbt_template_disable_sortable_outer' "+show_ans_box_for_scroing_and_assessment+">";

            ans_box_option_html += "<div class='answer-option-item rbtq_question_is_right_ans_checkbox_outer ' "+currect_ans_checkbox_show+">";
            ans_box_option_html += "<label>Correct Answer</label>";
            ans_box_option_html += "<div class='checkbox-custom-style'>";
            ans_box_option_html += "<input title='Correct Answer' type='checkbox'  name='rbtq_question_is_right_ans_"+rbtq_question_round_no+"' class='rbtq_question_and_field rbtq_question_is_right_ans custom-checkbox-input'>";
            ans_box_option_html += "<span class='custom--checkbox'></span>";
            ans_box_option_html += "</div>";
            ans_box_option_html += "</div>";
           

            ans_box_option_html += "<div class='answer-option-item ans_poins_outer_wrapper ' "+points_ans_checkbox_show+">";
            ans_box_option_html += "<label>Enter Points</label>";
            ans_box_option_html += "<input type='text'  name='ans_poins' title='Enter Ans Points' placeholder='Points' class='' >";
            ans_box_option_html += "</div>";


            ans_box_option_html += "<div class='answer-option-item ans_tag_outer_wrapper ' "+tag_ans_checkbox_show+">";
            ans_box_option_html += "<label>Enter Tag</label>";
            ans_box_option_html += "<input type='text'  name='ans_tag' title='Enter Ans Tag' placeholder='Tag' class='' >";
            ans_box_option_html += "</div>";


            ans_box_option_html += "</div>"; //answer-options div close*/

            ans_box_html += "<div class='rbtq_question_ans_item "+ans_item_more_class+question_type_class+"' data-db-id='%%ANSWERID%%' id='"+rbtq_question_round_no+"'>";
            ans_box_html += "<div class='rbtq_question_ans_item_inner'>";
            ans_box_html += ans_box_inner_html;
            ans_box_html += "</div>";
            ans_box_html += ans_box_option_html;
            ans_box_html += ans_delete_box_html;
            ans_box_html += "</div>";
        }


      

    }else if(question_type == 'file_upload'){

          ans_box_inner_html = '<div class="file-upload"><div class="file-upload-message"><i class="fa fa-cloud-upload" aria-hidden="true"></i><p>Drag and drop a file here or click</p><p class="file-upload-error">Ooops, something wrong happended.</p></div><input type="file" name="rbtq_file_upload" class="rbtq_file_upload"></div>';

          ans_box_inner_html += '<div class="uploadedFileDetails"></div>';
  
          ans_box_html += "<div class='rbtq_question_ans_item "+ans_item_more_class+question_type_class+"' data-db-id='%%ANSWERID%%' id='"+rbtq_question_round_no+"' style='padding:0px'>";
          ans_box_html += "<div class='rbtq_question_ans_item_inner'>";
          ans_box_html += ans_box_inner_html;
          ans_box_html += "</div>";
          //ans_box_html += ans_box_option_html;
         // ans_box_html += ans_delete_box_html;
          ans_box_html += "</div>";

       
    }else if(question_type == 'slider'){

         var rbt_field = 'rbtq_quest_ans_slider_'+rbtq_question_round_no;
         ans_box_inner_html = '<input name="'+rbt_field+'" id="'+rbt_field+'" class="form-control rbt_enable_progress_customizer rbtq_quest_ans_slider_field" data-slider-id="ex1Slider" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="0" top_box_b_clr="#333333" suffix_text="%" prefix_text="" complete_bar_b_clr="#333333" slider_b_clr="#ffffff" data-value="0" value="0">';





         ans_box_inner_html += '<div class="rbtqqa_slider_labels rbt_tiny_mce_editor "  ><div class="rbtqqa_slider_label" style="text-align: left;">start</div><div class="rbtqqa_slider_label" style="text-align: center;">middle</div><div class="rbtqqa_slider_label" style="text-align: right;">end</div></div>';


        ans_box_html += "<div class='rbtq_question_ans_item rbtq_question_ans_item_slider "+ans_item_more_class+question_type_class+"' data-db-id='%%ANSWERID%%' id='"+rbtq_question_round_no+"' >";
        ans_box_html += "<div class='rbtq_question_ans_item_inner'>";
        ans_box_html += ans_box_inner_html;
        ans_box_html += "</div>";
        ans_box_html += ans_box_option_html;
        ans_box_html += ans_delete_box_html;
        ans_box_html += "</div>";




    }else if(question_type == 'date'){

        ans_box_inner_html = "<input type='text' class='rbt_field_change_placehoder rbtq_question_ans_input  rbtq_question_input_ans_100w rbtq_question_fill_in_blank_ans_field' name='rbtq_question_ans_"+rbtq_question_round_no+"' placeholder='Enter the text here' >";

        ans_box_inner_html += '<div class="show-datepicker-popup rbt-margin-10"><i class="fa fa-calendar" aria-hidden="true"></i></div>';


       /* ans_box_inner_html += '<div class=" rbt_display_flex" >';
        ans_box_inner_html += '<label class="rbt_margin-t-r-10">Select Format</label>';
        ans_box_inner_html += '<div class="dropdown rbtq_dropdown_custom_list">';
        ans_box_inner_html += '<li class="btn btn-secondary dropdown-toggle rbtq_quest_category_value"  role="button" data-toggle="dropdown" aria-expanded="false" value="">';
        ans_box_inner_html += 'Select Format';
        ans_box_inner_html += '</li>';
        ans_box_inner_html += '<div class="dropdown-menu">';
        ans_box_inner_html += '<li class="dropdown-item rbt_anchor_btn"  value="YYYY-MM-DD">YYYY-MM-DD</li>';
        ans_box_inner_html += '<li class="dropdown-item rbt_anchor_btn"  value="YYYY-DD-MM">YYYY-DD-MM</li>';
        ans_box_inner_html += '<li class="dropdown-item rbt_anchor_btn"  value="DD-MM-YYYY">DD-MM-YYYY</li>';
        ans_box_inner_html += '<li class="dropdown-item rbt_anchor_btn"  value="MM-DD-YYYY">MM-DD-YYYY</li>';
        ans_box_inner_html += '<li class="dropdown-item rbt_anchor_btn"  value="YYYY/MM/DD">YYYY/MM/DD</li>';
        ans_box_inner_html += '<li class="dropdown-item rbt_anchor_btn"  value="YYYY/DD/MM">YYYY/DD/MM</li>';
        ans_box_inner_html += '<li class="dropdown-item rbt_anchor_btn"  value="DD/MM/YYYY">DD/MM/YYYY</li>';
        ans_box_inner_html += '<li class="dropdown-item rbt_anchor_btn"  value="MM/DD/YYYY">MM/DD/YYYY</li>';
        ans_box_inner_html += '<li class="dropdown-item rbt_anchor_btn"  value="YYYY.MM.DD">YYYY.MM.DD</li>';
        ans_box_inner_html += '<li class="dropdown-item rbt_anchor_btn"  value="YYYY.DD.MM">YYYY.DD.MM</li>';
        ans_box_inner_html += '<li class="dropdown-item rbt_anchor_btn"  value="DD.MM.YYYY">DD.MM.YYYY</li>';
        ans_box_inner_html += '<li class="dropdown-item rbt_anchor_btn"  value="MM.DD.YYYY">MM.DD.YYYY</li>';
        ans_box_inner_html += '</div>';
        ans_box_inner_html += '</div>';            
        ans_box_inner_html += '</div>'; */               

        ans_box_html += "<div class='rbtq_question_ans_item "+question_type_class+"' data-db-id='%%ANSWERID%%' id='"+rbtq_question_round_no+"' >";
        ans_box_html += "<div class='rbtq_question_ans_item_inner'>";
        ans_box_html += ans_box_inner_html;
        ans_box_html += "</div>";
        ans_box_html += ans_box_option_html;
        ans_box_html += ans_delete_box_html;
        ans_box_html += "</div>";

    }





    outer_obj.find('.question_add_answer_outer_div').append(ans_box_html);

    rbtq_add_ans_all_common_plugins_on_page_load(question_type);
    outer_obj.find('.rbtq_ques_base_ans_customizer_wrapper').html('');
    
    if(question_type == 'slider'){
       var rbt_text =  rbt_replace_text_with_rand_number(rbt_global_quiz_question_ans_slider_custromizer_html,'__REPLACEWITHRANDNUMBER__','ans_slider');
        outer_obj.find('.rbtq_ques_base_ans_customizer_wrapper').html(rbt_text);
    }else if(question_type == 'file_upload'){
       var rbt_text =  rbt_replace_text_with_rand_number(rbt_global_quiz_question_type_file_upload_custromizer_html,'__REPLACEWITHRANDNUMBER__','ans_slider');
        outer_obj.find('.rbtq_ques_base_ans_customizer_wrapper').html(rbt_text);
    }else if(question_type == 'date'){
       var rbt_text =  rbt_global_quiz_question_type_date_custromizer_html;
       outer_obj.find('.rbtq_ques_base_ans_customizer_wrapper').html(rbt_text);
    }

    if(question_type == 'slider' || question_type == 'file_upload'){
        rbtq_add_temp_customizer_init();
    }
    // when add new answer then need to refresh answer button
    jQuery('.rbt_refesh_customizer_values_btn').trigger('click'); 

    // refresh outcome mapping section 
    rbtq_create_question_mapping_list(outer_obj);



}



function rbtq_quest_ans_delete_html(rbtq_question_round_no = ''){

    var html = "<span class='rbtq_question_backend_show rbtq_question_remove_section rbtq_question_ans_delete_btn' data-id='"+rbtq_question_round_no+"'><i class='fa fa-times' aria-hidden='true'></i></span>";

    return html;
}





function rbtq_add_temp_customizer_init(){

    var rbtq_template_customzier_selector = '.template_html_wrapper_backend';

    jQuery('.rbt_enable_select_customizer').each(function(){
        var rbt_field_id = jQuery(this).attr('id');
         if (typeof rbt_field_id !== 'undefined' && rbt_field_id !== false) {
            jQuery('#'+rbt_field_id).on('change',function() {
                var  rbt_field_class = jQuery(this).attr('customize_apply_class');
                var  rbt_css_prop = jQuery(this).attr('customize_apply_css_prop');
                if (typeof rbt_field_class !== 'undefined' && rbt_field_class !== false) {
                  jQuery(rbtq_template_customzier_selector).find('.'+rbt_field_class+':visible').css(rbt_css_prop,jQuery(this).val());
                }
                
            });
        }
    });


    jQuery('.rbt_enable_color_customizer').each(function(){
        var rbt_field_id = jQuery(this).attr('id');
         if (typeof rbt_field_id !== 'undefined' && rbt_field_id !== false) {
            jQuery('#'+rbt_field_id+',#'+rbt_field_id+'_div').colorpicker().on('changeColor', function() {
                var  rbt_field_class = jQuery(this).attr('customize_apply_class');
                var  rbt_css_prop = jQuery(this).attr('customize_apply_css_prop');
                var  set_type = jQuery(this).attr('set_type');
                var  rbt_parent_class = jQuery(this).attr('parent_class');
                if (typeof rbt_field_class !== 'undefined' && rbt_field_class !== false) {

                   if(rbt_css_prop == 'shadow'){
                    rbtq_temp_boxShadow(rbt_parent_class, rbt_field_class);
                   }else if(rbt_parent_class != '' && set_type == 'attr'){
                        jQuery(rbtq_template_customzier_selector).find('.'+rbt_parent_class+':visible').find('.'+rbt_field_class).attr(rbt_css_prop, this.value);
                        // reset progress bar of slider
                        rbtq_question_type_slider_init( jQuery(rbtq_template_customzier_selector).find('.'+rbt_parent_class+':visible').find('.'+rbt_field_class).attr('id'));

                   }else{

                        jQuery(rbtq_template_customzier_selector).find('.'+rbt_field_class+':visible').css(rbt_css_prop, jQuery(this).colorpicker('getValue'));
                    }
                }
            });
        }
    });


    jQuery('.rbt_enable_progress_customizer').each(function(){
        var rbt_field_id = jQuery(this).attr('id');
        if (typeof rbt_field_id !== 'undefined' && rbt_field_id !== false) {
            jQuery('#'+rbt_field_id).bootstrapSlider().change(function() {
                var  rbt_field_class = jQuery(this).attr('customize_apply_class');
                var  rbt_css_prop = jQuery(this).attr('customize_apply_css_prop');
                var  rbt_parent_class = jQuery(this).attr('parent_class');
                var  set_type = jQuery(this).attr('set_type');
                if (typeof rbt_field_class !== 'undefined' && rbt_field_class !== false) {

                    if(rbt_css_prop == 'shadow'){
                     rbtq_temp_boxShadow(rbt_parent_class, rbt_field_class);
                    }else if(rbt_parent_class != '' && set_type == 'attr'){
                        jQuery(rbtq_template_customzier_selector).find('.'+rbt_parent_class+':visible').find('.'+rbt_field_class).attr(rbt_css_prop, this.value);

                        // reset progress bar of slider
                        rbtq_question_type_slider_init( jQuery(rbtq_template_customzier_selector).find('.'+rbt_parent_class+':visible').find('.'+rbt_field_class).attr('id'));

                    }else{
                      jQuery(rbtq_template_customzier_selector).find('.'+rbt_field_class+':visible').css(rbt_css_prop, this.value + 'px');
                    }
                 }
            });
        }
    });



    jQuery('.rbt_enable_text_customizer').each(function(){
        var rbt_field_id = jQuery(this).attr('id');
        if (typeof rbt_field_id !== 'undefined' && rbt_field_id !== false) {
            jQuery('#'+rbt_field_id).on('keypress paste keyup change', function() {
                rbt_console_log("++++++++");
                var  rbt_field_class = jQuery(this).attr('customize_apply_class');
                var  rbt_css_prop = jQuery(this).attr('customize_apply_css_prop');
                var  rbt_parent_class = jQuery(this).attr('parent_class');
                var  set_type = jQuery(this).attr('set_type');
                if (typeof rbt_field_class !== 'undefined' && rbt_field_class !== false) {
                     rbt_console_log("+++1+++++");
                    if(rbt_parent_class != '' && set_type == 'attr'){
                         rbt_console_log("++++2+++++");
                        jQuery(rbtq_template_customzier_selector).find('.'+rbt_parent_class+':visible').find('.'+rbt_field_class).attr(rbt_css_prop, this.value);
                        // reset progress bar of slider
                        rbtq_question_type_slider_init( jQuery(rbtq_template_customzier_selector).find('.'+rbt_parent_class+':visible').find('.'+rbt_field_class).attr('id'));

                    }
                 }
            });
        }
    });


    

}

function rbtq_question_type_slider_init(slider_id = ''){
            console.log("slider_id222222222222222222: "+slider_id);
            if(slider_id == ''){
                return false;
            }
            var  slider_b_clr = jQuery("#"+slider_id).attr('slider_b_clr');
            var  complete_bar_b_clr =jQuery("#"+slider_id).attr('complete_bar_b_clr');
            var  top_box_b_clr = jQuery("#"+slider_id).attr('top_box_b_clr');
            var  max_value = jQuery("#"+slider_id).attr('data-slider-max');
            var  step_value = jQuery("#"+slider_id).attr('data-slider-step');
            var  min_value = jQuery("#"+slider_id).attr('data-slider-min');
            var  prefix_text = jQuery("#"+slider_id).attr('prefix_text');
            var  suffix_text = jQuery("#"+slider_id).attr('suffix_text');
            if(prefix_text == undefined){
                prefix_text = '';
            }
            
            if(suffix_text == undefined){
                suffix_text = '';
            }
            jQuery("#"+slider_id).bootstrapSlider({formatter: function(value) {
                
                return prefix_text+''+ value +''+suffix_text ;
            }
            });
            
            
            
            jQuery('#'+slider_id).bootstrapSlider('setAttribute', 'max', max_value);
            jQuery('#'+slider_id).bootstrapSlider('setAttribute', 'min', min_value);
            jQuery('#'+slider_id).bootstrapSlider('setAttribute', 'step', step_value);
            jQuery('#'+slider_id).attr('data-value', min_value);
            jQuery('#'+slider_id).attr('value', min_value);
            //jQuery('#'+slider_id).bootstrapSlider('setValue', min_value);
            jQuery("#"+slider_id).bootstrapSlider('refresh');
            var slider_selector = jQuery("#"+slider_id).closest('.rbtq_question_ans_item_slider');
            slider_selector.find('.slider.slider-horizontal .slider-track').css('background-color',slider_b_clr);
            slider_selector.find('.slider.slider-horizontal .slider-handle').css('background-color',complete_bar_b_clr)
            slider_selector.find('.slider.slider-horizontal .slider-track .slider-selection').css('background-color',complete_bar_b_clr)
            slider_selector.find('.slider.slider-horizontal .tooltip .tooltip-inner').css('background-color',top_box_b_clr );
            
}



function rbt_quiz_select_template(obj,template_name = '',template_number = '',next_tab = ''){

    var current_obj = obj; 
    rbt_show_loader();
    jQuery(current_obj).closest('ul').find('li').removeClass('rbt_selcted_temp');
    jQuery(current_obj).closest('li').addClass('rbt_selcted_temp');
    var validation_status_tab = rbt_form_validation(form_id = 'rbt_tab_1', validation_show_type = '');
    if(validation_status_tab){
        rbt_hide_loader();
        return false;
    }
    rbt_hide_loader();
    rbt_next_tab_show('rbt_tab_2');
}

function rbtq_add_new_outcome_trigger(obj){
     var current_obj = obj;
     rbt_select_template(current_obj,'quiz/result','template1','','quiz_result_template_outer','n');
}

function rbtq_add_new_question_trigger(obj){
     var current_obj = obj;
     rbt_select_template(current_obj,'quiz/question','template1','','quiz_question_template_outer','n');

}



function rbtq_add_new_templates_with_tabs_result(current_obj ='', response,template_append_html_class,template_name = ''){
    if(response.html){
        jQuery('.rbtq_empty_template_div:visible').hide();
        var rbt_screen_name = '';
        var rbt_screen_name2 = '';
        if(template_name == 'quiz/result'){
          rbt_screen_name = 'result';
          rbt_screen_name2 = 'Outcome';
        }else if(template_name == 'quiz/question'){
          rbt_screen_name = 'question';
          rbt_screen_name2 = 'Question';
        }

        //var template_html = '<link rel="stylesheet"  href="'+response.css_file_path+'"><div class="template_html_wrapper">'+response.html+'</div>';
       
        var has_temp = jQuery('.'+template_append_html_class).find('.template_html_wrapper').length;
        var rbt_tab_no = has_temp+1;
        var rand_no = rbt_rand_date_time(rbt_screen_name);
        var item_id = rbt_screen_name+'_item_'+rand_no;
        var li_html = '<li class="rbt_ul_li_active rbt_anchor_btn rbt_ul_li rbt_ul_li_width_20" data-id="'+item_id+'" onclick="rbtq_show_templates_with_tabs_item(this,\'\',\''+template_append_html_class+'\')"><span>'+rbt_screen_name2+' '+rbt_tab_no+'</span><div onclick="rbtq_delete_templates_with_tabs_item(this,\'\',\''+template_append_html_class+'\')" class="rbt_delete_btn rbt_btn"><i class="fas fa fa-trash"></i></div></li>';

        
         var template_html = '';
        if(template_name == 'quiz/question'){
            response.html = rbt_global_quiz_question_header_section_html+response.html+rbt_global_quiz_question_footer_section_html;
        }else if(template_name == 'quiz/result'){
            response.html = rbt_global_quiz_outcome_header_section_html+response.html;
        }

        var template_html = '<div id="'+item_id+'" data-db-id="%%'+rbt_screen_name+'%%" class="template_html_wrapper rbtq_template_active_content_div">'+response.html+'</div>';

        if( has_temp == 0){
            template_html = '<link rel="stylesheet"  href="'+response.css_file_path+'">'+template_html;
             jQuery('.'+template_append_html_class).html(template_html);
        }else{

            rbt_add_customizer_values_to_attr(current_obj,rbt_screen_name);
            
            jQuery('.quiz_'+rbt_screen_name+'_template_outer').find('.template_html_wrapper').each(function(){
                jQuery(this).removeClass('rbtq_template_active_content_div').hide();
            });
            jQuery('.'+template_append_html_class).append(template_html);

            jQuery('.quiz_'+rbt_screen_name+'_template_tabs li').each(function(){
                jQuery(this).removeClass('rbt_ul_li_active');
            });
        }


        jQuery('.quiz_'+rbt_screen_name+'_template_tabs').append(li_html);
        if(template_name == 'quiz/question'){
            jQuery(document).find('.rbtq_add_new_answer_trigger_btn:visible').trigger('click');
        }
    }
}

function rbt_add_customizer_values_to_attr(current_obj = '', rbt_screen_name = ''){
    if(jQuery('.quiz_'+rbt_screen_name+'_template_tabs li.rbt_ul_li_active').length == 1){
        var rbt_save_customizer_values_tempary_var = rbt_save_customizer_values_tempary(current_obj,rbt_screen_name);
        var rbt_save_customizer_values_tempary_var = JSON.stringify(rbt_save_customizer_values_tempary_var);
        jQuery('.quiz_'+rbt_screen_name+'_template_tabs li.rbt_ul_li_active').attr('rbt_save_customizer_values_tempary',rbt_save_customizer_values_tempary_var);
    }
}

function rbtq_mapping_outcome_or_skip_outcome(obj){
    var current_obj = obj;
    jQuery(current_obj).closest('.outcome_options_wrapper').find('.outcome-option-active').removeClass('outcome-option-active');
    jQuery(obj).addClass('outcome-option-active');
    if(jQuery(obj).hasClass('outcome-option-skip')){
        jQuery(current_obj).closest('.rbtq_question_footer_part_html').find('.rbtq_question_outcome_list_wrapper').hide();
    }else{
         jQuery(current_obj).closest('.rbtq_question_footer_part_html').find('.rbtq_question_outcome_list_wrapper').show();
         rbtq_create_question_mapping_list(current_obj);
    }
}


function rbtq_show_templates_with_tabs_item(obj,template_name = '',template_append_html_class=''){

     var current_obj = obj;
    var rbt_screen_name = '';
    
    if(template_append_html_class == 'quiz_result_template_outer'){
        rbt_screen_name = 'result';
      
    }else if(template_append_html_class == 'quiz_question_template_outer'){
         rbt_screen_name = 'question';
    }


    console.log("++++++++rbt_show_testimonial_item ++++");
    if(jQuery(obj).hasClass('rbt_deleted')){
        return false;
    }
    rbt_add_customizer_values_to_attr(current_obj,rbt_screen_name);
    var item_id = jQuery(obj).attr('data-id');
    jQuery(obj).closest('.rbt_templates_tabs_outer').find('li').removeClass('rbt_ul_li_active');
    jQuery(obj).addClass('rbt_ul_li_active');

    jQuery('.'+template_append_html_class).find('.template_html_wrapper').removeClass('rbtq_template_active_content_div').hide();
    jQuery('.'+template_append_html_class).find('#'+item_id).addClass('rbtq_template_active_content_div').show();
    rbt_template_drag_drop_element_customizer_init();
    rbt_img_resizeable();

    rbt_console_log("rbt_screen_name: "+rbt_screen_name);
    if(jQuery('.quiz_'+rbt_screen_name+'_template_tabs li.rbt_ul_li_active').length == 1){
        var rbt_save_customizer_values_tempary_var =  jQuery('.quiz_'+rbt_screen_name+'_template_tabs li.rbt_ul_li_active').attr('rbt_save_customizer_values_tempary');;
        if (typeof rbt_save_customizer_values_tempary_var !== 'undefined' && rbt_save_customizer_values_tempary_var !== false) {
            rbt_save_customizer_values_tempary_var = JSON.parse(rbt_save_customizer_values_tempary_var);
           
            rbt_set_customizer_values(rbt_save_customizer_values_tempary_var);
        }
    }
}

function rbtq_delete_templates_with_tabs_item(obj,template_name = '',template_append_html_class=''){
    console.log("++++++++ rbt_delete_testimonial_item ++++");

    var current_obj = obj;
    var parent_obj = jQuery(obj).closest('.rbt_templates_tabs_outer');
        
        swal({
        title: "Are you sure you want to delete ?",
        text: "You cannot recover the settings.",
        //type: "warning",
        showCancelButton: true,
        showCloseButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Delete!",
        customClass: 'rbt_sweet_alert',
        
        }).then((isConfirm) => {
            console.log("isConfirm");
            console.log(isConfirm);
            if (isConfirm.value) {
                  // call delete form database;
                var item_delete_id = jQuery(current_obj).closest('li').addClass('rbt_deleted').attr('data-id');
                if(jQuery('#'+item_delete_id).length ==1){
                    var delete_db_id = jQuery('.'+template_append_html_class).find('#'+item_delete_id).attr('data-db-id');
                    if(!isNaN(delete_db_id)){
                        // call delete it from database 
                        var delete_form_screen = '';
                        if(template_append_html_class == 'quiz_question_template_outer'){
                            delete_form_screen = 'question';
                        }else if(template_append_html_class == 'quiz_result_template_outer'){
                            delete_form_screen = 'outcome';
                        }

                        var send_data = {'type':'delete_quiz_item_by_screen','action':'delete_quiz_item_by_screen', delete_form_screen,'delete_db_id':delete_db_id};
                        var response = rbt_call_ajax_data(current_obj, send_data);
                        console.log(response);
                        if(response.success){
                            if(delete_form_screen == 'outcome'){
                                jQuery(document).find('.ans_outcome_mapping_item  li[data-id="outcome_mapping_result_db_id_'+delete_db_id+'"]').remove();
                            }
                        }
                    }
                }


                
                jQuery(current_obj).closest('li').remove();
                jQuery('.'+template_append_html_class).find('#'+item_delete_id).remove();

                //shwo empty screen
                if(jQuery(parent_obj).find('li').length == 0){
                     jQuery(parent_obj).closest('.rbt_tab_level_1').find('.rbtq_empty_template_div').show();
                    jQuery(parent_obj).closest('.rbt_tab_level_1').find('.rbt_form_added_template').val('');
                    jQuery(parent_obj).closest('.rbt_tab_level_1').find('.rbt_form_save_template').val('');
                }else{
                    jQuery(parent_obj).find('li:first').trigger('click');
                }
                rbt_reorder_templates_tabs(outer_class = 'rbt_templates_tabs_outer', each_class = 'rbt_ul_li ', pre_text="Outcome",find_tag = 'span');

            }
        });
    }

function rbt_reorder_templates_tabs(outer_class = '', each_class, pre_text,find_tag){
    console.log("rbt_reorder_tab call");
    if(jQuery('.'+outer_class).length == 1){
        console.log("rbt_reorder_tab call 2");
        jQuery('.'+outer_class).find('.'+each_class).each(function(index){
            console.log("rbt_reorder_tab call 3==="+jQuery(this).find(find_tag).text());
            jQuery(this).find(find_tag).text(pre_text+' '+(index+1));
        });
    }

}


function rbt_save_quiz_template(obj = '',current_tab_id = '',next_tab_id = ''){

    var current_obj = obj;
    // current tab validation 
    if(jQuery("#"+current_tab_id).find('.rbt_form_save_template').length != 0){
        jQuery("#"+current_tab_id).find('.rbt_form_save_template').val('going_to_save');
    }

    var validation_status_tab = rbt_form_validation(form_id = current_tab_id, validation_show_type = '');
    if(validation_status_tab){
        rbt_next_tab_show(form_id);
        not_has_error = false;
        return false;
    }

    var quiz_basic_values = {};

//Tab 1
    var edit_id =  jQuery("#rbt_tab_1 input#rbt_form_edit_id").val();
    var quiz_name =  jQuery("#rbt_tab_1 input[name='quiz_name']").val();
    var quiz_type =  jQuery("#rbt_tab_1 input[name='quiz_type']:checked").val();

    var email_template_id = '';
    if(jQuery('#email_template_id').length == 1){
        var email_template_id = jQuery('#email_template_id').val();
    }

    quiz_basic_values['edit_id'] = edit_id;
    quiz_basic_values['quiz_name'] = quiz_name;
    quiz_basic_values['quiz_type'] = quiz_type;
    quiz_basic_values['email_template_id'] = email_template_id;
    jQuery(document).find('.quiz_basic_checkbox_fields').each(function(){
        var quiz_basic_checkbox_name =  jQuery(this).attr('name');
        var quiz_basic_checkbox =  jQuery(this).prop('checked');
        if(quiz_basic_checkbox){
            quiz_basic_checkbox = 'Y';
        }else{
            quiz_basic_checkbox = 'N';
        }
        quiz_basic_values[quiz_basic_checkbox_name] = quiz_basic_checkbox;


    });

    

//Tab 2
    var quiz_main_temp =  jQuery("#rbt_tab_1 .rbt_templates_list  .rbt_selcted_temp").attr('data-temp');
    var quiz_display =  jQuery("#rbt_tab_2 input[name='quiz_display']:checked").val();
    var show_progress_bar =  jQuery("#rbt_tab_2 input[name='show_progress_bar']").prop('checked');
    if(show_progress_bar){
        show_progress_bar = 'Y';
    }else{
        show_progress_bar = 'N';
    }

    var retake_quiz =  jQuery("#rbt_tab_2 input[name='retake_quiz']").prop('checked');
    if(retake_quiz){
        retake_quiz = 'Y';
    }else{
        retake_quiz = 'N';
    }

    var add_user_quiz =  jQuery("#rbt_tab_2 input[name='add_user_quiz']").prop('checked');
    if(add_user_quiz){
        add_user_quiz = 'Y';
    }else{
        add_user_quiz = 'N';
    }

    quiz_basic_values['quiz_main_temp'] = quiz_main_temp;
    quiz_basic_values['quiz_display'] = quiz_display;
    quiz_basic_values['show_progress_bar'] = show_progress_bar;
    quiz_basic_values['retake_quiz'] = retake_quiz;
    quiz_basic_values['add_user_quiz'] = add_user_quiz;

 //Tab 3

    var start_temp_html = jQuery("#rbt_tab_3 .template_html_wrapper").html(); 
    start_temp_html = rbt_remove_unused_html_content(start_temp_html);
    start_temp_html = rbtTinymceRemoveIds(start_temp_html);
    start_temp_html = btoa(unescape(encodeURIComponent(start_temp_html)));
    var start_temp_no =  jQuery("#rbt_tab_3 .rbt_templates_list  .rbt_selcted_temp").attr('data-temp');
    var start_temp_customizer_values =  rbt_save_customizer_values_tempary(jQuery("#rbt_tab_3 .template_html_wrapper"),'start_screen');
   
    quiz_basic_values['start_temp_no'] = start_temp_no;
    quiz_basic_values['start_temp_customizer_values'] = start_temp_customizer_values;

//Tab 4
    var optin_skip_enable = jQuery("#rbt_tab_4 .rbtq_optin_skip_enable_checkbox").prop('checked'); 
    if(optin_skip_enable){
        optin_skip_enable = 'Y';
    }else{
        optin_skip_enable = 'N';
    }
    var optin_temp_html = jQuery("#rbt_tab_4 .template_html_wrapper").html(); 
    optin_temp_html = rbt_remove_unused_html_content(optin_temp_html);
    optin_temp_html = rbtTinymceRemoveIds(optin_temp_html);
    optin_temp_html = btoa(unescape(encodeURIComponent(optin_temp_html)));
    var optin_temp_no =  'template1';//jQuery("#rbt_tab_4 .rbt_templates_list  .rbt_selcted_temp").attr('data-temp');
    var optin_temp_customizer_values =  rbt_save_customizer_values_tempary(jQuery("#rbt_tab_4 .template_html_wrapper"),'optin_screen');

    quiz_basic_values['optin_temp_no'] = optin_temp_no;
    quiz_basic_values['optin_skip_enable'] = optin_skip_enable;
    quiz_basic_values['optin_temp_customizer_values'] = optin_temp_customizer_values;
//Tab 5
    var result_temp_no =  'template1';//jQuery("#rbt_tab_4 .rbt_templates_list  .rbt_selcted_temp").attr('data-temp');
    var result_validation = false;
    var result_customizer_values = {};
   
    jQuery("#rbt_tab_5 .rbt_templates_tabs_outer .rbt_ul_li").each(function(index){

        var result_tab_text =  jQuery(this).text();
        var result_customizer_value = {};
        var temp_attr_id = jQuery(this).attr('data-id');
        var customizer_values =  jQuery(this).attr('rbt_save_customizer_values_tempary');

        

        if (!jQuery(this).hasClass('rbt_ul_li_active') && typeof customizer_values !== 'undefined' && customizer_values !== false) {

        }else{
             console.log(' question_tab_text '+result_tab_text);
            customizer_values =  rbt_save_customizer_values_tempary(jQuery("#rbt_tab_5 .template_html_wrapper"),'result_screen');
            customizer_values =  JSON.stringify(customizer_values);
            console.log(customizer_values);
        }
        var temp_selector = jQuery("#rbt_tab_5").find("#"+temp_attr_id+'.template_html_wrapper');
        var temp_db_id =  temp_selector.attr('data-db-id');
       
        var temp_title = temp_selector.find('input[name="outcome_title"]').val();
        var outcome_tags = temp_selector.find('select[name="outcome_tags"]').val();
        var  temp_html = temp_selector.html();

        temp_html = rbt_remove_unused_html_content(temp_html,'outcome_title_wrapper','class');
        temp_html = rbtTinymceRemoveIds(temp_html);
        temp_html = btoa(unescape(encodeURIComponent(temp_html)));

        var outcome_basic_options = {};
        outcome_basic_options['outcome_tags'] = outcome_tags;

        result_customizer_value['temp_db_id'] = temp_db_id;
        result_customizer_value['temp_html'] = temp_html;
        result_customizer_value['temp_attr_id'] = temp_attr_id;
        result_customizer_value['temp_order'] = index;
        result_customizer_value['temp_title'] = temp_title;
        result_customizer_value['temp_customizer_values'] = customizer_values;
        result_customizer_value['basic_options'] = outcome_basic_options;
        result_customizer_values[index] = result_customizer_value;

        if(temp_title == ''){
            rbt_next_tab_show(form_id = 'rbt_tab_5');
            jQuery(this).trigger('click');
            result_validation =  true;
            rbt_swal_message('error',result_tab_text+': Please enter outcome title');
            return false;
        }

    });

    if(result_validation){
       return false;
    }


//Tab 6
var question_temp_no =  'template1';//jQuery("#rbt_tab_4 .rbt_templates_list  .rbt_selcted_temp").attr('data-temp');
var question_validation = false;
var question_customizer_values = {};

jQuery("#rbt_tab_6 .rbt_templates_tabs_outer .rbt_ul_li").each(function(index){
    var question_basic_options = {};
    var question_tab_text =  jQuery(this).text();
    var question_customizer_value = {};
    var temp_attr_id = jQuery(this).attr('data-id');
    var customizer_values =  jQuery(this).attr('rbt_save_customizer_values_tempary');
    if (!jQuery(this).hasClass('rbt_ul_li_active') &&  typeof customizer_values !== 'undefined' && customizer_values !== false) {

    }else{
        console.log(' question_tab_text '+question_tab_text);
        customizer_values =  rbt_save_customizer_values_tempary(jQuery("#rbt_tab_6 #"+temp_attr_id),'question_screen');
        customizer_values =  JSON.stringify(customizer_values);
        console.log(customizer_values);
    }
    var temp_selector = jQuery("#rbt_tab_6").find("#"+temp_attr_id+'.template_html_wrapper');
    var temp_db_id =  temp_selector.attr('data-db-id');
   
    var temp_title = temp_selector.find('input[name="question_title"]').val();
    var  temp_html = temp_selector.html();

    var question_cat = temp_selector.find('.rbtq_quest_category_value').attr('value');
    var question_type = temp_selector.find('.rbtq_quest_ans_type_value').attr('value');
    var ans_layout = temp_selector.find('.rbtq_ans_layout_type_selected').attr('ans-layout');
    var ans_with_img_enable = temp_selector.find('.rbtq_question_ans_with_img_enable_checkbox').prop('checked');
    if(ans_with_img_enable){
        ans_with_img_enable = 'Y';
    }else{
        ans_with_img_enable = 'N';
    }

    var question_skip_enable = temp_selector.find('.rbtq_question_skip_enable_checkbox').prop('checked');
    if(question_skip_enable){
        question_skip_enable = 'Y';
    }else{
        question_skip_enable = 'N';
    }

    var outcome_mapping = temp_selector.find('.outcome-option-active').attr('att-value');

    temp_html = rbt_remove_unused_html_content(temp_html,'rbtq_question_header_part_html','class');
    temp_html = rbt_remove_unused_html_content(temp_html,'rbtq_question_footer_part_html','class');
    temp_html = rbt_remove_unused_html_content(temp_html,'question_title_wrapper','class');
    temp_html = rbt_update_html_content(temp_html,'question_add_answer_outer_div','class', '%%ANSWERSHTML%%');
    temp_html = rbtTinymceRemoveIds(temp_html);
    temp_html = btoa(unescape(encodeURIComponent(temp_html)));

    question_basic_options['question_skip_enable'] = question_skip_enable;
    question_basic_options['ans_with_img_enable'] = ans_with_img_enable;
    question_basic_options['outcome_mapping'] = outcome_mapping;
    question_basic_options['ans_layout'] = ans_layout;
    question_basic_options['question_type'] = question_type;
    question_basic_options['question_cat'] = question_cat;
    /*jQuery(temp_selector).find('.question_checkbox_fields_basic').each(function(){
        var quest_basic_checkbox_name =  jQuery(this).attr('name');
        var quest_basic_checkbox =  jQuery(this).prop('checked');
        if(quest_basic_checkbox){
            quest_basic_checkbox = 'Y';
        }else{
            quest_basic_checkbox = 'N';
        }
        question_basic_options[quest_basic_checkbox_name] = quest_basic_checkbox;
    });*/

    jQuery(temp_selector).find('.question_input_fields_basic').each(function(){
        var quest_basic_input_name =  jQuery(this).attr('name');
        var quest_basic_input =  jQuery(this).val();
        question_basic_options[quest_basic_input_name] = quest_basic_input;
    });

    question_customizer_value['temp_db_id'] = temp_db_id;
    question_customizer_value['temp_html'] = temp_html;
    question_customizer_value['temp_attr_id'] = temp_attr_id;
    question_customizer_value['temp_order'] = index;
    question_customizer_value['temp_title'] = temp_title;
    question_customizer_value['temp_customizer_values'] = customizer_values;
    question_customizer_value['basic_options'] = question_basic_options;

   

    if(temp_title == ''){
        rbt_next_tab_show(form_id = 'rbt_tab_6');
        jQuery(this).trigger('click');
        question_validation =  true;
        rbt_swal_message('error',question_tab_text+': Please enter question title');
        return false;
    }

    var question_ans_values = {};
    temp_selector.find('.question_add_answer_outer_div .rbtq_question_ans_item').each(function(index){
        var ans_style = jQuery(this).attr('style');
        var ans_class = jQuery(this).attr('class');
        var ans_value = {};
        var ans_basic_options = {};
        var ans_title = '';
        var ans_is_correct = 'N';
        //if(ans_type == '')
         ans_title = jQuery(this).find('.rbtq_question_ans_text').text();
         ans_is_correct = jQuery(this).find('.rbtq_question_is_right_ans').prop('checked');
         if(ans_is_correct){
            ans_is_correct = 'Y';
         }else{
            ans_is_correct = 'N';
         }

        var ans_points = jQuery(this).find('input[name="ans_poins"]').val();
        
        var ans_tags = jQuery(this).find('select[name="ans_tags"]').val();

        var ans_db_id =  jQuery(this).attr('data-db-id');
        var ans_attr_id =  jQuery(this).attr('id');
        var temp_html =  jQuery(this).html();
        var  ans_outcome_mapping_ids = [];

        temp_html = rbt_remove_unused_html_content(temp_html);
        temp_html = rbtTinymceRemoveIds(temp_html);
        temp_html = rbt_remove_unused_html_content(temp_html,'ex1Slider','id');
        temp_html = rbt_remove_unused_html_content(temp_html,'rbtq_question_remove_section','class');
        temp_html = rbt_update_html_content(temp_html,'answer-options','class','%%ANSWERSOPTIONSHTML%%');

        var frontend_html = temp_html;
        frontend_html = '<div class="'+ans_class+'" style="'+ans_style+'">'+frontend_html+'</div>';
        temp_html = btoa(unescape(encodeURIComponent(temp_html)));
       
        if(outcome_mapping == 'connect_to_outcome'){
            temp_selector.find('#outcome_mapping_ans_'+ans_attr_id).find("input[name='outcome_result_checkbox']:checked").each(function(){
               ans_outcome_mapping_ids.push(jQuery(this).val()); 
           });

           console.log(" ans_outcome_mapping_ids ");
           console.log(ans_outcome_mapping_ids);
        }
        ans_basic_options['ans_is_correct'] = ans_is_correct;
        ans_basic_options['ans_points'] = ans_points;
        ans_basic_options['ans_order'] = index;
        ans_basic_options['ans_tags'] = ans_tags;
        ans_basic_options['ans_outcome_mapping_ids'] = ans_outcome_mapping_ids;

        frontend_html = rbt_remove_unused_html_content(frontend_html,'answer-options','class');
        frontend_html = rbt_remove_unused_html_content(frontend_html,'rbtq_question_remove_section ','class');
        frontend_html = btoa(unescape(encodeURIComponent(frontend_html)));
     
        ans_value['temp_title'] = ans_title;
        ans_value['basic_options'] = ans_basic_options;
        ans_value['temp_db_id'] = ans_db_id;
        ans_value['temp_attr_id'] = ans_attr_id;
        ans_value['temp_html'] = temp_html;
        ans_value['frontend_html'] = frontend_html;
        ans_value['ans_order'] = index;
        question_ans_values[index] = ans_value;
        

    });
    question_customizer_value['question_ans_values'] = question_ans_values;
    question_customizer_values[index] = question_customizer_value;

});

if(question_validation){
   return false;
}



var send_data = {'type':'save_quiz','action':'save_quiz', 'question_customizer_values':question_customizer_values,'result_customizer_values':result_customizer_values,'quiz_basic_values':quiz_basic_values,'start_temp_html' : start_temp_html,'optin_temp_html' : optin_temp_html};
var response = rbt_call_ajax_data(current_obj, send_data, false,true,next_tab_id);

if(response.error){
    rbt_swal_message('',response.error,'');
    return false;
}
if(response.success){
  
    jQuery('.rbt_show_on_save_quiz_action').show('slow');
    jQuery('#rbt_form_edit_id').val(response.edit_id);
    if(response.shortcode_details){
        jQuery('.shortcode_details_div').html(response.shortcode_details);
    }
    // set outcome ids 
    if(response.outcome_ids){
        var data = response.outcome_ids;
        for (var key in data) {
            if(jQuery('#'+key).length != 0){
                jQuery('#'+key).attr('data-db-id',data[key]);
            }
        }
    }   
    // set questions  ids 
    if(response.question_ids){
        var data = response.question_ids;
        for (var key in data) {
            if(jQuery('#'+key).length != 0){
                jQuery('#'+key).attr('data-db-id',data[key]);
            }
        }
    }   

     // set questions ans ids 
    if(response.questions_ans_ids){
        var data = response.questions_ans_ids;
        for (var key in data) {
            if(jQuery('#'+key).length != 0){
                jQuery('#'+key).attr('data-db-id',data[key]);
            }
        }
    }   

}



console.log(result_customizer_values);
    

   

}


function rbtq_temp_boxShadow(get_value_selector_prefix = '', apply_value_selector = '') {

    console.log("rbtq_temp_boxShadow call");
    console.log("get_value_selector_prefix: "+get_value_selector_prefix);
    console.log("apply_value_selector: "+apply_value_selector);
    
    var hor_lnth = parseFloat(jQuery('#'+get_value_selector_prefix+'_shadow_horizontal_length').val());
    var ver_lnth = parseFloat(jQuery('#'+get_value_selector_prefix+'_shadow_vertical_length').val());
    var blur_radius = parseFloat(jQuery('#'+get_value_selector_prefix+'_shadow_blur_radius').val());
    var sprd_radius = parseFloat(jQuery('#'+get_value_selector_prefix+'_shadow_spread_radius').val());
    var shad_clr = (jQuery('#'+get_value_selector_prefix+'_shadow_color').val());
    
    hor_lnth = hor_lnth + 'px';
    ver_lnth = ver_lnth + 'px';
    blur_radius = blur_radius + 'px';
    sprd_radius = sprd_radius + 'px';
    var box_shadow = hor_lnth + ' ' + ver_lnth + ' ' + blur_radius + ' ' + sprd_radius + ' ' + shad_clr;
    var cs_customize_template_outer_Selector = '.'+apply_value_selector+':visible';
    rbt_console_log("cs_customize_template_outer_Selector: "+cs_customize_template_outer_Selector);
    rbt_console_log("box_shadow: "+box_shadow);
    jQuery(cs_customize_template_outer_Selector).css('-webkit-box-shadow', box_shadow);
    jQuery(cs_customize_template_outer_Selector).css('-moz-box-shadow', box_shadow);
    jQuery(cs_customize_template_outer_Selector).css('box-shadow', box_shadow);
}


function rbtq_create_question_mapping_list(mapping_button_obj = ''){

    rbt_console_log('--- rbtq create question mapping list call---');

    var parent_obj = jQuery(mapping_button_obj).closest('.template_html_wrapper');
    var question_type = parent_obj.find('.outcome-option-active').attr('att-value');
    if(question_type != 'connect_to_outcome'){
         return false;
    }
    
    var question_type = parent_obj.find('.rbtq_quest_ans_type_value').attr('value');
    if(question_type == 'file_upload' || question_type == 'slider' || question_type == 'date'|| question_type == 'fill_in_blank'){
        return false;
    }

    var total_answer =  parent_obj.find('.question_add_answer_outer_div .rbtq_question_ans_item').length;
    if(total_answer == 0){
         rbt_swal_message('','Please add a answer','');
         return false;
    }
    var all_outcomes_list_html = '';
    jQuery("#rbt_tab_5 .rbt_templates_tabs_outer .rbt_ul_li").each(function(index){
        var outcome_content_wrapper_id = jQuery(this).attr('data-id');
       
        var outcome_db_id  = jQuery("#rbt_tab_5 .quiz_result_template_outer #"+outcome_content_wrapper_id).attr('data-db-id');
        var outcome_title  = jQuery("#rbt_tab_5 .quiz_result_template_outer #"+outcome_content_wrapper_id).find('input[name="outcome_title"]').val();
         all_outcomes_list_html  += '<li data-id="outcome_mapping_result_db_id_'+outcome_db_id+'"><div class="checkbox-custom-style"><input type="checkbox" class="custom-checkbox-input" name="outcome_result_checkbox" value="'+outcome_db_id+'"><span class="custom--checkbox"></span></div><label>'+outcome_title+'</label></li>';
       
    });

    all_outcomes_list_html = "<div class='ans_outcome_list_html multi-select-dropdown'><div class='multi-select-dropdown-link rbt_anchor_btn'> Select Outcomes <i class='fa fa-angle-down'></i></div><ul class='multi-select-dropdown-list'>"+all_outcomes_list_html+"</ul></div>";
    // var alrady_mapping_length  = parent_obj.find('.rbtq_question_outcome_list_wrapper .ans_outcome_mapping_item').length;


    parent_obj.find('.question_add_answer_outer_div .rbtq_question_ans_item').each(function(index){
        var ans_text = jQuery(this).find('.rbtq_question_ans_item_inner .rbtq_question_ans_text').text();
        var ans_id = jQuery(this).attr('id');
        var ans_db_id = jQuery(this).attr('data-db-id');
        ans_id = 'outcome_mapping_ans_'+ans_id;

        if(parent_obj.find('.rbtq_question_outcome_list_wrapper .ans_outcome_container #'+ans_id).length == 0){

            var outcome_html = '<div class="ans_outcome_mapping_item quiz-content-card"  id="'+ans_id+'"><label class="rbt_label ans_text_outcome_mapping" >'+ans_text+'</label>'+all_outcomes_list_html+'</div>';
            parent_obj.find('.rbtq_question_outcome_list_wrapper .ans_outcome_container').append(outcome_html);
        }else{
            // added only new outcome li
            jQuery("#rbt_tab_5 .rbt_templates_tabs_outer .rbt_ul_li").each(function(index){
                 var outcome_content_wrapper_id = jQuery(this).attr('data-id');
           
                var outcome_db_id  = jQuery("#rbt_tab_5 .quiz_result_template_outer #"+outcome_content_wrapper_id).attr('data-db-id');
                var outcome_title  = jQuery("#rbt_tab_5 .quiz_result_template_outer #"+outcome_content_wrapper_id).find('input[name="outcome_title"]').val();

                all_outcome_li_html  = '<li data-id="outcome_mapping_result_db_id_'+outcome_db_id+'"><div class="checkbox-custom-style"><input type="checkbox" class="custom-checkbox-input" name="outcome_result_checkbox" value="'+outcome_db_id+'"><span class="custom--checkbox"></span></div><label>'+outcome_title+'</label></li>';

                if(parent_obj.find('.rbtq_question_outcome_list_wrapper .ans_outcome_container #'+ans_id).find('li[data-id="outcome_mapping_result_db_id_'+outcome_db_id+'"]').length == 0){
                    parent_obj.find('.rbtq_question_outcome_list_wrapper .ans_outcome_container #'+ans_id).find('ul').append(all_outcome_li_html);
                }


                 
               
            });

        }

        
        
    });

   
  //  parent_obj.find('.rbtq_question_outcome_list_wrapper').append(outcome_html);
   // parent_obj.find('.question_add_answer_outer_div .rbtq_question_ans_item').length;

}





