<?php  defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<?php

if(!isset($_COOKIE['ppUser']))
{
    header("Location: /survey/");
}
//echo $feedback = $this->session->flashdata('feedback');
$CI =& get_instance();
$CI->load->model('Mdl_folder');
?>

</div>
<div class="full_div">
    <div class="container">
        <div class="folder_bread">Organize Folders</div>
    </div>
</div>

<div class="container">

    <div id="messagediv" style="display: none;opacity: 1;text-align: center;padding-top: 15px;"><span><img src="https://www.proprofs.com/api/includes/global/images/tick-img.png"> Folder Saved.</span></div>

<?php
if($total_folder==0){
    ?>

    <div style="text-align:center;">
        <img src="https://www.proprofs.com/quiz-school/img/blank_img.png" style="width: 325px;margin-top: 40px;">
        <h1 style="margin:30px 0px 0px 0px; font-weight: normal;font-size: 160%;">You have not created any folders yet</h1>
        <form id="frmCreateFolder" name="frmCreateFolder" action="" method="post" class="login-form">
            <div style="padding: 24px 0 50px 0;">
                <?php echo form_error('txtFolder'); ?>
                <input class="txt" type="text" value="<?php echo set_value('txtFolder'); ?>" placeholder="Enter folder name" id="txtFolder" name="txtFolder" style="padding:8px 10px; font-size:16px;" maxlength="50" >&nbsp;&nbsp;
                <input type="button" style="padding:11px 56px;border-radius: 2px;font-size: 14px;" value="Create" name="create" id="addFolderBtn" class="btn_class btn-small primary">
            </div>
            <div style="float:left;display: none;margin: 30px 0 0 10px;" class="ajax_loader">
                <img alt="" src="/survey/images/loader.gif">
            </div>
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" />
            <input type="hidden" name="username" id="username" value="<?php echo $username;?>" />
        </form>
    </div>
    <?php
}
else
{
    ?>

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
        <form class="search-form" method="post" name="searchfolder" id="searchfolder" action="/survey/folder/<?php echo $username;?>">
            <div class="search_area" style=" display:block">
                <input name="new_search" id="new_search" type="text" placeholder="Search Folder" class="new_search_area" maxlength="120" onfocus="if (this.placeholder == 'Search') this.placeholder = ''; " onblur="if (this.placeholder == '') this.placeholder = 'Search';" autocomplete="off" value="<?php echo set_value('new_search'); ?>" style="background: rgb(255, 255, 255);border-width: 1px 0px 1px 1px;border-top-style: solid;border-right-style: initial;border-bottom-style: solid;border-left-style: solid;border-top-color: rgb(238, 238, 238);border-right-color: initial;border-bottom-color: rgb(238, 238, 238);border-left-color: rgb(238, 238, 238);border-image: initial;color: #464646;margin-left: 0px;margin-top: 20px;margin-bottom: 10px;padding: 15px 10px;float: left;width: 215px;font-size: 16px; height: 16px; border-radius: 3px;">
                <?php if (set_value('new_search') ==''){?>
                    <span id="searchMe_new" style="display: block;" class="searchMe_new text-search-icon">&nbsp;</span>
                    <span id="resetQuiz_new" style="display: none;" class="resetQuiz_new text-close-icon">&nbsp;</span>
                <?php }else{ ?>
                    <span id="searchMe_new" style="display: none;" class="searchMe_new text-search-icon">&nbsp;</span>
                    <span id="resetQuiz_new" style="display: block;" class="resetQuiz_new text-close-icon">&nbsp;</span>
                <?php } ?>
            </div>
            <div style="display: none;margin: 27px 0 0 5px;float: left;" class="search_loader ajax_loader1">
                <img alt="" src="/survey/images/loader.gif">
            </div>
        </form>
        <div class="create-folder-block">
            <form class="login-form" method="post" name="frmCreateFolder" id="frmCreateFolder" action="">
                <a id="linkCancel" href="javascript:void(0)" onclick="cancel_add_folder()" style="float: right;margin-top: 6px;display: none;font-size: 12px;">Cancel</a>
                <input type="button" style="display:none;" value="+ Add Folder" class="btn_class btn-big primary" id="addFolder">
                <input type="text" name="txtFolder" id="txtFolder" maxlength="50" style="margin:0;float: left;padding:4px 8px;display: none; float: right" class="txt" >
                <div class="ajax_loader1">
                    <img alt="" src="/survey/images/loader.gif">
                </div>
                <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" />
                <input type="hidden" name="username" id="username" value="<?php echo $username;?>" />
            </form>
            <a href="javascript:void(0)" id="addNewFolder" class="btn_class btn-big primary add_folder addNewFolder" onclick="add_folder()">+&nbsp;&nbsp;Add Folder</a>
        </div>
        <div class="clear"></div>
    </div>

    <form action="" id="frmAddSurvey" name="frmAddSurvey" method="post" class="login-form">
        <div class="display_folder_table">
            <div style="display: table-row;height: 26px;">
                <div class="org_tbl_head th_name"><span class="new_folder_icon"></span>Folder Name</div>
                <div class="org_tbl_head th_created" style="text-align: center;">Created</div>
                <div class="org_tbl_head th_admin" style="text-align: center;">Administrators</div>
                <div class="org_tbl_head th_survey" style="text-align: right;">Surveys</div>
            </div>
         <?php if(count($folder_info)>0):?>
             <?php foreach ($folder_info as $result):?>
                 <div class="folder_block" id="block_<?php echo $result->id;?>" style="display: table-row">

                     <div class="show_folder_name">
                         <div style="display:none;" id="edit<?php echo $result->id;?>" class="edit">
                             <input id="update_folder_name<?php echo $result->id;?>" name="update_folder_name" class="save-txt" type="text" value="<?php echo $result->foldername;?>" style="    padding: 8px 6px;border-radius: 2px; float: left;">
                             <input id="save_folder<?php echo $result->id;?>" onclick="save_folder('<?php echo $result->id;?>')" type="button" class="btn_class btn-small primary" value="Save" style="margin: 7px 0 0 10px;padding: 10px 50px;border-radius: 2px;float: left;">
                             <a style="margin: 15px 0 0px 11px;display: inline;float: left;font-size: 12px;" onclick="cancel_edit_folder('<?php echo $result->id;?>')" href="javascript:void(0)" class="show_opt" id="saveLinkCancel<?php echo $result->id;?>">Cancel</a>
                             <div style=" visibility: hidden;float: left;margin: 15px 6px 4px 10px;" id="loader<?php echo $result->id;?>">
                                 <img alt="" src="/survey/images/loader.gif">
                             </div>
                         </div>
                         <div  class="text_folder" id="show_edit<?php echo $result->id;?>">

                             <div class="show_folder" id="txt_<?php echo $result->id;?>">
                                 <span style="float:left;">
                                     <?php
                                     $max_char = 55;
                                     $fname = $result->foldername;
                                     if ((strlen($fname)>$max_char) && ($espacio = strpos($fname, " ", $max_char )))
                                     {
                                         $fname = substr($fname, 0, $espacio);
                                         $fname = $fname . "...";
                                     }
                                     echo ucwords($fname);
                                     if($result->shared_permission == 1){ echo '<span class="shared_text">(Shared)</span>';}
                                     ?>
                                 </span>
                                 <span class="edit_folder_btn edit_icon" style="display: none;" id="edit_folder<?php echo $result->id;?>" onclick="edit_folder('<?php echo $result->id;?>')"> </span>
                             </div>

                             <div class="show_option" id="hide_edit<?php echo $result->id;?>" style="display: none;">
                                 <a class="view_folder tooltip_11" href="/survey/folder/view/<?php echo $username;?>/<?php echo $result->foldername;?>/" title="" style="float: none;font-size: 12px;display: inline;text-align: left;margin: 0;">View</a>
                                 <span style="color:#cfcfcf;">&nbsp;</span>
                                 <a class="add_a_survey tooltip_11" href="/survey/folder/add/<?php echo $username;?>/<?php echo $result->foldername;?>/" title="" rel="<?php echo $result->id;?>" style="float: none;font-size: 12px;display: inline;text-align: left;margin: 0;">Add A Survey</a>
                                 <span style="color:#cfcfcf;">&nbsp;</span>
                                 <a class="invite_a_survey tooltip_11" id="invite_a_survey<?php echo $result->id;?>" href="/survey/folder/invite/<?php echo $username;?>/<?php echo $result->foldername;?>/" style="float: none;font-size: 12px;display: inline;text-align: left;margin: 0;">Invite</a>
                                 <span style="color:#cfcfcf;">&nbsp;</span>
                                 <a class="delete_folder del_quiz tooltip_11" value="<?php echo $result->id;?>"  rel="/survey/folder/delete/<?php echo $result->id;?>" style="float: none;font-size: 12px;display: inline;text-align: left;margin: 0;">Delete</a>
                             </div>
                         </div>
                     </div>

                     <div class="date_area" id="date_area<?php echo $result->id;?>"><?php echo date("M j, Y",strtotime($result->create_date));?></div>

                     <div class="instruc_data" id="instruc_data<?php echo $result->id;?>">
<input type="button" onclick="window.location = '/survey/folder/invite/<?php echo $username;?>/<?php echo $result->foldername;?>/'" class="btn_instruct" name="1" value="<?php echo $CI->Mdl_folder->get_instructor_count($user_id, $result->id )?>">
</div>
                     <div class="quiz_area"><?php echo $CI->Mdl_folder->getSurveyCount($user_id, $result->id); ?></div>

                 </div>
             <?php endforeach; ?>
         <?php else:?>
             <h1 style="margin:30px 0px 0px 0px;font-weight: normal;font-size: 160%;text-align: center;">Folder not exist. </h1>

         <?php endif;?>


        </div>
        <br><br>
        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" />
        <input type="hidden" name="username" id="username" value="<?php echo $username;?>" />

        </table>
    </form>
    <?php
}
?>


<div style="display:none;" class="blockDelete">
    <div style="z-index: 1000; border: medium none; margin: 0pt; padding: 0pt; width: 100%; height: 100%; top: 0pt; left: 0pt; background-color: rgb(0, 0, 0); opacity: 0.6; cursor: wait; position: fixed;" class="blockUI blockOverlay"></div>
    <div style="z-index: 1001; position: fixed; padding: 15px; margin: 0px; width: 30%; top: 40%; left: 35%; text-align: center; color: rgb(0, 0, 0); border: medium none; background-color: rgb(0, 0, 0); cursor: wait; opacity: 0.5;" class="blockEdit blockMsg blockPage" id="save_edit"><span style="border-bottom:none;text-align:center;color:white; font-size:160%; font-weight:bold;">Deleting, please wait...</span></div>
</div>
</div>
