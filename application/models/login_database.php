
<?php

Class Login_Database extends CI_Model {

public function registration_insert($data) {

	$condition = "name =" . "'" . $data['name'] . "'";
	$this->db->select('*');
	$this->db->from('user');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();
	if ($query->num_rows() == 0)
	 {
	 	//echo "jahdf";

		$this->db->insert('user', $data);
		if ($this->db->affected_rows() > 0) 
		{
			//echo "hoise";
		return true;
		}
	} 
	else {
		//echo "hoini";

		return false;
	}
}

public function login($data) {

	$condition = "name =" . "'" . $data['name'] . "' AND " . "password =" . "'" . $data['password'] . "'";
	$this->db->select('*');
	$this->db->from('user');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) 
	{
		return true;
	}
	else 
	{
		return false;
	}
}

public function read_user_information($username) {

	$condition = "name =" . "'" . $username . "'";
	$this->db->select('*');
	$this->db->from('user');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1)
	{
		return $query->result();
	} 
	else {
		return false;
	}
}

}

?>