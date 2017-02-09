<?php

class model_message extends CI_Model
{

    function __construct()
    {
        parent::__construct;
    }

    function insert_message($sender, $message)
    {
        $data = array
        (
            'name' => $sender,
            'message' => $message
        );

        //insert will return true or false and that will be stored in 'Inserted'
        $inserted = $this->db->insert('Messages', $data);
        return $inserted;
    }
}
