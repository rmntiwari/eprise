<?php  defined('BASEPATH') OR exit('No direct script access allowed');

$userLogin = $this->input->cookie('ppUser', false);
$current_user_id = $username;
$attempt_days_sq = $days;
//echo 'current_user_id==='.$current_user_id.' ,      attempt_days_sq=='.$attempt_days_sq.'<br>';
foreach($user_result as $user_row):
    $customer_value       = $user_row->Customer;
    $user_level = $user_row->user_level;
endforeach;

$customer = 0;
$_cust_type = 'no';
$is_authorised = "no";
if($customer_value=='1')
{
    $customer = 1;
    $_cust_type = 'yes';
}
//$survey_authorname = $ipbwi->member->id2name($_userid);
if ($user_level == 'admin' || $userLogin == 'webteam.proprofs' || $userLogin == 'dev.proprofs'){
    $is_authorised = "yes";
}
?><style>#searchMe,div#Search_container_div{border-style:solid;border-color:#eee}#delete_survey,#delete_survey:hover{padding:14px 34px 0 0;color:#4d4d4d;margin:-2px 0 0 -37px!important;text-decoration:none;cursor:pointer}li.ac_drop>ul.dropdown-menu.dropdown_side.myacdrop{left:36px}ul.prod-desk>li.dropdown.ac_drop{height:42px}th{font-weight:400!important;font-family:sans-sarif;text-align:left;color:#000!important}div#Search_container_div{border-width:1px}#searchMe{border-width:1px 1px 1px 0}#employee_grid_filter{display:none}#delete_survey{background:url(/survey/report/images/delete.png) 5px -272px no-repeat;width:24px;height:32px}#delete_survey:hover{background:url(/survey/report/images/delete.png) 5px -305px no-repeat}input[type=checkbox]:checked+label.checkbox_css,input[type=checkbox]:checked+label.checkbox_css:hover{background:url(/survey/report/images/Mutliple_checkbox.png) 0 -40px no-repeat;height:19px;width:20px;display:inline-block;background-size:96%}input[type=checkbox]:hover+label.checkbox_css{background:url(/survey/report/images/Mutliple_checkbox.png) 0 -20px no-repeat #f6f6f6;height:19px;width:20px;display:inline-block;background-size:96%}input[type=checkbox]+label.checkbox_css{background:url(/survey/report/images/Mutliple_checkbox.png) no-repeat #fff;height:19px;width:20px;display:inline-block;background-size:96%}#employee_grid_length{margin:-42px 0 33px!important}#employee_grid_length>label>select{height:32px!important}#employee_grid_length>label>{color:#4d4d4d!important;font-weight:500}label{font-weight:500!important;font-size:15px}table.dataTable thead td,table.dataTable thead th{padding:10px 11px!important;border-bottom:none!important}body tbody tr{font-weight:500}table.dataTable.display tbody tr.odd,table.dataTable.display tbody tr.odd>.sorting_1,table.dataTable.display tbody tr>.sorting_1,table.dataTable.display tbody tr>.sorting_2,table.dataTable.display tbody tr>.sorting_3,table.dataTable.order-column tbody tr>.sorting_1,table.dataTable.order-column tbody tr>.sorting_2,table.dataTable.order-column tbody tr>.sorting_3,table.dataTable.order-column.stripe tbody tr.odd>.sorting_1,table.dataTable.stripe tbody tr.odd{background-color:#fff!important}table.dataTable.display tbody td,table.dataTable.display tbody th,table.dataTable.display tbody tr:first-child td,table.dataTable.display tbody tr:first-child th,table.dataTable.row-border tbody td,table.dataTable.row-border tbody th,table.dataTable.row-border tbody tr:first-child td,table.dataTable.row-border tbody tr:first-child th{border-top:1px solid #eee!important}table.dataTable.display tbody tr:hover,table.dataTable.display tbody tr:hover>.sorting_1,table.dataTable.hover tbody tr:hover,table.dataTable.order-column.hover tbody tr:hover>.sorting_1{background-color:#f6f6f6!important}.dataTables_wrapper .dataTables_paginate .paginate_button.current,.dataTables_wrapper .dataTables_paginate .paginate_button.current:hover,.dataTables_wrapper .dataTables_paginate .paginate_button:hover{background-color:#3c8ac9!important;background:-webkit-gradient(linear,left top,left bottom,color-stop(0,#3c8ac9),color-stop(100%,#3c8ac9))!important;background:-webkit-linear-gradient(top,#3c8ac9 0,#3c8ac9 100%)!important;background:-moz-linear-gradient(top,#3c8ac9 0,#3c8ac9 100%)!important;background:-ms-linear-gradient(top,#3c8ac9 0,#3c8ac9 100%)!important;background:-o-linear-gradient(top,#3c8ac9 0,#3c8ac9 100%)!important;background:linear-gradient(to bottom,#3c8ac9 0,#3c8ac9 100%)!important}.dataTables_wrapper .dataTables_paginate .paginate_button.disabled,.dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active{background-color:#fff!important;background:-webkit-gradient(linear,left top,left bottom,color-stop(0,#fff),color-stop(100%,#fff))!important;background:-webkit-linear-gradient(top,#fff 0,#fff 100%)!important;background:-moz-linear-gradient(top,#fff 0,#fff 100%)!important;background:-ms-linear-gradient(top,#fff 0,#fff 100%)!important;background:-o-linear-gradient(top,#fff 0,#fff 100%)!important;background:linear-gradient(to bottom,#fff 0,#fff 100%)!important}// .dataTables_wrapper .dataTables_paginate .paginate_button:hover{// padding:3px 10px 2px 10px;// border:0!important}a.dt-button.buttons-columnVisibility.active{background-color:#eef9f4!important;color:#1e72b4!important;border-bottom:2px solid #fff!important}.dropdown-menu>li>a,.dropdown-menu>li>a:focus,.nav .open>a,.nav .open>a:focus,.nav .open>a:hover,body{background-color:#fff!important}a.dt-button,button.dt-button,div.dt-button{position:relative;display:inline-block;padding:.5em;cursor:pointer;color:#4d4d4d!important;font-size:15px!important;font-family:roboto;//width:150px}.collapse,.header_saperate_line{display:block!important}table.dataTable thead .sorting,table.dataTable thead .sorting_asc,table.dataTable thead .sorting_asc_disabled,table.dataTable thead .sorting_desc,table.dataTable thead .sorting_desc_disabled{background-position:left!important}table.dataTable thead .sorting_asc{padding:5px 4px 4px 18px!important}table.dataTable thead .sorting,table.dataTable thead .sorting_desc{padding:0 0 0 18px!important}.row{margin-top:-14px;font-family:roboto}table>thead>tr>th,thead tr th{font-family:sans-serif!important}body{color:#1d1c1c!important}thead tr th{text-align:center}.dataTables_wrapper .dataTables_processing{top:0!important}.dataTables_wrapper .dataTables_info{font-weight:700}#employee_grid_wrapper{padding:0 0 40px; min-height: 400px}table.dataTable.no-footer{border-bottom:none!important;padding:0 0 44px}.dataTables_wrapper .dataTables_paginate .dataTables_wrapper .dataTables_paginate.current:hover,.dataTables_wrapper .dataTables_paginate .paginate_button.disabled,.dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active,.dataTables_wrapper .dataTables_paginate .paginate_button:hover{border:1px solid #fff!important}.dataTables_info{font-size:15px}.dataTables_wrapper .dataTables_paginate .paginate_button{padding:.2em .7em!important}table.dataTable.display tbody td,table.dataTable.display tbody th,table.dataTable.row-border tbody td,table.dataTable.row-border tbody th{border-bottom:1px solid #f1f1f1}table>thead>tr>th{color:#000!important;font-weight:600!important;text-align:justify}@media (min-width:1200px){.container,.navbar-fixed-bottom .container,.navbar-fixed-top .container,.navbar-static-top .container{width:1133px!important}ul.dropdown-menu.dropdown_side.myacdrop{margin:5px 0 0 -20px!important}}.prod-drop .dropdown-menu li a{padding:7px 26px;width:0%}li#knowledge>a{width:0!important}.text-close-icon,.text-search-icon{width:35px;float:right;border-left:0}.dropdown-menu>li>a,.dropdown-menu>li>a:focus{color:#3B5998!important;text-decoration:none}.dropdown-menu>li>a:focus,.dropdown-menu>li>a:hover{color:#4d4d4d!important;text-decoration:none;background-color:#fff!important}.collapse{margin-right:11px!important}div#bor_rad{margin:-6px 0 0 -105px!important}a,li>a{text-decoration:none!important}// .open>a:hover{// background-color:#fff!important;// color:#000!important;// border-color:#337ab7}a#dropdownMenu6:hover{color:#000!important}b.caret.mr-lt10{margin-top:0!important}.tooltip-inner{border-radius:0!important}.text-search-icon{background:url(/quiz-school/img/search.png) 2px no-repeat #fff;height:28px!important;border-top:none;border-right:none;border-bottom:none;border-radius:0 .25em .25em 0;border-top-right-radius:4px!important;border-bottom-right-radius:4px!important}.text-close-icon{background:url(/quiz-school/img/close_search.png) 2px no-repeat #fff;height:38px!important;border-radius:0 .25em .25em 0;cursor:pointer}.dataTables_wrapper,.dataTables_wrapper .dataTables_paginate .paginate_button.current{border:1px solid #fff!important}.dataTables_wrapper .dataTables_paginate .paginate_button.current,.dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{color:#fff!important}@media only screen and (min-device-width :700px) and (max-device-width :2024px){.dataTables_wrapper .dataTables_paginate .paginate_button.current,.dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{color:#fff!important}}td:nth-child(4),th:nth-child(4){text-align:center}div#Search_container_div{margin:10px 0 0!important}#information{padding:5px;margin:15px 0;font-size:14px;line-height:18px;background-color:#EEE;color:#4D4D4D;-moz-border-radius:2px;-webkit-border-radius:2px}.recen_dropdwn{float:left;margin-top: 10px;margin-left: 0;font-size: 15px;font-family: roboto;color: #4d4d4d;font-weight: 500;}#cnfrmHeading-pop{line-height: 1.42857143;}#employee_grid_processing{background: center}</style>

<link rel="stylesheet" type="text/css" href="/api/css/new_button_style.css?v=9" media="screen" />

<div id="breadcrumb" style="">
    <a onmouseover='this.style.color="#4d4d4d"' onmouseout='this.style.color="#3B5998"' href='/survey/user.php?login=<?php echo $userLogin;?>' title='My Surveys' style='color:#3b5998;'>My Surveys</a>&nbsp;&nbsp;›&nbsp;&nbsp;Recent Activity Report</span>&nbsp;
</div>

<?php
if($is_authorised == 'yes')
{
    if($_cust_type == 'no')
    {
        ?>
        <div style="padding:10px 0;margin-left:438px;width:660px;" class="msgupgrade" id="information">
            <div style="margin-left:20px;">
                <div align="center" style="font-size:18px;margin:1px 0px 15px 0px;"><strong>Upgrade required to access this report and data.</strong></div>

                <div style="text-align:center;">
                    <ul style="list-style: none;">
                        <li class="my_wrapper" style="margin-bottom: 10px;">
                            <span class="my_left_box"><img src="/survey/images/correct_ans.gif"></span><span class="my_right_box">See all activites across all surveys centrally</span>
                        </li>
                        <li class="my_wrapper" style="margin-bottom: 10px;">
                            <span class="my_left_box"><img src="/survey/images/correct_ans.gif"></span><span class="my_right_box"> Track reports of a takers across surveys</span>
                        </li>
                        <li class="my_wrapper">
                            <span class="my_left_box"><img src="/survey/images/correct_ans.gif"></span><span class="my_right_box">See scores or download data across all surveys</span>
                        </li>
                    </ul>
                    <br>
                </div>
                <div align="center" style="color:#fff;font-size:1.2em;margin-bottom: 10px;">
                    <a target="_top" href="/survey/signup/business/" style="text-decoration: none!important; color:#fff !important;font-size:1.2em !important; padding:12px 25px !important;" class="btn_class btn-big primary">Upgrade</a>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br>
        <?php
    }
}
?>

    <div class="recen_dropdwn">Recent Activity:
        <select style="height:32px;margin-left: 5px;" name="attemptsof_a_days" id="attemptsof_a_days" onchange="window.location='/survey/recent/<?php echo $userLogin;?>/'+this.value">
            <option value="0" <?php if(($attempt_days_sq =="0")){?> selected="selected"<?php }?>>Today</option>
            <option value="1" <?php if(($attempt_days_sq == "1")){?> selected="selected"<?php }?>>Yesterday</option>
            <option value="7"  <?php if(($attempt_days_sq == "7")){?> selected="selected" <?php } ?>>Last 7 days</option>
            <option value="14"  <?php if(($attempt_days_sq == "14")){?> selected="selected" <?php } ?>>Last 14 days</option>
            <option value="30"  <?php if(($attempt_days_sq == "30")){?> selected="selected" <?php } ?>>Last 30 days</option>
            <option value="60"  <?php if(($attempt_days_sq =="60")){?> selected="selected" <?php } ?>>Last 60 days</option>
            <option value="90"  <?php if(($attempt_days_sq =="90")){?> selected="selected" <?php } ?>>Last 90 days</option>
            <?php
            $firstYear ="2011";
            $lastYear = (int)date('Y');
            for($i=$lastYear;$i>=$firstYear; $i--)
            {
                ?>
                <option value="<?php echo $i;?>"  <?php if(($attempt_days_sq ==$i)){?> selected="selected" <?php } ?>><?php echo $i; ?></option><?php

            }
            ?>
        </select>
    </div>

<div class="downshare" style="float: right;margin:22px 0 0 0">
        <a onClick="document.location.href='/survey/recent/recent_survey_reports/<?=$current_user_id;?>/30'" style="cursor: pointer;background: url(/survey/images/nps/reports_page_icons_new.png)no-repeat;    padding: 0px 10px 11px 31px;background-position: 9px -137px;color: #4d4d4d;
    text-decoration: none; height:10px !important;" data-toggle="tooltip" data-placement="top" title="Download" id="download_icon"></a>
</div>
<hr style="margin: 73px 0px 25px 0px;border: 0;border-top: 1px solid #eee;"/>

<div style="float:right; border:1px solid #ddd !important;" id="Search_container_div" >
    <input name="textSearch" id="keyword" type="text" placeholder=" Search" maxlength="120" onFocus="if (this.placeholder == 'Search') this.placeholder = ''; " onBlur="if (this.placeholder == '') this.placeholder = 'Search';" value="<?php //echo $search_val;?>"autocomplete="off" style="height: 38px;width: 250px;border: 1px solid #eee;border-radius: 0 0.25em 0.25em 0;border-right: none;font-weight: 200;border:none!important;padding-left: 5px;" />
    <span id="searchMe" class="text-search-icon" style="height: 38px!important;">&nbsp;</span>
    <span id="resetSearch" class="text-close-icon" style="display:none;">&nbsp;</span>
</div>

<form id="recent_report" name="recent_report">
    <div class="delete_scor_btn" style="height: 35px;width: 24px;margin-left: 204px;margin-top: 40px;">
        <a onclick="confirm_record();" id="delete_survey" class="btn_class delete_confirm" style="display: none;     position: absolute;" name="Delete" value="Delete" type="submit" data-toggle="tooltip" data-placement="top" title="Delete">
        </a>
        <span class="delete_status"></span>
    </div>
    <div class="">
        <table id="employee_grid" class="display" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>
                    <div class="DataTables_sort_wrapper" style="padding: 0px 40px 0px 0px;">
                        <label class="anslabel">
                            <input type="checkbox" id="chk0" style="display: none;">
                            <label for="chk0" id="checkbox_all_rep" class="checkbox_css" style="margin: 0px 0px -4px 0px !important;"></label>
                        </label>
                        <input name="delete_records" value="1" id="report_survey" type="checkbox"  checked="checked" style="display:none;" />
                    </div>
                </th>
                <th>Date</th>
                <th>Title</th>
                <th>Report</th>
                <th>Name</th>
                <th>Email</th>
                <th>Ip Address</th>
            </tr>
            </thead>
            <tbody>
            <tr role="row" class="odd">
                <td colspan="7"><label><label style="margin: 1px 3px -7px 0px;"></label></label></td>
            </tr>
            </tbody>
        </table>
    </div>
    </div>
</form>

<style>
    @media only screen and (min-device-width : 700px) and (max-device-width : 2024px)
    {
        .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover
        {
            color: white !important;
        }
        ul.dropdown-menu.dropdown_side.myacdrop{
            margin: 4px 0px 0px -19px!important;

        }
    }.tooltip.top .tooltip-arrow {
        bottom: -4px;
        left: 50%;
        margin-left: -5px;
        border-width: 5px 5px 0;
        border-top-color: #000;
    }.tooltip-arrow {
         position: absolute;
         width: 0;
         height: 0;
         border-color: transparent;
         border-style: solid;
     }.tooltip-inner {
          max-width: 200px;
          padding: 3px 8px;
          color: #fff;
          text-align: center;
          background-color: #000;
          border-radius: 4px;
      }.tooltip {
           position: absolute;
           z-index: 1070;
           display: block;
           font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
           font-size: 12px;
           font-style: normal;
           font-weight: 400;
           line-height: 1.42857143;
           text-align: left;
           text-align: start;
           text-decoration: none;
           text-shadow: none;
           text-transform: none;
           letter-spacing: normal;
           word-break: normal;
           word-spacing: normal;
           word-wrap: normal;
           white-space: normal;
           filter: alpha(opacity=0);
           opacity: 0;
           line-break: auto;
       }
</style>