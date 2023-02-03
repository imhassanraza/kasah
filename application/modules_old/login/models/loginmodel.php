<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Loginmodel extends CI_Model {

	function fetchUserData($data){
		$hash_pass="password('".$data['password']."')"; 
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$data['email']);
		$this->db->where('is_delete','N');
		$this->db->where('password',$hash_pass,false);
		$query = $this->db->get();
		return $query->row_array();
	}

}
?>