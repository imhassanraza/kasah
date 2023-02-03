<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reportingmodel extends CI_Model {

	public function getListingByFilter($data){
		$this->db->select('*');
		$this->db->from('users u');
		$this->db->join('sell_basic sb','u.id = sb.user_id');
		$this->db->join('sell_interior si','sb.id = si.sell_id');
		$this->db->join('sell_exterior se','sb.id = se.sell_id');
		$this->db->join('sell_description sd','sd.sell_id = sb.id');
		$this->db->join('sell_contact sc','sc.sell_id = sb.id');
		$this->db->join('ref_property_type pt','pt.id = sb.property_id');
		$this->db->join('ref_cooling c','c.id = si.cooling_id');
		$this->db->join('ref_heating h','h.id = si.heating_id');
		$this->db->join('ref_fireplace f','f.id = si.fireplace_id');
		$this->db->where('sb.is_delete','N');
		if (!empty($data['from']) && !empty($data['to'])) {
			$this->db->where('sb.date_added >=', date('Y-m-d H:i:s',strtotime($data['from'])));
			$this->db->where('sb.date_added <=', date('Y-m-d H:i:s',strtotime($data['to'])));
		}
		if (!empty($data['inspection']) && $data['inspection'] == "close") {
			$this->db->where('sc.contact_date <', date('Y-m-d'));
		}elseif (!empty($data['inspection']) && $data['inspection'] == "open") {
			$this->db->where('sc.contact_date >', date('Y-m-d'));
		}
		if (!empty($data['status'])) {
			$this->db->where('sb.'.$data['status'], 'Y');
		}
		$this->db->order_by('sb.date_added', 'desc');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function getListings(){
		$this->db->select('*');
		$this->db->from('users u');
		$this->db->join('sell_basic sb','u.id = sb.user_id');
		$this->db->join('sell_interior si','sb.id = si.sell_id');
		$this->db->join('sell_exterior se','sb.id = se.sell_id');
		$this->db->join('sell_description sd','sd.sell_id = sb.id');
		$this->db->join('sell_contact sc','sc.sell_id = sb.id');
		$this->db->join('ref_property_type pt','pt.id = sb.property_id');
		$this->db->join('ref_cooling c','c.id = si.cooling_id');
		$this->db->join('ref_heating h','h.id = si.heating_id');
		$this->db->join('ref_fireplace f','f.id = si.fireplace_id');
		$this->db->where('sb.is_delete','N');
		$this->db->order_by('sb.date_added', 'desc');

		$query = $this->db->get();
		return $query->result_array();
	}
}
?>