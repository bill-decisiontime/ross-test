<?php

class Static_Pages extends CI_Controller
{
    public function view($page = 'home')
    {

        if ( ! file_exists(APPPATH.'/views/Static_Pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('Templates/Header', $data);
        $this->load->view('Static_Pages/'.$page, $data);
        $this->load->view('Templates/Footer', $data);
    }
}
