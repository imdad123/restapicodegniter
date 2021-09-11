<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Welcome extends REST_Controller  {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		$this->load->database();
	 }
	public function user_get()
	{
		$results = $this->db->query("select * from users");
		$users = $results->result_array();
         if(!empty($users))
		 {
           $this->response($users,REST_Controller::HTTP_OK);

		 }else{
			 $this->response(['status'=>false,
			 "message"=>"No User Found"],REST_Controller::HTTP_NOT_FOUND);
		 }

	}
}
