<?php

class Mdl_browse extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_table() {
        $table = "survey";
        return $table;
    }

    public function find_browse($_pagesize, $_page) {
        //Get all survey in browse page

        $offset =($_page - 1) * $_pagesize;
        $query = $this->db->select(['survey.id','survey.survey_user_id', 'survey.title', 'survey.link', 'survey.descr', 'survey.category', 'survey.total_take', 'survey.usrid', 'survey.created_date','survey.total_responses'])
                          ->from( $this->get_table())
                          ->join('users', 'survey.survey_user_id=users.user_id')
                          ->where(['users.Customer'=>'0', 'survey.link_status'=>'published', 'survey.status'=>'1', 'survey.survey_access'=>'0','survey.start_date_time <='=>'NOW()'])
                          ->order_by("total_take", "desc")
                          ->limit( $_pagesize, $offset )
                          ->get( );
        return $query->result();
    }

    public function count_find_browse() {
        //Count all servey in browse page
        $query = $this->db->select(['survey.id'])
                          ->from($this->get_table())
                          ->join('users', 'survey.survey_user_id=users.user_id')
                          ->where(['users.Customer' => '0', 'survey.link_status' => 'published', 'survey.status' => '1', 'survey.survey_access'=>'0','survey.start_date_time <='=>'NOW()'])
                          ->get( );
        return $query->num_rows();
    }

    public function question_count($survey_id)
    {
        //Count the all question to particular survey
        $query = $this->db->select('survey_question_id, COUNT(survey_question_id) as total')
                          ->where(['survey_id'=> $survey_id, 'status'=>1, 'type!='=>'', 'type!='=>'Instructions'])
                          ->group_by('survey_question_id')
                          ->get( 'survey_question' );
        return $query->num_rows();
    }

    public function category_name($survey_category)
    {
        // Get the name of category
        $query = $this->db->select('category_name')
                          ->where('category_id', $survey_category)
                          ->get( 'categories' );
        return $query->row();
    }

    public function author_name($sm_userid)
    {
        //Get The name of author
        $query = $this->db->select('user_login')
                          ->where('user_id', $sm_userid)
                          ->get( 'users' );
        if($query->num_rows()){
            return $query->row();
        }else{
            return false;
        }
    }

    public function user_info($sm_userid)
    {
        $query = $this->db->select(['PlanCode','PurchasedPlanCode'])
                          ->where('user_id', $sm_userid)
                          ->where('Customer', 1)
                          ->get( 'users' );
            return $query->result();
    }

}