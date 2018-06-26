<?php

class Mdl_search extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_table() {
        $table = "survey";
        return $table;
    }

    public function search_result($search, $_pagesize, $_page ) {
        //Search all results

        $offset = ($_page - 1) * $_pagesize;

        if( strlen ($search)>3)
        {
             $query = $this->db->select(['MATCH (title,descr) AGAINST ("'.$search.'") as score', 'id', 'title', 'descr', 'link', 'category', 'total_take', 'usrid', 'total_responses', 'survey_user_id'])
                                ->where('MATCH (title, descr) AGAINST ("'.$search.'" IN BOOLEAN MODE)')
                                ->where(['link_status'=>'published', 'status'=>'1', 'survey_access'=>'0', 'total_take >'=>'2'])
                                ->order_by("score", "desc")
                                ->limit(  $_pagesize, $offset )
                                ->get( $this->get_table() );
        }else{
            $query = $this->db->select(['id', 'title', 'descr', 'link', 'category', 'total_take', 'usrid', 'total_responses', 'survey_user_id'])
                               ->like("title",$search)
                               ->like("descr",$search)
                               ->where(['link_status'=>'published', 'status'=>'1', 'survey_access'=>'0', 'total_take >'=>'2'])
                               ->order_by("title", "desc")
                               ->limit( $_pagesize, $offset )
                               ->get( $this->get_table() );
        }
        return $query->result();
    }

    public function count_search_result($search)
    {
        //Count all search results
        if( strlen ($search)>3)
        {
            $query = $this->db->select(['id'])
                              ->where('MATCH (title, descr) AGAINST ("'.$search.'" IN BOOLEAN MODE)')
                              ->where(['link_status'=>'published', 'status'=>'1', 'survey_access'=>'0', 'total_take >'=>'2'])
                              ->order_by("title", "desc")
                              ->get( $this->get_table() );
        }else{
            $query = $this->db->select(['id'])
                              ->like("title",$search)
                              ->like("descr",$search)
                              ->where(['link_status'=>'published', 'status'=>'1', 'survey_access'=>'0', 'total_take >'=>'2'])
                              ->order_by("title", "desc")
                              ->get( $this->get_table() );
        }
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
                          ->where('user_id', "$sm_userid")
                          ->get( 'users' );
        if($query->num_rows()){
            return $query->row();
        }else{
            return FALSE;
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