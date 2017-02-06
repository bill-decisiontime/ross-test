<?php

//This is the Model for getting data from the database "test". It was written 
//using a YT tutorial found here:- https://youtu.be/IOZqRgOgSu4.

class HomeModel extends CI_Model
{

    public function getData()
    {
        $query = $this->db->get('test');
        return $query->result();
    }
}
