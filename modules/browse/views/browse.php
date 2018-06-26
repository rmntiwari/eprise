<?php  defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php // $this->load->view('include/header'); ?>
<?php
$CI =& get_instance();
$CI->load->model('Mdl_browse');
?>

<div class="container">

    <div style="margin:10px 0">
        <h1 class="heading1">Browse Surveys </h1>
        <h2 class="sm_sub_heading">Browse surveys from our collection</h2>
    </div>
    <?php if(count($result)):?>
        <?php foreach($result as $row):?>
            <div class="browseSur">
                <div class="left_info">
                    <h3 style="line-height: 30px;"><a href="/survey/t/?title=<?php echo $row->link;?>" target="_blank">
                            <?php

                           echo @iconv('UTF-8', 'UTF-8//IGNORE',  $row->title);

                            ?>
                        </a></h3>
                    <div class="surDesc">
                        <?php
                        $max_char = 300;
                        $survey_descr = strip_tags($row->descr, "<em><sup><sub><br>");
                        if(strcmp(trim($survey_descr),'Type description here') != 0 && strcmp(trim($survey_descr),'This is your description') != 0 && strcmp(trim($survey_descr),'This is your description.') != 0)
                        {
                            if ((strlen($survey_descr)>$max_char) && ($espacio = strpos($survey_descr, " ", $max_char )))
                            {
                                $survey_descr = substr($survey_descr, 0, $espacio);
                                $survey_descr = $survey_descr . "...";
                            }
                            echo @iconv('UTF-8', 'UTF-8//IGNORE',  $survey_descr);
                        }
                        ?>
                    </div>
                    <!--<div class="surCat"><strong>Category:</strong> <?php echo $CI->Mdl_browse->category_name($row->category)->category_name;  ?> </div> -->
                </div>
                <div class="right_info">
                    <div class="qDetails">
                        <strong>Questions: </strong><?php echo $CI->Mdl_browse->question_count($row->id); ?><br>
                        <strong>Attempts: </strong><?php echo $row->total_responses; ?><br>
                        <?php
                        if($this->input->cookie('ppUser', false) == 'webteam.proprofs'){ ?>
                           <strong>Authored by: </strong>
                            <?php
                            if($CI->Mdl_browse->author_name($row->survey_user_id))
                            {
                                echo '<a href="/survey/user.php?login='.$CI->Mdl_browse->author_name($row->survey_user_id)->user_login.'">'.$CI->Mdl_browse->author_name($row->survey_user_id)->user_login.'</a>';
                            }
                            ?><br>
                           <strong>Created date: </strong><?php echo date("M j, Y",strtotime($row->created_date)); ?><br>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        <?php endforeach;?>

    <?php else: ?>
         No Record Found.
    <?php endif;?>

    <?php
   // echo $CI->Mdl_browse->author_name($row->survey_user_id)->user_login;
    ?>

</div>

<?php echo $this->pagination->create_links(); ?>
