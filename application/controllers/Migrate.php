<?php

class Migrate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library( 'migration' );

        // check for CLI
        if ( ! $this->input->is_cli_request())
        {
            show_error('You don\'t have permission for this action');
        }
    }

    function index()
    {
        $this->load->library('migration');
        $this->migration->latest();

        if ($this->migration->current() === FALSE){
            show_error($this->migration->error_string());
        }
    }

    public function version( $version )
    {
        
        echo $version;
        $migration = $this->migration->version( $version );

        if( !$migration )
        {
            echo $this->migration->error_string();
        }
        else
        {
            echo 'Migration(s) done' . PHP_EOL;
        }
    }

}
