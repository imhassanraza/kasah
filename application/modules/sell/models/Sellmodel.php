<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sellmodel extends CI_Model {

    function insertListing($data) {

        $this->db->trans_start();

        // insert into sell_basic
        $user = $this->session->userdata('user');
        $this->db->set('user_id', $user['user_id']);
        $this->db->set('property_id', $data['property_type']);
        $this->db->set('bedrooms', $data['bedrooms']);
        $this->db->set('bathrooms', $data['bathrooms']);
        $this->db->set('partial_baths', $data['partial_baths']);
        $this->db->set('square_feet', $data['square_feet']);
        $this->db->set('lotsize_sqft', $data['lot_size_sqft']);
        $this->db->set('yearbuilt', $data['year_built']);
        $this->db->set('occupancy_id', $data['occupancy']);
        $this->db->set('hoa_check', (isset($data['hoa_check'])) ? "Y" : "N" );
        $this->db->set('esd', $data['elementary_school_district']);
        $this->db->set('hsd', $data['high_school_district']);
        $this->db->set('lease_option', $data['lease_option']);
        $this->db->set('draft', 'Y');
        $this->db->set('home_address', $data['home_address']);
        $this->db->set('date_added', date('Y-m-d H:i:s'));
        $this->db->insert('sell_basic');
        $sell_id = $this->db->insert_id();


        // insert into sell_interior
        $this->db->set('sell_id', $sell_id);
        $this->db->set('fireplace_id', $data['fireplace']);
        $this->db->set('heating_id', $data['heating']);
        $this->db->set('cooling_id', $data['cooling']);
        $this->db->insert('sell_interior');


        // insert into sell_interior_feature
        foreach ($data['dining_room'] as $dining) {
            $this->db->set('sell_id', $sell_id);
            $this->db->set('feature_id', $dining);
            $this->db->set('feature_type', 'dining');
            $this->db->insert('sell_interior_feature');
        }

        foreach ($data['ref_family_room'] as $family) {
            $this->db->set('sell_id', $sell_id);
            $this->db->set('feature_id', $family);
            $this->db->set('feature_type', 'family');
            $this->db->insert('sell_interior_feature');
        }


        // insert into sell_exterior
        $this->db->set('sell_id', $sell_id);
        $this->db->set('horse_property', $data['horse_property']);
        $this->db->set('carport', $data['carport']);
        $this->db->set('pool', $data['pool']);
        $this->db->set('garage_space', $data['garage_spaces']);
        $this->db->insert('sell_exterior');


        // insert into sell_exterior_feature
        foreach ($data['ref_parking_feature'] as $feature_id) {
            $this->db->set('sell_id', $sell_id);
            $this->db->set('feature_id', $feature_id);
            $this->db->set('feature_type', 'parking');
            $this->db->insert('sell_exterior_feature');
        }

        foreach ($data['ref_foundation'] as $feature_id) {
            $this->db->set('sell_id', $sell_id);
            $this->db->set('feature_id', $feature_id);
            $this->db->set('feature_type', 'foundation');
            $this->db->insert('sell_exterior_feature');
        }

        foreach ($data['ref_utilities'] as $feature_id) {
            $this->db->set('sell_id', $sell_id);
            $this->db->set('feature_id', $feature_id);
            $this->db->set('feature_type', 'utilities');
            $this->db->insert('sell_exterior_feature');
        }

        foreach ($data['ref_water'] as $feature_id) {
            $this->db->set('sell_id', $sell_id);
            $this->db->set('feature_id', $feature_id);
            $this->db->set('feature_type', 'water');
            $this->db->insert('sell_exterior_feature');
        }

        foreach ($data['ref_sewer'] as $feature_id) {
            $this->db->set('sell_id', $sell_id);
            $this->db->set('feature_id', $feature_id);
            $this->db->set('feature_type', 'sewer');
            $this->db->insert('sell_exterior_feature');
        }

        foreach ($data['ref_roof'] as $feature_id) {
            $this->db->set('sell_id', $sell_id);
            $this->db->set('feature_id', $feature_id);
            $this->db->set('feature_type', 'roof');
            $this->db->insert('sell_exterior_feature');
        }


        // insert into sell_description
        $this->db->set('sell_id', $sell_id);
        $this->db->set('about_home', $data['about_home']);
        $this->db->set('home_desc', $data['home_description']);
        $this->db->set('home_worth', $data['home_worth']);
        $this->db->insert('sell_description');


        // insert into sell_contact
        $this->db->set('sell_id', $sell_id);
        $this->db->set('contact_name', $data['contact_name']);
        $this->db->set('contact_email', $data['contact_email']);
        $this->db->set('contact_date', date('Y-m-d', strtotime($data['contact_date'])));
        $this->db->set('start_time', $data['start_time']);
        $this->db->set('end_time', $data['end_time']);
        $this->db->set('instruction_to_buyer', $data['instruction_to_buyer']);
        $this->db->insert('sell_contact');

        $this->db->trans_complete();
        $response = array('status' => $this->db->trans_status(),
            'sell_id' => $sell_id);
        return $response;
    }

    function insertPhotos($id, $name, $size, $type) {
        $this->db->set('sell_id', $id);
        $this->db->set('photo_name', $name);
        $this->db->set('img_type', $type);
        $this->db->set('img_size', $size);
        $this->db->insert('sell_photo');
    }

}

?>