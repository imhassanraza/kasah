<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$admins = $this->session->userdata('admins');
		if(!$admins['is_user_login'])
		{
			redirect(base_url().'admin/login');
		}
	}	
	public function index()
	{
		$data['apps'] = count($this->admin_model->getApplications());
		$data['sellers'] = count($this->admin_model->getSellers());
		$data['buyers'] = count($this->admin_model->getBuyers());
		$data['properties'] = count($this->admin_model->getProperties());
		$this->load->view('admin/dashboard',$data);
	}	

}

