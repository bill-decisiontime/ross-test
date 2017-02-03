<?php

class HomeController extends CI_Controller {
  public function index()
  {
    $this->load->model('HomeModel');
    $data['records'] = $this->HomeModel->getData();
    $this->load->view('HomeView', $data);
  }
}

 ?>
