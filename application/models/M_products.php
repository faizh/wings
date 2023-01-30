<?php 

class M_products extends CI_Model {

	function tableName() {
		return 'product';
	}

	public function getProducts()
	{
		$query = "SELECT * FROM ".$this->tableName();

		return $this->db->query($query)->result();
	}

	public function getByProductCode($product_code)
	{
		$query = "
		SELECT *
		FROM ".$this->tableName()."
		WHERE product_code = ?";

		return $this->db->query($query, array($product_code))->row();
	}
}