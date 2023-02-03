<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Document extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('docmodel');
		if (!checkUserLogin()) {
			redirect(base_url().'login');
		}
	}

	function index() {
		$user = $this->session->userdata('user');
		if ($user['roll'] == "buyer") {
			$data['applications'] = $this->docmodel->getAllApplications($user['user_id']);
			$w = 0;
			foreach ($data['applications'] as $app) {
				$data['applications'][$w]['documents'] = $this->docmodel->getAllDocuments($app['id']);
				$w++;
			}
			$data['shared_document'] = $this->docmodel->getUserDocument($user['user_id']);
			// show($data);
			$this->load->view('user/document/buyer',$data);
		}
		elseif($user['roll'] == "seller"){
			$data['shared_document'] = $this->docmodel->getUserDocument($user['user_id']);
			$this->load->view('user/document/seller',$data);
		}
	}

	function uploadDocuments(){
		// show($_POST);
		$data = $_POST;
		$user = $this->session->userdata('user');
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
				$this->docmodel->uploadDocuments($user['user_id'], $upload_data);
			}
		}
	}

	function mailFunction(){
		$data = $this->session->userdata('user');

		$to = "support@kasah.co";
		$subject = "New Document Notification - Kasah.co";
		$message = $this->load->view('email_template/document_uploaded_admin',$data, true);

		send_mail_func($to,$subject,$message);
		echo "done";
	}
}
?>