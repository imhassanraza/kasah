<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manage_admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/manage_admin_model');
		if (!checkAdminLogin()) {
			redirect(base_url().'admin/login');
		}
	}

	public function index() {
		$data['admins'] = getAll('admins','is_delete','N');
		$this->load->view('admin/manage_admin/manage',$data);
	}

	public function view($id){
		$data['details'] = getAll('admins', 'id', $id);
		$data['details'] = $data['details'][0];
		$this->load->view('admin/manage_admin/view',$data);
	}

	public function add(){
		if ($_POST) {
			$data = $_POST;
			$this->manage_admin_model->insertAdmin($data);
			if (isset($data['send_admin_notification']) ||  $data['send_admin_notification'] == 'Y') {
				$this->sendMail($data);
			}
			$this->session->set_flashdata('success_msg','Admin added successfuly!');
			redirect(base_url().'admin/manage_admin');
		}
		$this->load->view('admin/manage_admin/add');
	}

	public function edit($id){
		if ($_POST) {
			$data = $_POST;
			$data['id'] = $id;
			$this->manage_admin_model->updateAdmin($data);
			$this->session->set_flashdata('success_msg','Admin detail updated successfuly!');
			redirect(base_url().'admin/manage_admin');
		}
		$data['details'] = getAll('admins', 'id', $id);
		$data['details'] = $data['details'][0];
		$this->load->view('admin/manage_admin/edit',$data);
	}

	public function delete($id){
		$this->manage_admin_model->deleteAdmin($id);
		$this->session->set_flashdata('success_msg','Account has been deleted successfuly');
		redirect(base_url().'admin/manage_admin');
	}

	public function emailCheck(){
		$data = $_POST;
		$isUNameCount = $this->manage_admin_model->emailCheck($data);
		if($isUNameCount > 0){
			echo "false";
		}else{
			echo "true";
		}
	}

	function sendMail($data){

		// Email template start
		$to = $data['email'];
		$from = "noreply.explorelogics@gmail.com";
		$subject = "Account Created - Kasah.co";

		$message = $this->load->view('email_template/addadmin',$data,true);
		$cc = "";
		// Email template ending
		send_mail_func($to,$subject,$message);
		
	}
}

?>