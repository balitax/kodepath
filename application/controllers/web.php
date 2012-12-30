<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web extends CI_Controller {

    var $_public_view;

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('check_alamat');
        $this->load->model('Search_email');
        $this->load->model('Search_id');
        $this->load->model('hits');
        $this->load->model('Search_username');
        $this->load->model('Search_comment');
        $this->load->library('tank_auth');
        $this->load->model('counter');
        $this->load->library('gravatar');
        //library pagination
        $this->load->helper('url');
        $this->load->library('table');
        $this->load->model('basic_model', 'bmodel');
        $this->config->load('category');
        $this->load->library('notifications');
        $this->_public_view = $this->config->item('public_view');

    }

    public function allusers() {
        $limit = 3;
        $offset = $this->uri->segment(3, 0);
        $this->load->library('pagination');
        $config['base_url'] = site_url('data/allusers');
        $config['total_rows'] = $this->bmodel->count_table_rows('users');
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);

        $data = array('getallusers' => $this->bmodel->get_allusers($limit, $offset)
            , 'page_title' => 'All Users'
            , 'page_content' => 'allusers'
            , 'pagination' => $this->pagination->create_links());
        $data['user_id'] = $this->tank_auth->get_user_id();
        $data['username'] = $this->tank_auth->get_username();

        $this->load->view($this->_public_view, $data);
    }

    public function index() { //$id_url$id_url

        $limit = 9;
        $offset = $this->uri->segment(3, 0);
        $this->load->library('pagination');
        $config['base_url'] = site_url('data/daftar'); //_
        $config['total_rows'] = $this->bmodel->count_table_rows('srt_movie');
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);

        $data = array('getlist' => $this->bmodel->get_movie_list($limit, $offset)
            , 'page_title' => 'Kodepath'
            , 'page_content' => 'movie_list'
            , 'pagination' => $this->pagination->create_links());
        $this->load->helper('url', 'form');
        //Tank Auth
        if (!$this->tank_auth->is_logged_in(FALSE)) {
            redirect('/auth/login/');
        } else {

            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $this->load->view($this->_public_view, $data);
        }
    }

    public function detail() {
        $this->counter->addinfo($this->uri->segment(3));
        $str_id = '';
        //identifier
        if ($this->uri->segment(3) == FALSE) {
            redirect('data/daftar', 'Location');
        } else {
            $str_id = $this->uri->segment(3);
        }

        $data = array('query' => $this->bmodel->get_movie_detail($str_id)
            , 'id' => $str_id
            , 'lilcomment' => $this->bmodel->get_list_lilcomment($str_id)
            , 'comments' => $this->bmodel->show_movie_comments($str_id)
            , 'page_title' => 'Detail Masalah'
            , 'page_content' => 'movie_detail');
        $data['user_id'] = $this->tank_auth->get_user_id();
        $data['username'] = $this->tank_auth->get_username();


        //Comentar Seleksi
        if ($this->_comment() == FALSE) {
            $this->load->view($this->_public_view, $data);
        } else {
            $this->bmodel->save_movie_comment($str_id, $user_id);
        }
    }

    public function tags() {
        $data = array('page_title' => 'Tags', 'page_content' => 'tags');
        $data['user_id'] = $this->tank_auth->get_user_id();
        $data['username'] = $this->tank_auth->get_username();

        $this->load->view($this->_public_view, $data);
    }

    public function users() {
        $user_id = '';
        //identifier
        if ($this->uri->segment(3) == FALSE) {
            redirect('data/daftar', 'Location');
        } else {
            $user_id = $this->uri->segment(3);
        }

        $data = array('query' => $this->bmodel->get_profile($user_id)
            , 'page_title' => 'Usr Profile'
            , 'page_content' => 'user_profile');
        $data['user_id'] = $this->tank_auth->get_user_id();
        $data['username'] = $this->tank_auth->get_username();
        $this->load->view($this->_public_view, $data);
        //$this->load->view('dashboard_usr');
    }

    public function ask() {
        $user_id = '';
        if ($this->uri->segment(3) == FALSE) {
            redirect('data/daftar', 'Location');
        } else {
            $user_id = $this->uri->segment(3);
        }
        $data = array('querydata' => $this->bmodel->ask_question($user_id)
            , 'page_title' => 'User Questions'
            , 'page_content' => 'user_ask');
        $data['user_id'] = $this->tank_auth->get_user_id();
        $data['username'] = $this->tank_auth->get_username();
        $this->load->view($this->_public_view, $data);
    }

    //Fungsi Comment Set Rules
    private function _comment() {
        $this->load->library('form_validation');
        $this->valid = $this->form_validation;
        $this->valid->set_rules('comment', 'Komentar', 'required|xss_clean|min_length[3]|max_length[1500]');
        return($this->form_validation->run() == FALSE) ? FALSE : TRUE;
    }

    private function _asking() {
        $this->load->library('form_validation');
        $this->valid = $this->form_validation;
        $this->valid->set_rules('question', 'question', 'required|xss_clean|min_length[3]|max_length[500]');
        $this->valid->set_rules('chronology', 'chronology', 'xss_clean|max_length[1500]');
        return($this->form_validation->run() == FALSE) ? FALSE : TRUE;
    }
}
?>

