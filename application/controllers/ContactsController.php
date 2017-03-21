<?php
    class ContactsController extends CI_Controller
    {
        function __construct()
        {
            parent::__construct(); // We define the the Controller class is the parent.
            $this->load->model('ContactsModel'); // Load our contacts model for our entire class
        }

        public function index()
        {
            $data = array('contact' => $this->ContactsModel->get_contacts());
            $this->load->view('ContactsView', $data);
        }

        function save_order()
        {
            $list_order = 0;
            foreach ($_POST['id'] as $value)
            {
                $data[$list_order] = array(
                    'id' => (int)$value,
                    'list_order' => $list_order
                );
                $list_order++;
            }
            $this->ContactsModel->reorder($data);
        }

        function delete_user()
        {
            $data = $_POST['id'];
            $this->ContactsModel->delete_user($data);
        }

        function new_contact()
        {
            $this->ContactsModel->add_contact();
            $data = array('contact' => $this->ContactsModel->get_contacts());
            $this->load->view('ContactsView', $data);
        }
    }
