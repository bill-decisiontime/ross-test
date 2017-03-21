<?php
class ContactsModel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //-------------------------------------------------------------------------
    //This will add a new contact to the database
    public function add_contact()
    {
        //Get the number of rows to set the new list_order number to the new contact.
        $query = $this->db->get('contact');
        $num_of_rows = $query->num_rows();

        //Details of new contact added to an array to be inserted into the database.
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'list_order' => $num_of_rows+1
        );

        //Array is added to the database.
        return $this->db->insert('contact', $data);
    }//function.

    //-------------------------------------------------------------------------
    //Get the contacts from the database to display them
    public function get_contacts()
    {
        //SQL statement to get all contacts
        $sql = "SELECT *
                FROM contact
                ORDER BY list_order;";
        $query = $this->db->query($sql);

        //Checks if there is records, if not, it will just jump out of the function.
        if ($query->result() != NULL)
        {
            $list_order = 0;

            //Adds each record into an array from the database ready to display.
            foreach ($query->result() as $row)
            {
                $data[] = array(
                    'id' => $row->id,
                    'name' => $row->name,
                    'email' => $row->email,
                    'list_order' => $list_order
                );
                $list_order++;
            }//Foreach

            //Sets the order of the list incase the user has changed it.
            $this->reorder($data);
            return $data;
        }//IF
        return;
    }//Function

    //-------------------------------------------------------------------------
    // Function to delete the user from the list and the database.
    public function delete_user($data){
        //Get the ID of what user is needing deleted.
        $this->db->where('id', $data);
        //Gets deleted.
        $this->db->delete('contact');
    }//Function

    //-------------------------------------------------------------------------
    // Function to reorder the list.
    public function reorder($data){
        //Sets all records to 1 in the 'changed' column to insure they don't get
        //changed multiple times.
        $this->db->set('changed', 1);
        $this->db->update('contact');

        //Start to go through each record and updating there order.
        foreach ($data as $item)
        {
            //Finds the record by their ID and checks if it has already been updated.
            $this->db->where('id', $item['id']);
            $this->db->where('changed', 1);
            //Sets the new order and changes the 'changed' column to 0 so it doesnt changed
            //again.
            $this->db->set('list_order', $item['list_order']);
            $this->db->set('changed', 0);
            $this->db->update('contact');
        }//Foreach
    }//Function
}//Class
