<?php

    class ValidationController extends CI_Controller
    {
        function __construct()
        {
            parent::__construct(); // We define the the Controller class is the parent.
        }

        public function index()
        {
            $this->load->view('formsuccess');
        }
    }
