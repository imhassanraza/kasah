<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contactus extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('contactmodel');
	}
	
	function index() {
		if ($_POST) {
			$data = $_POST;
			$this->contactmodel->insertQuery($data);
			$this->sendMail($data);
			$this->session->set_flashdata('success_msg','<b>Sent!</b> Your message has been sent successfully.');
			redirect(base_url().'contactus');
		}
		$this->load->view('contactus/contactus');
	}

	public function sendMail($data){
		$to = "support@kasah.co";
		$subject = "New Inquiry - Kasah.co";
		$message = $this->load->view('email_template/contactus',$data, true);
		
		send_mail_func($to,$subject,$message);
	}
}
?>