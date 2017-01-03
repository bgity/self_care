<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		 parent::__construct();
		 $this->load->library('session');
		 if (! $this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
         } 
    }
	public function index()
	{
		$this->load->view('index');
	}
	public function home()
	{
		$this->load->view('dashboard');
	}
        
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */