<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Recoveraccount extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('recoveraccount/accountmodel');
		if (checkUserLogin()) {
			redirect(base_url().'user/dashboard');
		}
	}
	
	function index() {
		if ($_POST) {
			$data = $_POST;
			$data['detail'] = $this->accountmodel->getDetailByEmail($data['email']);
			$response =  count($data['detail']);
			if (!$response) {
				$this->session->set_flashdata('error_msg','This email does not exists in our system!');
				redirect(base_url().'recoveraccount');
			}else{
				$to = $data['email'];
				$subject = "Acount Recovery - Kasah.co";
				$message = $this->load->view('email_template/recovery',$data, true);
				
				send_mail_func($to,$subject,$message);
				$this->session->set_flashdata('success_msg','Mail has been sent to your Email Address');
				redirect(base_url().'recoveraccount');
			}
		}
		$this->load->view('recoveraccount/recovery');
	}

	public function token($token = ''){
		if (empty($token)) {
			redirect(base_url().'login');
		}
		$response = $this->accountmodel->tokenValidation($token);
		if (!$response) {
			$this->session->set_flashdata('error_msg','This email does not exists in our system!');
			redirect(base_url().'login');
		}
		$data['token'] = $token;
		$data['detail'] = $this->accountmodel->getUserDetail($token);
		$this->load->view('recoveraccount/newpassword',$data);
	}

	public function updatePassword(){
		$data = $_POST;
		$this->accountmodel->updatePassword($data);
		$this->session->set_flashdata('success_msg','Password has been succesfully changed');
		redirect(base_url().'login');
	}
}
?>