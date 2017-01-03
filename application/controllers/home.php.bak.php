<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';


class home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
 
	public function index()
	{
		$this->load->view('index');
	}
	

	public function load_data()
	{
		$result = $this->db->get('users')->result();
		//print_r($result);
		//echo nl2br("\n\n\n");

		$arr_data = array();
		$i=0;
		foreach ($result as $r) {
			$arr_data[$i]['id']=$r->id;
			$arr_data[$i]['username']=$r->username;
			$arr_data[$i]['first_name']=$r->first_name;
			$arr_data[$i]['last_name']=$r->last_name;
			$arr_data[$i]['address']=$r->address;	
			$i++;		
		}

		echo json_encode($arr_data);
	}	
	
}
