<?php

class Mypages extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!($this->session->userdata('language'))) {
            $this->session->set_userdata('language', 'english');
        }
    }

    function index() {


    //    $this->load->model('LanguagesModel/LanguagesTest');
    //    $data['records'] = $this->LanguagesTest->getData();

    //    $query = $this->db->query('select * from test');
    //    $this->load->view('test', $data);
///////////////////////////////////////////////////////////////////////////////
//        var_dump($query->result());
//        exit;
//        $this->load->views('Templates/Header');
//        $this->load->views('Templates/Footer');
///////////////////////////////////////////////////////////////////////////////
        $this->load->view('LanguagesView/view_header');
        $this->load->view('LanguagesView/views_Mypages');
        $this->load->view('LanguagesView/view_footer');
    }

    function create_post() {
        $this->load->library('form_validation');
        $this->load->models('LanguagesModel/model_message');

        $this->form_validation->set_rules('sender_name', 'Name', 'required|max_length[50]|xss_clean|alpha_dash');
        $this->form_validation->set_rules('sender_message', 'Message', 'required|min_length[10]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->load->views('LanguagesView/view_header');
            $this->load->views('LanguagesView/views_Mypages');
            $this->load->views('LanguagesView/view_footer');
        } else {
            if ($this->input->post('language') == 'english') {
                $this->session->set_userdata('language', 'english');
            } else if ($this->input->post('language') == 'french') {
                $this->session->set_userdata('language', 'french');
            }

            $data = array();
            $sender = $data['sender'] = $this->input->post('sender_name');
            $message = $data['message'] = $this->input->post('sender_message');

            $inserted = $this->model_message->inserted_message($sender, $message);

            if ($inserted) {
                $this->load->views('LanguagesView/view_header');
                $this->load->views('LanguagesView/view_message_sent');
                $this->load->views('LanguagesView/view_footer');
            }
        }
    }

    function get_language_data() {
        $user_language = $this->input->post('language');
        $this->lang->load('contact_form_' . $user_language, $user_language);

        $data = array(
            'title' => $this->lang->line('name'),
            'name' => $this->lang->line('name'),
            'message' => $this->lang->line('message'),
            'submit' => $this->lang->line('submit'),
            'name_value' => $this->lang->line('name_value'),
            'message_value' => $this->lang->line('name_value')
        );

        $json_data = json_encode($data);
        echo ($json_data);
    }

}
