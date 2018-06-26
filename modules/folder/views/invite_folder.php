<?php
//require_once($_SERVER['DOCUMENT_ROOT'].'/api/ipbwi/ipbwi.inc.php');
//echo $username.'=<br>'.$folder_name.'=<br>'.$no_of_survey.'=<br>'.$db_userid.'=<br>'.$folder_id;
if(!isset($_COOKIE['ppUser']))
{
    header("Location: /survey/");
}
$url_recurly_unique_id	=	$user_results->RecurlyAccount;
$url_parent_account		=	$user_results->parent_account;
$url_subaccount			=	$user_results->subaccount;
$url_user_id			=	$user_results->user_id;
$url_Customer			=	$user_results->Customer;
$url_PurchasedPlanCode	=   $user_results->PurchasedPlanCode;
$freetrial_status		=   $user_results->freetrial_status;
$login_user 	        =   $user_results->user_login;
$user_level 			= 	$user_results->user_level;

if($url_parent_account == 0)
{
    $instructor_info_array = array();

    foreach ($instructor_info as $info):

        $instructor_name 	= $info->user_login;
        $instructor_userid  = $info->user_id;
        $instructor_email 	= $info->user_email;

        $temp_instructor_info_array = array();
        $temp_instructor_info_array['user_login'] =  $instructor_name;
        $temp_instructor_info_array['user_email'] =  $instructor_email;
        $temp_instructor_info_array['user_id'] =  $instructor_userid;

        array_push($instructor_info_array, $temp_instructor_info_array);

    endforeach;
    //print_r($instructor_info_array);
}
?>

</div>

<div class="full_div">
    <div class="container">
        <div class="folder_bread"><a href="/survey/folder/<?php echo $username;?>" title="Organize Folders">Organize Folders</a>&nbsp;&nbsp;›&nbsp;&nbsp;<span>Invite</span></div>
    </div>
</div>

<div class="container">

    <div class="success_result" style="display: none;text-align: center;padding-top: 15px;"><img src="https://www.proprofs.com/api/signup/images/icon_right.png" style="margin-right: 4px;"><span class="data_success"></span> administrator(s) Invited</div>

<div class="user_instruct_menu" style="margin: 25px 0 25px -15px;">
    <div style="float:left;">
        <span id="product_icon"><a class="icon_style" href="/survey/" title="Surveys">Surveys</a></span>
    </div>
    <div style="float:left;">
        <span id="my_user_icon"><a class="icon_style" href="/survey/classroom/manage.php?login=<?= $username;?>" title="My Users">Users</a></span>
    </div>
    <div style="float:left;">
        <span id="my_ins_icon"><a class="icon_style" href="/survey/myinstructor/?login=<?=$username;?>" title="My Administrators">Administrators</a></span>
    </div>
    <div style="clear:both;"></div>
</div>

    <?php
    if(!empty($instructor_info_array)){
        $shared_user_array = array();
        $shared_userid_array = array();

        foreach($shared_info_res as $shared_info)
        {
            $shared_userid = $shared_info->user_id;
            $shared_per		= $shared_info->shared_permission;
            $shared_name 	= $shared_info->user_login;
            $shared_email 	= $shared_info->user_email;

            $temp_shared_info_array = array();
            $temp_shared_info_array['user_login'] =  $shared_name;
            $temp_shared_info_array['user_email'] =  $shared_email;
            $temp_shared_info_array['user_id'] =  $shared_userid;
            $temp_shared_info_array['shared_permission'] =  $shared_per;

            array_push($shared_user_array, $temp_shared_info_array); //array contains all the data from db which is previously assigned
            array_push($shared_userid_array, $shared_userid);	// array contain all the userid
        }

    ?>
        <div class="container1" style="height:auto;width:100%">
            <div style="width: 100%;float: left;margin-bottom: 10px;">
                <div style="float: left;width: 26%;color: #4d4d4d;font-weight: 500;font-size: 19px; margin: 0px 0 22px -1px;min-width: 128px;">
                    <span class="new_folder_icon"></span><?php echo ucwords($folder_name);?>
                </div>

                <div class="asignBtn" style="float: right; display: block">
                    <input type="button" id="assignfolder" class="btn_class btn-big primary submit_org" value="Assign" style="border-radius: 2px;padding: 11px 22px; float: left;">
                </div>
                <div style="float:right;display: none;margin: 10px 7px 0px 0" class="ajax_loader">
                    <img alt="" src="/survey/images/loader.gif">
                </div>

            </div>
            <span style="font-size: 12px;float: left;margin: -30px 0 0 25px;">(Invite people to folder)</span>
            <div class="main_content">
                <span style="font-size: 14px;float:left;width: 100%;padding: 5px 0 10px 0;">When you invite administrators to folder, multiple administrators can view survey stored in this folder and collabrate on content or view results.</span>
                <form name="frminvite" id="frminvite" method="post">

                    <div class="left_blk">
                        <div class="heading_list" style="padding: 0;"></span></div>
                        <div class="heading_li"></span></div>
                        <?php
                        foreach($instructor_info_array as $key => $val){
                            $person_id	=	$key;
                            $person_name	=	$val['user_login'];
                            $person_email	=	$val['user_email'];
                            $person_id	=	$val['user_id'];
                            if(in_array($person_id, $shared_userid_array))
                            {
                                $found=1;
                            }else{
                                $found= 0;
                            }
                            ?>
                            <div class="person_area">
                                <div class="person_name_blk" style="font-size: 15px;">
                                    <?php   if($found==1){
                                        $class_show = "checkbox_sel_list_inv";
                                    }else{
                                        $class_show = "checkbox_icon_inv_list";

                                    }?>
                                    <label for="person_id_<?php echo $person_id; ?>" class="<?php echo $class_show;?> for_<?php echo $person_id; ?>"></label>
                                    <input type="checkbox"  <?php if($found==1){ ?>	checked="true"<?php } ?>  style="display: none;" data-text="<?php echo $person_id."-".$person_name."-".$person_email; ?>" id="person_id_<?php echo $person_id?>" class="person_chck" >
                                    <div class="name_blk"><?php echo $person_name?></div></div>
                                <div class="person_email_blk" ><?php echo $person_email?></div>
                            </div>
                            <?php
                        }?>
                    </div>

                    <div class="right_blk">
                        <div class="heading_list" style="padding: 0px 1px" >Sharing with</span></div>
                        <div class="heading_li" style="padding: 0px 0px" >Permissions</span></div>
                        <div class="select_list" style="margin-bottom: 5px;" >
                            <?php

                            foreach ($shared_user_array as $key => $value) {
                                $shared_userid = $value['user_id'];
                                $shared_name = $value['user_login'];
                                $shared_email = $value['user_email'];
                                $allot_per = $value['shared_permission'];

                                ?>
                                <div id="name_edit_<?php echo $shared_userid; ?>" class="name_edit" style="color:#909090;border-bottom: 1px solid #eee;    margin-bottom: 5px;">
                                    <input type="hidden" id="share_name_<?php echo $shared_userid; ?>" name="share_name_<?php echo $shared_userid; ?>" value="<?php echo $shared_name;?>" />
                                    <a class="deleteuseredit delete_asign"  dugid="<?php echo $shared_userid; ?>"><img src="/survey/httpdocs/static/images/close.png?v=1" style="vertical-align:middle;" class="del_img" /></a>
                                    <div class="text_blk"><?php echo $shared_name; ?></div>
                                    <div class="per_area">
                                        <select  id="per_sel_<?php echo $shared_userid; ?>" class="permission_all" name="per_sel_<?php echo $shared_userid; ?>">
                                            <option value="0">View</option>
                                            <option <?php if($allot_per==1){?> selected <?php } ?> value="1">Edit</option>
                                        </select>
                                    </div>
                                    <div class="email_area" ><?php echo $shared_email; ?> </div>
                                </div>

                            <?php } ?>

                        </div>

                        <?php if(count($shared_user_array)==0){

                            ?>
                            <div class="blank_share" style="display:block;"> <img class="" src="/survey/httpdocs/static/images/blank_share_new.png?v=1" style="vertical-align:middle;"></div>
                            <?php
                        } ?>
                    </div>
                    <div class="clear"></div>
                    <hr class="hr-bottom" style="border-top: 1px solid #eee;">
                    <div style="float: right;">
                        <a onclick="return $('.ajax_loader1').show();" style="float: right;padding: 14px 0px;" href="/survey/folder/<?php echo $username;?>"><img style="width: 13px;" src="/flashcards/images/Back_Hover.png?v=3">&nbsp;Back</a>
                    </div>
                    <br>

                    <br>
                    <input type="hidden" id="foldername" name="foldername" value="<?php echo $folder_name;?>" />
                    <input type="hidden" name="username" id="username" value="<?php echo $username;?>" />
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" />
                    <input type="hidden" name="per_data" id="per_data" value="" />
                    <input type="hidden" name="folder_id" id="folder_id" value="<?php echo $folder_id; ?>" />

                </form>


            </div>

        </div>
    <?php
    }else{
    ?>
    <div class="container" style="height:auto;width:100% !important">

        <div class="main_content" style="text-align: center;">
            <img src="https://www.proprofs.com/survey/images/empty.jpg">
            <h1 style="font-size: 30px;font-weight: 500; color: #4d4d4d;line-height: 1.5;">Collaborate using shared folders</h1>
            <h3 style="font-size: 20px; color: #4d4d4d;line-height: 1.5;">You don't have any administrators right now. To proceed further, add one.</h3><br>
            <a title="Add Administrator" href="/survey/myinstructor/?login=<?php echo $username;?>" class="btn_class btn-big primary add_instruc" style="border-radius: 2px;padding: 12px 22px;">Add Administrator</a><br><br><br><br>

        </div>

    </div>
<?php
}
?>

<div style="display:none;" class="blockDelete">
    <div style="z-index: 1000; border: medium none; margin: 0pt; padding: 0pt; width: 100%; height: 100%; top: 0pt; left: 0pt; background-color: rgb(0, 0, 0); opacity: 0.6; cursor: wait; position: fixed;" class="blockUI blockOverlay"></div>
    <div style="z-index: 1001; position: fixed; padding: 15px; margin: 0px; width: 30%; top: 40%; left: 35%; text-align: center; color: rgb(0, 0, 0); border: medium none; background-color: rgb(0, 0, 0); cursor: wait; opacity: 0.5;" class="blockEdit blockMsg blockPage" id="save_edit"><span style="border-bottom:none;text-align:center;color:white; font-size:160%; font-weight:bold;">Deleting, please wait...</span></div>
</div>
