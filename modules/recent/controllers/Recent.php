<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Recent extends MY_Controller{

    function __construct()
    {
        parent::__construct();
        error_reporting(E_ALL ^ E_NOTICE);
        $this->load->model("Mdl_recent");
        $this->load->library('pagination');
    }

    function _remap($method, $args)
    {
        //remap method
        if (method_exists($this, $method)) {
            $this->$method($args);
        } else {
            $this->index($method, $args);
        }
    }

    public function index($method='', $args = [])
    {
        if( count($method) == ''){ return redirect("");}
        $userLogin = $_COOKIE['ppUser'];

        if( isset($_REQUEST['recent']) || isset($_REQUEST['show']) ||isset($_REQUEST['user']) || $_REQUEST['days'] ==30)
        {
            return redirect("/recent/{$userLogin}/30");
        }

        $data['username'] = $method;
        $data['days'] = $args[0];
        if($args[0] == '')$data['days'] = 30;
        $data['_pageTitle'] = 'ProProfs Survey Maker - Create Online Surveys';
        $data['_pageDescr'] = '';
        $data['_pageKeywords'] = '';
        if( count($this->Mdl_recent->user_detail($method)) || $userLogin = '')
        {
            $data['user_result'] = $this->Mdl_recent->user_detail($method);
            $data['main_content'] = 'recent';
            $this->load->view('display', $data);
        }else{
            return redirect("");
        }

    }

    public function recentResponse($args)
    {
        $userLogin = $this->input->cookie('ppUser', false);
        $data['username'] = $args[0];
        $data['days'] = $args[1];
        // initilize all variable

       $survey_details_result = $this->Mdl_recent->recent_survey_details($args[0], $args[1], $args[2]='');

    }

    public function recent_survey_reports($args)
    {
        $user_login=$args[0]; //user login
        $attempt_days_sq=$args[1];  //recent activity of
        $data['recent_reports_rows'] =$this->Mdl_recent->getAllSurveyId($user_login, $attempt_days_sq );
        $data['days']= $attempt_days_sq;
        $this->load->view('recent_excel', $data);
    }
    public function delete_report()
    {
        $this->Mdl_recent->delete_sm_report();
    }

}

