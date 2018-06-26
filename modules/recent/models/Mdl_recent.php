<?php

class Mdl_recent extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function user_detail($username)
    {
        $this->db-> query("SET SESSION wait_timeout = 600");
        $query = $this->db->select(['Customer', 'user_timezone', 'user_level'])
            ->where('user_login', $username)
            ->get( 'users' );
        return $query->result();
    }

    public function recent_survey_details($username, $attempt_days_sq, $search_att)
    {
       //echo  $delete_records	= $this->input->post('delete_records');
        $this->db-> query("SET SESSION wait_timeout = 600");
        require_once($_SERVER['DOCUMENT_ROOT'].'/api/ipbwi/ipbwi.inc.php');
        $_userid = $ipbwi->member->name2id($username);

        $params = $columns = $totalRecords = $data = array();
        $params = $_REQUEST;
        //define index of column
        $columns = array(
            1 =>'attempt_date',
            2 => 'title',
            4 => 'name',
            5 => 'email',

        );
        $where = $sqlTot = $sqlRec = "";

        $query = $this->db->query("SELECT id FROM survey WHERE usrid = ".$_userid." AND status = 1 ORDER BY id DESC");
        $users_surveyid_arr = array();
        foreach($query->result() as $rs_sid):
            $survey_id       = $rs_sid->id;
            array_push($users_surveyid_arr, $survey_id);
        endforeach;

        $user_result = $this->user_detail($username);
        foreach($user_result as $user_row):
            $customer_value       = $user_row->Customer;
            $survey_user_timezone = $user_row->user_timezone;
            $user_level = $user_row->user_level;
        endforeach;
        date_default_timezone_set($survey_user_timezone);
        $resultid=array();
        foreach($users_surveyid_arr as $key_sid_cnt=>$survey_id_value)
        {
            //echo $key_sid_cnt.'=>'.$survey_id_value;
            $surveyid=$survey_id_value;
            if($attempt_days_sq<=90)
            {
                $strSQL = "SELECT sa.id AS sa_id FROM survey_attempts sa WHERE sa.survey_id = '".$surveyid."' AND FROM_UNIXTIME(sa.attempt_date) >= DATE_SUB(CURDATE(), INTERVAL ".$attempt_days_sq." DAY) AND status!=0 ORDER BY sa.id DESC";
            }
            else
            {
                $strSQL = "SELECT sa.id AS sa_id FROM survey_attempts sa WHERE sa.survey_id = '".$surveyid."' AND FROM_UNIXTIME(sa.attempt_date) LIKE '%$attempt_days_sq%' AND status!=0 ORDER BY sa.id DESC";
            }
            $ressulrt_query = $this->db->query($strSQL)->result();
            foreach($ressulrt_query as $row):
                array_push( $resultid, $row->sa_id );
            endforeach;
        }
        $where='';
        $search_val = $params['search']['value'];
        if($search_val != '' )
        {
            $where=" AND (sa.name like'%$search_val%' OR sa.email like '%$search_val%' OR survey.title like '%$search_val%')";
        }

        $count=0;
        $att_survey_id='';
        foreach($resultid as $key=>$result_id_val)
        {
            $att_survey_id.=$result_id_val.',';
        }


        $att_survey_id = rtrim($att_survey_id, ',');
        $sqlRec = "SELECT sa.id as id, sa.survey_id as sid, sa.name as name, sa.email as email,CASE WHEN sa.attempt_date ='0000-00-00 00:00:00' THEN 'n/a' ELSE sa.attempt_date END AS 'attempt_date', sa.ip as ip, survey.title FROM survey_attempts sa INNER JOIN survey ON sa.survey_id = survey.id  WHERE sa.id in (".$att_survey_id.") AND sa.status != 0 $where ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";

         $queryTot  = $this->db->query("SELECT sa.id as id, sa.survey_id as sid, sa.name as name, sa.email as email,CASE WHEN sa.attempt_date ='0000-00-00 00:00:00' THEN 'n/a' ELSE sa.attempt_date END AS 'attempt_date', sa.ip as ip, survey.title FROM survey_attempts sa INNER JOIN survey ON sa.survey_id = survey.id  WHERE sa.id in (".$att_survey_id.") AND sa.status != 0 $where ");

        $totalRecords =  $queryTot->num_rows();
        $queryRecords = $this->db->query($sqlRec);
        $queryRecords = $queryRecords->result();

        foreach($queryRecords as $row):
            $max_char = 45;
            $title = strip_tags($row->title);
            if ((strlen($title)>$max_char) && ($espacio = strpos($title, " ", $max_char )))
            {
                $title = substr($title, 0, $espacio);
                $title = $title . "...";
            }
            $data[]=array(
                '<label class="anslabel" id="delete_row_'.$row->id.'" rel="'.$row->id.'">
						<input type="checkbox" class="delete_taken_record" id="'.$row->id.'" name="deletequiztaken[]" value="'.$row->id.'_'.$row->sid.'" style="display:none;">	
						<label for="'.$row->id.'" id="chkk1" class="checkbox_css" style="margin: 1px 3px -7px 0px;"></label></label>',
                date("M j, Y",$row->attempt_date).'&nbsp'.ltrim(date("h:i A",$row->attempt_date), 0), $title,
                '<center><a target="_blank"  href="/survey/report/detail_report.php?resultid='.$row->id.'"><div><img id="view_icon_change_'.$row->id.'" onmouseover="over_tt('.$row->id.')" onmouseout="out_tt('.$row->id.')" src="/survey/report/images/view_repoet_eye_hover.png"></div></a></center>',
                $row->name,
                $row->email,
                $row->ip
            );
        endforeach;

        $json_data = array(
            "draw"            => intval( $params['draw'] ),
            "recordsTotal"    => intval($totalRecords ),
            "recordsFiltered" => intval($totalRecords),
            "data"            => $data   // total data array
        );
       echo json_encode($json_data);  // send data as json format
    }

    public function delete_sm_report()
    {
        //$this->db-> query("SET SESSION wait_timeout = 600");
        require_once $_SERVER['DOCUMENT_ROOT']."/survey/memcache_config.php";
        $delete_records	= $this->input->post('delete_records');
        //$surveyid = $this->input->post('survey_id');
        if($delete_records	==	1) {
            $deletequiztaken = $_REQUEST['deletequiztaken'];
            $attemt_id_arr	=	array();
            $survey_id_arr		=	array();
            $answers_id_arr		=	array();
            foreach($deletequiztaken as $key => $val)
            {
                $deletequiztaken_arr = explode("_", $val);
                $attemt_id	=	$deletequiztaken_arr[0];
                $survey_id		=	$deletequiztaken_arr[1];
                array_push($attemt_id_arr,$attemt_id);
                array_push($survey_id_arr,$survey_id);

                $delete_attempt = "UPDATE survey_attempts set status='0' WHERE id = $attemt_id AND survey_id =$survey_id LIMIT 1";
                $delete_attempt_detail = "UPDATE survey_attempts_details set status='0' WHERE result_id = $attemt_id AND quiz_id = $survey_id LIMIT 1";
                $update_sm_take = "UPDATE survey set total_take=total_take-1 where id =$survey_id LIMIT 1";
                $this->db->query($delete_attempt);
                $this->db->query($delete_attempt_detail);
                $this->db->query($update_sm_take);

                $survey_question = "select `survey_question_id` from survey_question where `survey_id` = $survey_id AND `type`!='' AND `type`!='page_break' AND `type`!='section_break' AND `type`!='video' AND `type`!='welcomepage' AND `type`!='thankupage' AND status=1 ORDER BY `qs_order` ASC";
                $survey_question_id = $this->db->query($survey_question)->result();
                foreach($survey_question_id as $question_id):
                    $memcache->delete('totalAttempts_3'.$survey_id.'_'.$question_id->survey_question_id);
                    $memcache->delete('gridLabel_3'.$survey_id.'_'.$question_id->survey_question_id);
                    $memcache->delete('addressAllLabel_3'.$survey_id.'_'.$question_id->survey_question_id);
                    $memcache->delete('signatureLabel_3'.$survey_id.'_'.$question_id->survey_question_id);
                endforeach;
                $memcache->delete('surAttempts_3'.$survey_id);
                $memcache->delete('surveyUserTimezone_3'.$survey_id);
                $memcache->delete('surveyPoint_3'.$survey_id);
                $memcache->delete('ansDetail_3'.$survey_id);
                $memcache->delete('questions_3'.$survey_id);
            }

            $attemt_id_string	=	implode(',',$attemt_id_arr);
            $survey_id_string		=	implode(',',$survey_id_arr);

            $getallansersis = "SELECT `answer_id` FROM survey_attempts_details WHERE result_id IN ($attemt_id_string) AND `answer_id`!='0'";
            $all_answer_id = $this->db->query($getallansersis)->result();

            foreach($all_answer_id as $ansids):
               $update_answers_taken = "UPDATE survey_answer SET total_attempt=total_attempt-1 WHERE id =$ansids->answer_id";
               $this->db->query($update_answers_taken);
            endforeach;
        }
       echo json_encode($attemt_id_arr);
    }

    private function getTitle($id)
    {
        $query = $this->db->query("SELECT title FROM survey WHERE id = ".$id);
        return $query->row()->title;
    }

    public function getAllSurveyId($user_login, $attempt_days_sq )
    {
        require_once($_SERVER['DOCUMENT_ROOT'].'/api/ipbwi/ipbwi.inc.php');
        $_userid = $ipbwi->member->name2id($user_login);
        $query =$this->db->query("SELECT id FROM survey WHERE usrid=".$_userid." ORDER BY id DESC");
        $users_surid_arr=array(); //quiz ids
        foreach($query->result() as $ids)
        {
            array_push($users_surid_arr,$ids->id);
        }
        $recent_reports_rows=array();      //array for rows details
        $survey_detail=array();             //array for title of xls
        $total_result_survey = 0;
        $resultid_arr = array();
        $surveytitle = array();
        $i=1;
        foreach($users_surid_arr as $key_sid_cnt=>$surveyid) {

            if ($attempt_days_sq <= 90) {
                $strSQL = "SELECT sa.id AS sa_id FROM survey_attempts sa WHERE sa.survey_id = '" . $surveyid . "' AND FROM_UNIXTIME(sa.attempt_date) >= DATE_SUB(CURDATE(), INTERVAL " . $attempt_days_sq . " DAY) AND status!=0 ORDER BY sa.id DESC";
            } else {
                $strSQL = "SELECT sa.id AS sa_id FROM survey_attempts sa WHERE sa.survey_id = '" . $surveyid . "' AND FROM_UNIXTIME(sa.attempt_date) LIKE '%$attempt_days_sq%' AND status!=0 ORDER BY sa.id DESC";
            }

            $query_survey = $this->db->query($strSQL)->result();
            $total_num_of_rows_survey = $this->db->query($strSQL)->num_rows();

            if($total_num_of_rows_survey>0)
            {
                foreach ($query_survey  as $sa_row):
                    array_push($resultid_arr, $sa_row->sa_id);
                    array_push($surveytitle,$this->getTitle($surveyid)); //survey title
                endforeach;

            }

            $total_result_survey = $total_result_survey + $total_num_of_rows_survey;
            $i++;
        }

        $total_to_display = 5000;
        $slab = $_REQUEST['slab'];
        $r_till = 5000;
        $r_to = 0;
        if($slab!='')
        {
            $r_to = ($slab-1)*5000;
            $r_till = $r_to+5000;
        }
        $filter_result = array();
        for($cntr = $r_to; $cntr<$r_till; $cntr++)
        {
            array_push($filter_result,$resultid_arr[$cntr]);
        }
        foreach ($filter_result as $key=>$vlave)
        {
            if($vlave=='')
            {
                unset($filter_result[$key]);
            }
        }
        $r_till = $r_to+count($filter_result);


        foreach($filter_result as $key_sid_cnt=>$result_id)
        {
            $survey_atmpt_query = "SELECT sa.id as id, sa.survey_id as sid, sa.name as name, sa.email as email,CASE WHEN sa.attempt_date ='0000-00-00 00:00:00' THEN 'n/a' ELSE sa.attempt_date END AS 'attempt_date', sa.ip as ip FROM survey_attempts sa WHERE sa.id = " . $result_id . " AND status != 0 ORDER BY attempt_date DESC";
            if($key_sid_cnt==0)
            {
                array_push($survey_detail,"Attempt date");
                array_push($survey_detail, "Title");
                array_push($survey_detail, "Name");
                array_push($survey_detail, "Email");
                array_push($survey_detail, "IP Address");
                array_push($recent_reports_rows, $survey_detail);
            }
            $attmp_query = $this->db->query($survey_atmpt_query)->result();
            $survey_title = $surveytitle[$key_sid_cnt];
            foreach ($attmp_query as $ors):
                $_username = $ors->name;
                $_useremail = $ors->email;
                $_attemptId = $ors->id;
                $_surveyId = $ors->sid;
                $_attemptDate = $ors->attempt_date;
                $_atmtUserIp = $ors->ip;
            endforeach;

            $recent_row = array(date('M d, Y, H:i:s', $_attemptDate), $survey_title, $value_name, $_useremail, $_atmtUserIp);
            array_push($recent_reports_rows,$recent_row);
        }

        return ($recent_reports_rows);
    }


}