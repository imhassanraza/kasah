<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Buy extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		$user = $this->session->userdata('user');
		if ($user['roll'] == "seller") {
			redirect(base_url().'user/dashboard');
		}
		$this->load->view('buy/buy');
	}
}
?>