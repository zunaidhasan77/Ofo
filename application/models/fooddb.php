<?php
class Fooddb extends CI_Model {
	
	function all() {
		
		$results = $this->db->get('food')->result();
		
		
		
		return $results;
		
	}

	
	function get($id) {
		
		$results = $this->db->get_where('food', array('resid' => $id))->result();
		
		return $results;
	}

	function getrestaurant($foodid) {
		
		$results = $this->db->get_where('food', array('id' => $foodid))->result();
		//$result=$results[0];
		
		return $results[0];
	}

	function resall() {
		
		$results = $this->db->get('restaurant')->result();
		
		
		
		return $results;
		
	}

}
