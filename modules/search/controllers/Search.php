<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Mdl_search");
        $this->load->library('pagination');
    }
    function _remap($param) {
        $this->search_index($param);
    }
    public function search_index($param)
    {

        $match_title = $this->uri->segment(2);
        $this->input->get('your_get_variable', TRUE);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('search','Search','trim|required');

        $config = [
            'base_url'			=>	base_url("/search/$match_title"),
            'per_page'			=>	10,
            'total_rows'		=>	$this->Mdl_search->count_search_result($match_title),
            'full_tag_open'		=>	'<div class="pages" align="center"><p>',
            'full_tag_close'	=>	"</p></div>",
            //'uri_segment'		=>	4,
            'num_links'         =>  5,
            'prev_link' => '« Previous',
            'next_link'=>'Next »',
            'cur_tag_open'		=>	"<span class='current'>",
            'cur_tag_close'		=>	'</span>',
        ];

        //$config['enable_query_strings'] = TRUE;
        // $config['page_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        // $config['query_string_segment'] = 'page';
        $this->pagination->initialize($config);
        if($match_title == "")
        {
            return redirect("browse/");
        }
        $_page = $this->uri->segment(3,1);
        if (is_numeric($_page)) {
            //echo var_export($_page, true) . " is numeric", PHP_EOL;
        } else {
            $_page = 1;
        }
        $data['_pageTitle'] = ucfirst($match_title).' Surveys at Survey Maker';
        $data['_pageDescr'] = 'Create a survey using full-featured, free survey maker for work, school or fun. Share online on facebook, blogs, websites &amp; more.';
        $data['_pageKeywords'] = 'Create survey, Create online survey, Survey software, Create questionnaire, Online survey software, Create web survey, Web survey, Online survey';
        $data['result'] = $this->Mdl_search->search_result($match_title,$config['per_page'], $_page);
        $data['total_row'] = $this->Mdl_search->count_search_result($match_title);
        $data['page_size'] = 10;
        $data['main_content'] = 'search';
        $data['search_title'] = $match_title;
        $this->load->view('display', $data);
    }

}

