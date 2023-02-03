<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('signup/signupmodel');
		if (checkUserLogin()) {
			redirect(base_url().'user/dashboard');
		}
	}
	
	function index($roll = '') {
		if ($_POST) {
			$data = $_POST;
			if ($this->signupmodel->isEmailUsed($data)) {
				$this->session->set_flashdata('error_msg','This email is already in use, Please change the email!');
				if ($data['user_roll'] == "buyer") {
					$url = "buyer";
				}else{
					$url = "";
				}
				redirect(base_url().'signup/'.$url);
			}
			$this->signupmodel->insertUser($data);
			$this->session->set_flashdata('success_msg','Request for your account approval has been sent!');
			$this->sendMail($data);
			redirect(base_url().'login');
		}
		$data['roll'] = $roll;
		$this->load->view('signup/signup',$data);
	}

	public function sendMail($data){
		$to = $data['email'];
		$subject = "Thanks For Joining Us - Kasah.co";
		$message = $this->load->view('email_template/signup',$data, true);
		
		send_mail_func($to,$subject,$message);
	}
}
?>