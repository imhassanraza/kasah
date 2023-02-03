<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user/usermodel');
		if (!checkUserLogin()) {
			redirect(base_url().'login');
		}
	}

	public function index() {
		$user = $this->session->userdata('user');
		if ($user['roll'] == "seller") {
			$data['detail'] = getAll('users','id',$user['user_id']);
			$data['detail'] = $data['detail'][0];
			$this->load->view('user/seller/profile',$data);
		}else{
			$data['detail'] = getAll('users','id',$user['user_id']);
			$data['detail'] = $data['detail'][0];
			$this->load->view('user/buyer/profile',$data);
		}
	}

	public function updateDetail(){
		$data = $_POST;
		$user = $this->session->userdata('user');
		$update = array('fullname' => $data['name']);
		$where = array('id' => $user['user_id']);
		updateData('users',$update,$where);
		$this->session->set_flashdata('detail_msg','Detail updated successfully!');
		redirect(base_url().'user/profile');
	}

	public function updatePassword(){
		$data = $_POST;
		$response = $this->usermodel->passwordValidation($data);
		if (!$response) {
			$this->session->set_flashdata('pass_msg','Old password is not correct!');
			redirect(base_url().'user/profile');
		}
		$this->usermodel->updatePassword($data);
		$this->session->set_flashdata('pass_msg','Password updated successfully!');
		redirect(base_url().'user/profile');
	}
}
?>
