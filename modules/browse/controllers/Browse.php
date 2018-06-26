<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Browse extends MY_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Mdl_browse");
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
        $this->input->get('your_get_variable', TRUE);
        $config = [
            'base_url'			=>	base_url("browse/"),
            'per_page'			=>	10,
            'total_rows'		=>	$this->Mdl_browse->count_find_browse(),
            'full_tag_open'		=>	'<div class="pages" align="center"><p>',
            'full_tag_close'	=>	"</p></div>",
            'uri_segment'		=>	2,
            'num_links'         =>  5,
            'prev_link' => '« Previous',
            'next_link'=>'Next »',
            'cur_tag_open'		=>	"<span class='current'>",
            'cur_tag_close'		=>	'</span>',
        ];

        //$config['enable_query_strings'] = TRUE;
        //$config['page_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        //$config['query_string_segment'] = 'page';
        $this->pagination->initialize($config);

        if(strpos($_SERVER['REQUEST_URI'], '/survey/browse/search.php?page=') !== false) {
            $url_arr = explode("?", $_SERVER['REQUEST_URI']);
            $url_part=  explode('&', $url_arr[1]);
            $url_part1_arr = explode("=",$url_part[0]);
            $url_part2_arr = explode("=",$url_part[1]);
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: /survey/search/".$url_part2_arr[1]."/".$url_part1_arr[1]."");
            exit;
        }else if(strpos($_SERVER['REQUEST_URI'], '/survey/browse/search.php?') !== false) {
            $url_arr = explode("?", $_SERVER['REQUEST_URI']);
            $url_part=  explode('=', $url_arr[1]);
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: /survey/search/{$url_part[1]}");
            exit;
        }else if(strpos($_SERVER['REQUEST_URI'], '/survey/browse/?page') !== false) {

            $url_arr = explode("=", $_SERVER['REQUEST_URI']);
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: /survey/browse/{$url_arr[1]}");
            exit;
        }

        $_page = $this->uri->segment(2,1);
        if (is_numeric($_page)) {
            //echo var_export($_page, true) . " is numeric", PHP_EOL;
        } else {
            $_page = 1;
        }
        settype($_page, 'integer');

        $data['result'] = $this->Mdl_browse->find_browse($config['per_page'], $_page);
        $data['total_row'] = $this->Mdl_browse->count_find_browse();
        $data['page_size'] = $config['per_page'];
        $data['main_content'] = 'browse';
        $data['_pageTitle'] = 'Browse Surveys : Browse A Survey';
        $data['_pageDescr'] = 'Create free online surveys with our online survey software. No software download, simple &amp; free web-based survey tools with powerful tracking and reporting features.';
        $data['_pageKeywords'] = 'Create survey, Create online survey, Survey software, Create questionnaire, Online survey software, Create web survey, Web survey, Online survey';
        $this->load->view('display', $data);
    }


}

