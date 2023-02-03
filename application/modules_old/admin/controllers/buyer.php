<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Buyer extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/buyer_model');
		if (!checkAdminLogin()) {
			redirect(base_url().'admin/login');
		}
	}

	public function email($appid){
		$data['detail'] = $this->buyer_model->getUserDetailsByAppid($appid);
		$this->load->view('admin/buyer/senddetail',$data);
	}

	public function notapprovedapplications(){
		$data['details'] = $this->buyer_model->getNotApprovedApps();
		$this->load->view('admin/buyer/manage_notapproved',$data);
	}

	function view($id) {
		$data['detail'] = $this->buyer_model->getBuyerApplicationById($id);
		$data['detail']['document'] = $this->buyer_model->getBuyerForms($id);
		$this->load->view('admin/buyer/view',$data);
        // show($data);
	}

	public function delete($id){
		$update = array('is_delete' => 'Y');
		$where = array('id' => $id);
		updateData('buyer_application', $update, $where);
		$this->session->set_flashdata('success_msg','Application deleted successfuly!');
		redirect(base_url().'admin/buyer/applications');
	}

	function edit($id) {
		$data['detail'] = $this->buyer_model->getBuyerApplicationById($id);
		$data['detail']['document'] = $this->buyer_model->getBuyerForms($id);

		$this->load->view('admin/buyer/edit',$data);
        // show($data);
	}

	public function deleteDocument(){
		$data = $_POST;
		$update = array('is_delete' => 'Y');
		$where = array('id' => $data['id']);
		updateData('buyer_document',$update,$where);
	}

	function applications() {
		$data['details'] = $this->buyer_model->getBuyerApplication();
		$this->load->view('admin/buyer/manage',$data);
        // show($data);
	}

	function update() {
		// show($_POST);
		$data = $_POST;
		$this->buyer_model->updateBuyerApplication($data);
		$this->session->set_flashdata('success_msg','Data updated successfuly');
		redirect(base_url().'admin/buyer/applications');
	}

	public function ajax_call(){
		$data = $_POST;
		$this->load->view('admin/ajax_call',$_POST,true);
		if ($data['col'] == "is_approved" && $data['val'] == "Y") {
			$update = array('is_complete' => 'N');
			$where = array('id' => $data['id']);
			updateData('buyer_application',$update,$where);
			$data['detail'] = $this->buyer_model->getUserDetailsByAppid($data['id']);
			$this->sendMailApproved($data['detail']);
		}else if($data['col'] == "is_approved" && $data['val'] == "N") {
			$update = array('is_complete' => 'N');
			$where = array('id' => $data['id']);
			updateData('buyer_application',$update,$where);
			$data['detail'] = $this->buyer_model->getUserDetailsByAppid($data['id']);
			$this->sendMailDenied($data['detail']);
		}
		echo "1";
	}

	public function sendMailApproved($data){
		$to = $data['email'];
		$subject = "Application Approved - Kasah.co";
		$message = $this->load->view('email_template/application_approved',$data, true);

		send_mail_func($to,$subject,$message);
		
	}

	public function sendMailDenied($data){
		$to = $data['email'];
		$subject = "Application Denied - Kasah.co";
		$message = $this->load->view('email_template/application_denied',$data, true);

		send_mail_func($to,$subject,$message);
	}

	public function emailToBuyer(){
		$data = $_POST;
		$to = $data['email'];
		$subject = $data['subject'];
		$message = $this->load->view('admin/buyer/email_template',$data, true);

		send_mail_func($to,$subject,$message);
		
		$this->session->set_flashdata('success_msg','<b>Emailed!</b> Email has been sent to buyer successfully');
		redirect(base_url().'admin/buyer/applications');
	}
}


?>