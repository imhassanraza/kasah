<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Application extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user/appmodel');
		if (!checkUserLogin()) {
			redirect(base_url().'login');
		}
	}

	public function index(){
		$user = $this->session->userdata('user');
		if ($user['roll'] != "buyer") {
			$this->session->set_flashdata('error_msg','<b>Error!</b> The URL you are trying to access is invalid!');
			redirect(base_url().'user/dashboard');
		}
		$data['detail'] = $this->appmodel->userApplications($user['user_id']);
		$this->load->view('user/application/view',$data);
	}

	function edit($id) {
		$user = $this->session->userdata('user');
		$response = $this->appmodel->validationApplication($id,$user['user_id']);
		if (!$response) {
			$this->session->set_flashdata('error_msg','<b>Error!</b> The URL you are tyring to access is not valid!');
			redirect(base_url().'user/application');
		}
		if ($user['roll'] == "buyer") {
			$data['forms'] = getAll('ref_forms');
			$data['states'] = getAll('ref_states');
			$data['buyer_detail'] = getAll('application_buyer_detail','app_id',$id);
			$data['buyer_detail'] = $data['buyer_detail'][0];
			$data['application'] = $this->appmodel->getAppDetail($id,$user['user_id']);
			$data['cities'] = $this->appmodel->getCitiesByStateId($data['application']['state_id']);
			$this->load->view('user/application/edit',$data);
		}else{
			redirect(base_url().'user/dashboard');
		} 
	}

	function add() {
		$user = $this->session->userdata('user');
		if ($user['roll'] == "buyer") {
			$data['forms'] = getAll('ref_forms');
			$data['states'] = getAll('ref_states');
			$data['email'] = $user['email'];
			$this->load->view('user/application/add',$data);
		}else{
			redirect(base_url().'user/dashboard');
		} 
	}

	public function insertApplication(){
		$data = $_POST;
		$this->appmodel->insertApplication($data);
		$this->session->set_flashdata('success_msg','<b>Application Inserted</b> Your Application has been inserted successfully');
		redirect(base_url().'user/application');
	}

	public function updateApplication(){
		$data = $_POST;
		$this->appmodel->updateApplication($data);
		$this->session->set_flashdata('success_msg','<b>Application Updated</b> Your Application has been Updated successfully');
		if ($data['approval'] == "Y") {
			$update = array('is_complete' => 'Y');
			$where = array('id' => $data['appid']);
			updateData('buyer_application',$update,$where);
			$result['detail'] = $this->appmodel->getUserByApplication($data['appid']);
			$this->sendMail($result['detail']);
			$this->sendMailToAdmin($result['detail']);
			$this->session->set_flashdata('success_msg','<b>Approval Request!</b> Your Application has been Updated & sent for approval.');
		}
		redirect(base_url().'user/application');
	}

	public function sendMail($data){
		$to = $data['email'];
		$subject = "Application Approval - Kasah.co";
		$message = $this->load->view('email_template/app_approval',$data, true);
		
		send_mail_func($to,$subject,$message);
	}

	public function sendMailToAdmin($data){
		$to = "support@kasah.co";
		$subject = "Application Approval - Kasah.co";
		$message = $this->load->view('email_template/app_approval_admin',$data, true);
		
		send_mail_func($to,$subject,$message);
	}

	public function deleteDocument(){
		$data = $_POST;
		$update = array('is_delete' => 'Y');
		$where = array('id' => $data['id']);
		updateData('buyer_document',$update,$where);
		$count = count($this->appmodel->getDocCount($data['app_id']));
		if ($count >= 2) {
			$update = array('is_complete' => 'Y');
			$where = array('id' => $data['app_id']);
		}else{
			$update = array('is_complete' => 'N');
			$where = array('id' => $data['app_id']);
		}
		updateData('buyer_application',$update,$where);
	}

	public function document($id){
		$user = $this->session->userdata('user');
		$response = $this->appmodel->validationApplication($id,$user['user_id']);
		if (!$response) {
			$this->session->set_flashdata('error_msg','<b>Error!</b> The URL you are tyring to access is not valid!');
			redirect(base_url().'user/application');
		}
		$data['forms'] = getAll('ref_forms');
		$data['appid'] = $id;
		$data['appdetail'] = getAll('buyer_application','id',$id);
		$data['appdetail'] = $data['appdetail'][0];
		$data['documents'] = $this->appmodel->getDocumentDetails($id);
		$this->load->view('user/application/document',$data);
	}

	function uploadDocuments(){
		// show($_POST);
		$data = explode(',',$_POST['post_data']);
		$appid = $data[0];
		$formid = $data[1];
		$amount = $data[2];

		$config['upload_path']   = './uploads/document/';
		$config['allowed_types'] = '*';
		$config['encrypt_name'] = TRUE;  

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if(isset($_FILES['file']) && !empty($_FILES['file']['name']))
		{ 

			if($this->upload->do_upload('file'))
			{
				$upload_data = $this->upload->data();
				$this->appmodel->uploadDocuments($appid, $formid, $amount, $upload_data);
			}
		}
	}
}
?>