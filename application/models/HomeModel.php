<?php

class Home_Model extends CI_Model{

public function getData(){
    $query = $this->db->get('Cars');
    return $query -> result();
}

 ?>
