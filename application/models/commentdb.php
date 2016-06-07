<?php
class Commentdb extends CI_Model {
	
	function all() {
		
		$results = $this->db->get('comment')->result();
		
		
		
		return $results;
		
	}

	
	/*function get($username) {
		
		$results = $this->db->get_where('comment', array('Username' => $usename))->result();
		
		return $results;
	}*/

	/*function getcomment($comments) {
		
		$results = $this->db->get_where('comment', array('Comments' => $comment))->result();
		//$result=$results[0];
		
		return $results[0];
	}*/

	/*function resall() {
		
		$results = $this->db->get('restaurant')->result();
		
		
		
		return $results;
		
	}*/

}
