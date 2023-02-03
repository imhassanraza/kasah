<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Signupmodel extends CI_Model {

	function insertUser($data){
		$hash_pass="password('".$data['password']."')"; 
		$key = md5(microtime().rand());
		$this->db->set('fullname',$data['name']);
		$this->db->set('user_roll',$data['user_roll']);
		$this->db->set('email',$data['email']);
		$this->db->set('token',$key);
		$this->db->set('password',$hash_pass,false);
		$this->db->set('created_date',date('Y-m-d H:i'));
		$this->db->insert('users');
	}

	function isEmailUsed($data){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$data['email']);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}


}
?>