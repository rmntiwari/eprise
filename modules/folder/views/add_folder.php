<?php
//echo $feedback = $this->session->flashdata('feedback');
if(!isset($_COOKIE['ppUser']))
{
    header("Location: /survey/");
}
$CI =& get_instance();
$CI->load->model('Mdl_folder');

?>
</div>

<div class="full_div">
    <div class="container">
        <div class="folder_bread"><a href="/survey/folder/<?php echo $username;?>" title="Organize Folders">Organize Folders</a>&nbsp;&nbsp;›&nbsp;&nbsp;<span>Add Surveys</span></div>
    </div>
</div>

<div class="container">

    <div class="folder_menu_block">
        <div class="user_instruct_menu">
            <div style="float:left;">
                <span id="product_icon"><a class="icon_style" href="/survey/" title="Surveys">Surveys</a></span>
            </div>
            <div style="float:left;">
                <span id="my_user_icon"><a class="icon_style" href="/survey/classroom/manage.php?login=<?php echo $username;?>" title="My Users">Users</a></span>
            </div>
            <div style="float:left;">
                <span id="my_ins_icon"><a class="icon_style" href="/survey/myinstructor/?login=<?php echo $username;?>" title="My Administrators">Administrators</a></span>
            </div>
            <div style="clear:both;"></div>
        </div>

    </div>

    <div style="width: 100%;float: left;margin-bottom: 10px;">
        <div style="float: left;width: 26%;color: #4d4d4d;font-weight: 500;font-size: 19px; margin: 0px 0 22px -1px;min-width: 128px;">
            <span class="new_folder_icon"></span><?php echo ucwords($folder_name);?>
        </div>

        <form style="float: left;margin: -27px 0 0 0;" class="search-form" method="post" name="search_survey" id="search_survey" action="/survey/folder/add/<?php echo $username;?>/<?php echo $folder_name;?>">
            <div class="search_area" style="display:block;">
                <input name="sm_search" id="sm_search" type="text" placeholder="Search Surveys" class="new_search_area" maxlength="120" onfocus="if (this.placeholder == 'Search') this.placeholder = ''; " onblur="if (this.placeholder == '') this.placeholder = 'Search';" autocomplete="off" value="<?php echo set_value('sm_search'); ?>" style="background: rgb(255, 255, 255);border-width: 1px 0px 1px 1px;border-top-style: solid;border-right-style: initial;border-bottom-style: solid;border-left-style: solid;border-top-color: rgb(238, 238, 238);border-right-color: initial;border-bottom-color: rgb(238, 238, 238);border-left-color: rgb(238, 238, 238);border-image: initial;color: #464646;margin-left: 0px;margin-top: 20px;margin-bottom: 10px;padding: 15px 10px;float: left;width: 215px;font-size: 16px; height: 16px; border-radius: 3px;">
                <?php if (set_value('sm_search') ==''){?>
                    <span id="searchMe_survey" style="display: block;" class="searchMe_new text-search-icon">&nbsp;</span>
                    <span id="resetSM" style="display: none;" class="resetQuiz_new text-close-icon">&nbsp;</span>
                <?php }else{ ?>
                    <span id="searchMe_survey" style="display: none;" class="searchMe_new text-search-icon">&nbsp;</span>
                    <span id="resetSM" style="display: block;" class="resetQuiz_new text-close-icon">&nbsp;</span>
                <?php } ?>
            </div>
            <div style="display: none;margin:27px 0 0 223px;position: absolute;" class="search_loader">
                <img alt="" src="/survey/images/loader.gif">
            </div>
        </form>

        <div style="display: none;margin:1px 8px 0 305px;float: left;" class="ajax_loader">
            <img alt="" src="/survey/images/loader.gif">
        </div>

        <div id="addSMBtn" style="display: none;float: right;margin-top: -8px;">
            <input type="button" style="width:130px !important;padding: 10px;border-radius: 2px;" class="btn_class btn-big primary addSurveytoFolder" value="Add to Folder">
        </div>
    </div>

    <div class="show-survey" style="margin-top: 60px;">
        <div class="thead">
            <div class="org_tbl_head" style="width: 33%;">
                <label for="all" class="checkbox_icon_add"></label>
                <input type="checkbox" name="all" id="all" class="checkbox" style="margin:6px 0 0 6px;display:none;" onclick="CheckedUnchecked(this.checked)" />
                <div style="margin: 2px 0 3px 30px;">Survey Name</div>
            </div>
            <div class="org_tbl_head" style="text-align: center;width: 7%;">Created</div>
            <div class="org_tbl_head" style="text-align: center;width: 13%;">Folder</div>
        </div>
    </div>

    <div class="verticle_scroll">
        <div class="show-survey">
            <div class="tbody">
                <?php if(count($survey_results)):?>
                    <?php foreach ($survey_results as $rows):?>
                        <?php
                        $_Surveytitle =  $rows->title;;
                        $date = date("M j, Y",$rows->modified_date);

                        $a=$_Surveytitle;
                        $sub=strlen($a)>45 ? substr($a,0,45) .'...' : substr($a,0,45);
                        ?>
                        <div class="row_quiz_add" style=" " id="row_<?php echo $rows->id;?>" >
                            <div class="show_text_survey" style="width: 62%">
                                <label for="check_<?php echo $rows->id;?>" class="checkbox_icon_add_list for_<?php echo $rows->id;?>"></label>
                                <input type="checkbox" name="addChk" id="check_<?php echo $rows->id;?>" class="checkbox check_<?php echo $rows->id;?>" value="<?php echo $rows->id;?>" style="margin:12px 0px 0px 12px; display:none;">
                                <div style="float: left;width: 93%;"><?php echo $sub;?></div>
                            </div>
                            <div class="date_area"><?php echo $date ;?></div>
                            <div class="date_area">&nbsp;<?php if( $CI->Mdl_folder->getFolderName($user_id, $rows->link_folderid))
                                {
                                    echo ( $CI->Mdl_folder->getFolderName($user_id, $rows->link_folderid)->foldername);
                                }
                                ?></div>
                        </div>
                    <?php endforeach;?>
                <?php  endif;?>
            </div>
        </div>
    </div>

    <form id="frmAddSurveyFolder" method="post">
        <input type="hidden" name="input_sm_id" id="input_sm_id" value="" />
        <input type="hidden" name="input_sm_id_remove" id="input_sm_id_remove" value="" />
        <input type="hidden" name="folderId" id="folderId" value="<?php if(!empty($folder_id)){echo $folder_id;}?>" />
        <input type="hidden" id="foldername" name="foldername" value="<?php echo $folder_name;?>" />
        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" />
        <input type="hidden" name="username" id="username" value="<?php echo $username;?>" />
    </form>

    <div style="float:left; display: none">
        <input type="button" id="addSurveytoFolder" style="width:130px !important;padding: 10px;border-radius: 2px;" class="btn_class btn-big primary" value="Add to Folder">
    </div>
    <div style="float: right;">
        <a onclick="return $('.ajax_loader').show();" style="float: right;padding: 14px 0px;" href="/survey/folder/<?php echo $username;?>"><img class="ajax_loader" style="width: 13px;
" src="/flashcards/images/Back_Hover.png?v=3">&nbsp;Back</a>
        <img style="margin: 14px 6px;float: right;display: none;" class="ajax_loader" alt="" src="/survey/images/loader.gif">
    </div>
    <br>