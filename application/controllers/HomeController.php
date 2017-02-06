<?php

//This is the Controller for getting data from the database "test". It was written
//using a YT tutorial found here:- https://youtu.be/IOZqRgOgSu4.

class HomeController extends CI_Controller
{
  public function index()
  {
    //  die('here');
    //$this->load->database();
    $this->load->model('HomeModel');
    $data['records'] = $this->HomeModel->getData();

    //$query = $this->db->query('select * from test');
    //var_dump($query->result());
    //exit;
    $this->load->view('HomeView', $data);
  }
}
