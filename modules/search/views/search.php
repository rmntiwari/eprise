<?php  defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
  echo form_error("search","<p style='color:red'>","</p>");
 //echo form_submit(["type"=>"submit", "value"=>"Search","class"=>"btn btn-default"]);
 $CI =& get_instance();
 $CI->load->model('Mdl_search');
?>

<div class="container">
    <div style="float: left; margin:20px 0px 20px 0px; width:100% !important;" id="serach_box_res">
        <?=form_open("/search/", ["method"=>"post", "class"=>"form-inline", "id"=>"hsearchForm", "name"=>"searchForm"]);?>
        <input type="text" id="searchsite" class="search_title" name="search" value="<?=ucwords($search_title)?>" maxlength="120" placeholder="Search Surveys">

        <div style="width: 50px;float: left; background:url('https://www.proprofs.com/survey/images/search-icon.png') center #1888cc no-repeat;cursor:pointer;display:inline-block; height:37px;" onclick="checksearch();" title="Search" class="button_search"></div>
        <?php echo form_close();?>
    </div>

    <div style="margin:10px 0">
        <h3><span class="color_gray"><?=ucwords($search_title)?> </span> Surveys</h3>
        <span style="font-size:14px; color:#777777;"><?=$total_row?> <span class="color_gray"><?=ucwords($search_title)?> </span> Surveys </span>
        <br>
        <div style="margin: 2px 0px;">
            The following is a list of surveys tagged <strong><?=ucwords($search_title),PHP_EOL;?></strong> at Survey Maker
        </div>
    </div>
    <?php if(count($result)):?>
    <?php foreach($result as $row):?>
            <div class="browseSur">
                <div class="left_info">
                    <h3 style="line-height: 30px;"><a href="/survey/t/?title=<?php echo $row->link;?>" target="_blank"><?= $row->title;?></a></h3>
                    <div class="surDesc">
                        <?php
                        $max_char = 300;
                        $max_char = 300;
                        $survey_descr = strip_tags($row->descr, "<em><sup><sub><br>");
                        if(strcmp(trim($survey_descr),'Type description here') != 0 && strcmp(trim($survey_descr),'This is your description') != 0 && strcmp(trim($survey_descr),'This is your description.') != 0)
                        {
                            if ((strlen($survey_descr)>$max_char) && ($espacio = strpos($survey_descr, " ", $max_char )))
                            {
                                $survey_descr = substr($survey_descr, 0, $espacio);
                                $survey_descr = $survey_descr . "...";
                            }

                            echo  $survey_descr;
                        }
                        ?>
                        </div>
                    <!--<div class="surCat"><strong>Category:</strong> <?php echo $CI->Mdl_search->category_name($row->category)->category_name;  ?></div> -->
                </div>
                <div class="right_info">
                    <div class="qDetails">
                        <strong>Questions: </strong><?php echo $CI->Mdl_search->question_count($row->id); ?><br>
                        <strong>Attempts: </strong><?= $row->total_responses ?><br>
                        <strong>Authored by: </strong>
                        <?php
                        if($CI->Mdl_search->author_name($row->survey_user_id))
                            echo  $CI->Mdl_search->author_name($row->survey_user_id)->user_login;
                        ?><br>
                    </div>
                </div>
            </div>
    <?php endforeach;?>
    <?php else: ?>
       No survey for <span class="color_gray"><strong><?PHP echo $search_title;?></strong></span> were found.<br>
    <?php endif;?>

    <?php echo $this->pagination->create_links(); ?>

</div>


