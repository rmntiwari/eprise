<?php  defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

class Folder extends MY_Controller{

    function __construct()
    {
        parent::__construct();//call parent constructor
        $this->load->helper('date');//load date helper
        $this->load->model("Mdl_folder");//load model for folder
        $this->load->library('form_validation');//load library
    }

    function _remap($method, $args)
    {
        //remap method
        if (method_exists($this, $method))
        {
            $this->$method($args);
        }
        else
        {
            $this->index($method, $args);
        }
    }

   public function index($method='', $args = [])
    {
        if( count($method) == ''){ return redirect("");}
        $data['_pageTitle'] = "Organize Folders";
        $data['_pageDescr'] = ' ';
        $data['_pageKeywords'] = ' ';
        $formRules = [
            [
                'field'=>'txtFolder',
                'label'=>'Folder Name',
                'rules'=>'trim|required|min_length[2]|max_length[15]'
            ]
        ];
        $this->form_validation->set_error_delimiters("<p style='color: #FF0000;'>","</p>");
        $this->form_validation->set_rules($formRules);
        if($this->form_validation->run())
        {
            $this->session->set_flashdata('feedback','Folder created successfuly');
            $folder_name = $this->input->post('txtFolder');
            $this->Mdl_folder->add_folder($folder_name, $method);
        }
        $data['username'] = $method;

        if($this->Mdl_folder->getUserId($method))
        {
            $data['user_id'] = $_userid = $this->Mdl_folder->getUserId($method);
            $data['total_folder'] = $this->Mdl_folder->getFolderCount($_userid);
            $data['folder_info'] = $this->Mdl_folder->getFolderInfo($_userid);
            $data['main_content'] = 'folder';
            $this->load->view('display', $data);
        }else{
            return redirect("/folder/{$this->input->cookie('ppUser', false)}");
            //return redirect("/folder/{$this->input->cookie('ppUser', false)}");
        }

    }

    public function add_new_folder($args)
    {
        //store folder via ajax
        $formRules = [
            [
                'field'=>'txtFolder',
                'label'=>'Folder Name',
                'rules'=>'trim|required|min_length[2]'
            ]
        ];

        $this->form_validation->set_error_delimiters("<p style='color: #FF0000;'>","</p>");
        $this->form_validation->set_rules($formRules);
        if($this->form_validation->run())
        {
            $this->session->set_flashdata('feedback','Folder created successfuly');
            $folder_name = $this->input->post('txtFolder');
            echo $this->Mdl_folder->add_folder($folder_name, $args[0], $args[1]);
        }

    }

    public function view($args)
    {
        //view folder
        $data['_pageTitle'] = "View Folder";
        $data['_pageDescr'] = ' ';
        $data['_pageKeywords'] = ' ';

        if($this->Mdl_folder->getUserId($args[0]))
        {
            $data['user_id'] = $_userid = $this->Mdl_folder->getUserId($args[0]);
        }else{
            return redirect("");
            //return redirect("/folder/{$this->input->cookie('ppUser', false)}");
        }
        if($this->Mdl_folder->checkFoldername($_userid, $args[1]) == 'not_a_folder')
        {
            return redirect("/folder/{$this->input->cookie('ppUser', false)}");
        }

        $data['username'] = $args[0];
        $data['folder_name'] = $args[1];
        $data['no_of_survey'] = $this->Mdl_folder->getSurveyCount($_userid, $this->Mdl_folder->getFolderId($_userid, $args[1]));
        $data['survey_results'] = $this->Mdl_folder->viewSurvey($_userid, $args[1]);
        $data['main_content'] = 'view_folder';
        $this->load->view('display', $data);
    }

    public function add($args)
    {
        //add folder

        $data['_pageTitle'] = "Add Surveys to this folder";
        $data['_pageDescr'] = ' ';
        $data['_pageKeywords'] = ' ';
        $data['user_id'] = $_userid = $this->Mdl_folder->getUserId($args[0]);
        $data['username'] = $args[0];
        $data['folder_name'] = $args[1];
        $data['no_of_survey'] = $this->Mdl_folder->getSurveyCount($_userid, $this->Mdl_folder->getFolderId($_userid, $args[1]));
        $data['survey_results'] = $this->Mdl_folder->getAllSurvey($_userid);
        if( $this->Mdl_folder->getFolderId($_userid, $args[1])==0 )
        {
            return redirect("/folder/{$args[0]}");
        }else{
            $data['folder_id'] = $this->Mdl_folder->getFolderId($_userid, $args[1]);
        }

        $data['main_content'] = 'add_folder';
        $this->load->view('display', $data);
    }

    public  function ajax_add_survey($args)
    {  echo 'control';
        //add survey into folder
        $this->Mdl_folder->addSurveys();
    }

    public function delete($args)
    {
       //delete folder
       $this->Mdl_folder->delete_folder($args[0]);
    }

    public function delete_survey($args)
    {
        //delete survey one by one
        $this->Mdl_folder->delete_survey($args[0]);
    }

    public function delete_selected_sur($args)
    {
        //delete selected survey
        $this->Mdl_folder->delete_selected_survey($args[0]);
    }

    public function update_folder_name($args)
    {
        //edit/update folder...
       echo  $this->Mdl_folder->update_folder($args);
    }

    public function invite($args)
    {
        $data['_pageTitle'] = "Invite people to folder";
        $data['_pageDescr'] = '';
        $data['_pageKeywords'] = '';
        $data['username'] = $args[0];
        $data['folder_name'] = $args[1];

        $data['user_id'] = $_userid = $this->Mdl_folder->getUserId($args[0]);
        $data['folder_id'] = $this->Mdl_folder->getFolderId($_userid, $args[1]);
        $data['user_results']= $this->Mdl_folder->user_details($args[0]);
        $data['no_of_survey'] = $this->Mdl_folder->getSurveyCount($_userid, $this->Mdl_folder->getFolderId($_userid, $args[1]));
        $data['instructor_info']= $this->Mdl_folder->get_instructor_info($_userid, $this->Mdl_folder->user_details($args[0])->RecurlyAccount);
        $data['shared_info_res']= $this->Mdl_folder->get_shared_info($_userid, $data['folder_id'], $data['folder_name']);
        $data['main_content'] = 'invite_folder';
        $this->load->view('display', $data);
    }

    public function invite_insert($args)
    {
       $this->Mdl_folder->invite_insert_instruct();
    }

}

