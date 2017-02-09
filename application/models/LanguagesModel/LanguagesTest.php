<?php

class LanguagesTest extends CI_Model
{

    public function getData()
    {
        $query = $this->db->get('Messages');
        return $query->result();
    }
}
