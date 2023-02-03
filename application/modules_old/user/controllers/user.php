<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user/usermodel');
		if (!checkUserLogin()) {
			redirect(base_url().'login');
		}
	}

	public function dashboard() {
		$user = $this->session->userdata('user');
		if ($user['roll'] == "buyer") {
			$data['count'] = count($this->usermodel->userAppCount($user['user_id']));
			$this->load->view('user/buyer/dashboard',$data);
		}else{
			$where1 = array('draft'=>'Y', 'is_approved'=>'N', 'is_delete'=>'N', 'is_sold' => 'N' , 'user_id' => $user['user_id']);
			$where2 = array('is_approved'=>'Y', 'is_delete'=>'N', 'is_sold' => 'N', 'user_id' => $user['user_id']);
			$where3 = array('publish_approve'=>'Y', 'is_delete'=>'N', 'is_sold' => 'N', 'user_id' => $user['user_id']);
			$where4 = array('is_sold'=>'N', 'is_delete'=>'N', 'is_sold' => 'Y', 'user_id' => $user['user_id']);

			$data['draft_rows'] = singleRow('sell_basic', 'count(*) as ct', $where1);
			$data['published_rows'] = singleRow('sell_basic', 'count(*) as ct', $where2);
			$data['publish_approve'] = singleRow('sell_basic', 'count(*) as ct', $where3);
			$data['sold'] = singleRow('sell_basic', 'count(*) as ct', $where4);
			$this->load->view('user/seller/dashboard',$data);
		}
	}

	public function properties(){
		$user = $this->session->userdata('user');
		if ($user['roll'] == "seller") {
			$data['details'] = $this->usermodel->getListingDetails($user['user_id'],'properties');
			$this->load->view('user/seller/properties',$data);
			// show($data);
		}else{
			redirect(base_url().'user/dashboard');
		}
	}

	public function loadCities(){
		$data = $_POST;
		$data['cities'] = $this->usermodel->getCities($data['state_code']);
		$html = $this->load->view('user/ajax_record',$data,true);
		$response = array('select' => $html);
		echo json_encode($response);
	}

}
?>