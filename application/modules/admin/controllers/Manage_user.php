<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manage_user extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/user_model');
		$admins = $this->session->userdata('admins');
		if (!checkAdminLogin()) {
			redirect(base_url().'admin/login');
		}
	}

	public function seller() {
		$data['users'] = $this->user_model->getSellers();
		$this->load->view('admin/manage_user/manage',$data);
	}

	public function document($user_id){
		$data['detail'] = $this->user_model->getUser($user_id);
		$data['detail']['documents'] = $this->user_model->getUserDocument($user_id);
		// show($data);
		$this->load->view('admin/document/user_document',$data);
	}

	function mailFunction(){
		$data = $_POST;
		$data['detail'] = $this->user_model->getUser($data['id']);
		$this->sendMailToUser($data['detail']);
		echo "done";
	}

	function uploadDocuments(){
		$data = $_POST;
		$admin = $this->session->userdata('admins');
		$config['upload_path']   = './uploads/shared_document/';
		$config['allowed_types'] = '*';
		$config['encrypt_name'] = TRUE;  

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if(isset($_FILES['file']) && !empty($_FILES['file']['name']))
		{ 

			if($this->upload->do_upload('file'))
			{
				$upload_data = $this->upload->data();
				$upload_data['custom_name'] = $data['post_data'];
				$this->user_model->uploadDocuments($data['user_id'],$admin['admin_id'], $upload_data);
			}
		}
	}

	public function deleteDocument(){
		$data = $_POST;
		$update = array('is_delete' => 'Y');
		$where = array('id' => $data['id']);
		updateData('user_document',$update,$where);
	}

	public function buyer() {
		$data['users'] = $this->user_model->getBuyers();
		$this->load->view('admin/manage_user/manage',$data);
	}

	public function view($id){
		$data['details'] = getAll('users', 'id', $id);
		$data['details'] = $data['details'][0];
		$this->load->view('admin/manage_user/view',$data);
	}

	public function edit($id){
		if ($_POST) {
			$data = $_POST;
			$data['id'] = $id;
			$url = $_POST['url'];
			$this->user_model->updateUser($data);
			$this->session->set_flashdata('success_msg','User detail updated successfuly!');
			redirect(base_url().'admin/manage_user/'. $url);
		}
		$data['details'] = getAll('users', 'id', $id);
		$data['details'] = $data['details'][0];
		$this->load->view('admin/manage_user/edit',$data);
	}

	public function delete($id){
		$user = $this->user_model->getUser($id);
		$this->user_model->deleteUser($id);
		$this->session->set_flashdata('success_msg','Account has been deleted successfuly');
		redirect(base_url().'admin/manage_user/'.$user['user_roll']);
	}

	public function ajax_call(){
		$data = $_POST;
		$data['detail'] = getAll('users','id',$data['id']);
		$data['detail'] = $data['detail'][0];
		$this->load->view('admin/ajax_call',$_POST,true);
		if ($_POST['col'] == "is_approved" && $_POST['val'] == "Y") {
			$this->sendMail($data['detail']);
		}
		echo "1";
	}

	public function sendMail($data){
		$to = $data['email'];
		$subject = "Your Account has been Approved - Kasah.co";
		$message = $this->load->view('email_template/account_approve',$data, true);
		
		send_mail_func($to,$subject,$message);
	}

	public function sendMailToUser($data){
		$to = $data['email'];
		$subject = "New Document Notification - Kasah.co";
		$message = $this->load->view('email_template/document_uploaded',$data, true);
		
		send_mail_func($to,$subject,$message);
	}

}

?>