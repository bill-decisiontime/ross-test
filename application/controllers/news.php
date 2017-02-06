<!-- This is the controller for getting News to and from the database. It was written
using a CodeIgnitor tutorial found here:- https://codeigniter.com/userguide2/tutorial/static_pages.html. -->

<?php
class news extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('News_model');
	}

    public function index()
    {
    	$data['news'] = $this->News_model->get_news();
        //var_dump($data);
        //exit;
    	$data['title'] = 'News archive';

        $this->load->view('Templates/Header', $data);
    	$this->load->view('News/index', $data);
    	$this->load->view('Templates/Footer');
    }

    public function view($slug)
    {
    	$data['news_item'] = $this->News_model->get_news($slug);

    	if (empty($data['news_item']))
    	{
    		show_404();
    	}

    	$data['title'] = $data['news_item']['title'];

    	$this->load->view('Templates/Header', $data);
    	$this->load->view('News/view', $data);
    	$this->load->view('Templates/Footer');
    }

    public function create()
    {
    	$this->load->helper('form');
    	$this->load->library('form_validation');

    	$data['title'] = 'Create a news item';

    	$this->form_validation->set_rules('title', 'Title', 'required');
    	$this->form_validation->set_rules('text', 'text', 'required');

    	if ($this->form_validation->run() === FALSE)
    	{
    		$this->load->view('templates/Header', $data);
    		$this->load->view('News/create');
    		$this->load->view('templates/Footer');

    	}
    	else
    	{
    		$this->news_model->set_news();
    		$this->load->view('News/success');
    	}
    }
}
