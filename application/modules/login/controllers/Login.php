<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('login/loginmodel');
		if (checkUserLogin()) {
			redirect(base_url().'user/dashboard');
		}
	}
	
	function index() {
		if ($_POST) {
			$data = $_POST;
			$data['user_detail'] = $this->loginmodel->fetchUserData($data);
			// show($data);
			if (empty($data['user_detail'])) {
				$this->session->set_flashdata('error_msg','No record found related to this email');
				redirect(base_url().'login');
			}
			if ($data['user_detail']['is_approved'] == "N") {
				$this->session->set_flashdata('error_msg','Your account is not yet approved');
				redirect(base_url().'login');
			}
			$array = array(
						'email' => $data['email'],
						'name' => $data['user_detail']['fullname'],
						'user_id' => $data['user_detail']['id'],
						'roll' => $data['user_detail']['user_roll'],
						'logged_in' => true
						);
			$this->session->set_userdata('user',$array);
			redirect(base_url().'user/dashboard');

		}
		$this->load->view('login/login');
	}
}
?>