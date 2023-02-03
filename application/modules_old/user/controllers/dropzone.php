<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dropzone extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function upload(){
		// echo "<rep>";
		// print_r(explode(',',$_POST['post_data']));
		// print_r($_FILES);
		// exit;
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
				show($upload_data);
			}
		}
	}
}
?>