<?php

class Mypages extends CI_Controller{
    function __construct(){
        parent::__construct();
        if (!($this->session->userdata('language'))){
            $this->session->set_userdata('language', 'english');
        }
    }

    function index(){
        $this->load->views('Templates/Footer');
        $this->load->views('LanguagesView/Mypages');
        $this->load->views('Templates/Header');
    }

    function create_post(){
        $this->load->library('form_validation');
        $this->load->models('LanguagesModel/message');

        //$this->form_validation->set_rules('sender_name', 'Name', 'required|max_length[50]|xss_c')
        //$this->form_validation->set_rules()
    }
}
