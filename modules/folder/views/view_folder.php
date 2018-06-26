<?php
if(!isset($_COOKIE['ppUser']))
{
    header("Location: /survey/");
}
?>

</div>
<div class="full_div">
    <div class="container">
        <div class="folder_bread"><a href="/survey/folder/<?php echo $username;?>" title="Organize Folders">Organize Folders</a>&nbsp;&nbsp;›&nbsp;&nbsp;<span>View</span></div>
    </div>
</div>

<div class="container">
    <div class="folder_menu_block">
        <div class="user_instruct_menu" style="<?php if($no_of_survey == 0){?> display: none;<?php } ?>">
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

<?php if($no_of_survey == 0):?>
<div align="center">
    <img src="https://www.proprofs.com/quiz-school/img/blank_img.png" style="margin-top: 10px;width: 330px;">
    <h1 style="margin:40px 0px 15px 0;text-align: center; font-size: 160%;">You have not added any survey to this folder</h1>
    <a onclick="return $('.ajax_loader').show();" title="Add a Survey" href="/survey/folder/add/<?php echo $username;?>/<?php echo $folder_name;?>/" class="add_another_survey"><input  type="button" class="btn_class btn-big primary" value="Add A Survey" style="padding: 10px 20px; border-radius: 2px"></a>

</div>
    <img style="margin: -25px 547px;display: none;position: absolute;" class="ajax_loader" alt="" src="/survey/images/loader.gif">
<br><br>
<?php else:?>
    <a class="del_quiz_all delet_show" id="removeSurveyFromFolder" style="width: 78px; margin: 55px -178px 0px; display: none; position: absolute;"><div class="delet_text">Remove</div></a>

    <div style="width: 100%;float: left;margin-bottom: 10px;">
        <div style="float: left;width: 26%;color: #4d4d4d;font-weight: 500;font-size: 19px; margin: 0px 0 22px -1px;min-width: 128px;">
            <span class="new_folder_icon"></span><?php echo ucwords($folder_name);?>
        </div>
    </div>

    <div class="show-survey" style="margin-top: 60px;">
        <div class="thead">
            <div class="org_tbl_head" style="width: 70%;">
                <label for="all" class="checkbox_icon_view"></label>
                <input type="checkbox" name="all" id="all" class="checkbox" style="margin:6px 0 0 6px; display: none;" onclick="CheckedUnchecked(this.checked)"> <div style="margin: 2px 0 3px 30px;">Survey Name</div>
            </div>
            <div class="org_tbl_head" style="text-align: center;width: 17%;">Created</div>
            <div class="org_tbl_head" style="text-align: center;width: 14%;">Action</div>
        </div>
    </div>

<div class="verticle_scroll">
    <div class="show-survey">

        <div class="tbody">
            <?php foreach ($survey_results as $row):  ?>
                <div class="row_quiz" id="row_<?php echo $row->survey_id;?>">
                    <div class="show_text_survey" style="width: 70%">
                        <label for="check_<?php echo $row->survey_id;?>" class="checkbox_icon_view_list for_<?php echo $row->survey_id;?>"></label><input type="checkbox" name="addChk" id="check_<?php echo $row->survey_id;?>" class="checkbox check_<?php echo $row->survey_id;?>" value="<?php echo $row->survey_id;?>" style="display: none;">
                        <div class="" style="float: left;width: 95%;"><?php echo $row->title;?></div>
                    </div>
                    <div class="date_area" style="width: 20%;"><?php echo date("M j, Y",$row->modified_date);?></div>
                    <div class="date_area" style="width: 10%;">
                        <span class="del_quiz delete_survey delete"  value="<?php echo $row->survey_id;?>" rel="/survey/folder/delete_survey/<?php echo $row->survey_id."/".$user_id;?>"></span>
                    </div>

                </div>

            <?php endforeach;?>
        </div>
    </div>
</div>

    <form id="frmViewSurveyFolder" method="post">
        <input type="hidden" id="userid" name="userid" value="<?php echo $user_id;?>">
        <input type="hidden" name="username" id="username" value="<?php echo $username;?>" />
        <input type="hidden" id="del_select_sm_id" name="del_select_sm_id" value="">
        <input type="hidden" id="folderId" name="folderId" value="">
        <input type="hidden" id="foldername" name="foldername" value="<?php echo $folder_name;?>">
    </form>
    <div style="float: right;">
        <a onclick="return $('.ajax_loader').show();" style="float: right;padding: 14px 0px;" href="/survey/folder/<?php echo $username;?>"><img class="ajax_loader" style="width: 13px;
" src="/flashcards/images/Back_Hover.png?v=3">&nbsp;Back</a>
            <img style="margin: 14px 6px;float: right;display: none;" class="ajax_loader" alt="" src="/survey/images/loader.gif">
    </div>
    <br>

<?php endif;?>


<div style="display:none;" class="blockDelete">
    <div style="z-index: 1000; border: medium none; margin: 0pt; padding: 0pt; width: 100%; height: 100%; top: 0pt; left: 0pt; background-color: rgb(0, 0, 0); opacity: 0.6; cursor: wait; position: fixed;" class="blockUI blockOverlay"></div>
    <div style="z-index: 1001; position: fixed; padding: 15px; margin: 0px; width: 30%; top: 40%; left: 35%; text-align: center; color: rgb(0, 0, 0); border: medium none; background-color: rgb(0, 0, 0); cursor: wait; opacity: 0.5;" class="blockEdit blockMsg blockPage" id="save_edit"><span style="border-bottom:none;text-align:center;color:white; font-size:160%; font-weight:bold;">Remove, please wait...</span></div>
</div>
