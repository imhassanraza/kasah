<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contactmodel extends CI_Model {

	public function insertQuery($data){
		$this->db->set('name',$data['name']);
		$this->db->set('email',$data['email']);
		$this->db->set('number',$data['number']);
		$this->db->set('subject',$data['subject']);
		$this->db->set('message',$data['message']);
		$this->db->set('date_added',date('Y-m-d H:i:s'));
		$this->db->insert('contactus');
	}

}
?>