<?php 

class M_users extends CI_Model {

	public function tableName()
	{
		return 'users';
	}

	public function insert($data=array())
	{
		if (! $this->db->insert($this->tableName(), $data)) {
			return FALSE;
		}

		return TRUE;
	}

	public function getByUsername($username)
	{
		$query = "SELECT * FROM users u WHERE u.user = ?";

		return $this->db->query($query, array($username))->row();
	}
}