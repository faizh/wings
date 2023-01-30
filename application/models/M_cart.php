<?php 

class M_cart extends CI_Model {
	public function tableName()
	{
		return 'cart';
	}

	public function insert($data=array())
	{
		if (! $this->db->insert($this->tableName(), $data)) {
			return FALSE;
		}

		return TRUE;
	}

	public function update($data=array(), $where=array())
	{
		if (! $this->db->update($this->tableName(), $data, $where)) {
			return FALSE;
		}

		return TRUE;
	}

	public function delete($data=array())
	{
		if (! $this->db->delete($this->tableName(), $data)) {
			return FALSE;
		}

		return TRUE;
	}

	public function getCartByUserId($user_id)
	{
		$query = "
		SELECT 
		p.*,
		c.`id` as cart_id,
		SUM(c.`qty`) as qty
		FROM cart c
		JOIN product p ON p.`product_code` = c.`product_code`
		WHERE c.`user_id` = ?
		GROUP BY c.`product_code`";

		return $this->db->query($query, array($user_id))->result();
	}

	public function getDetailCart($user_id, $product_code)
	{
		$query = "
		SELECT *
		FROM cart c
		WHERE c.`user_id` = ? AND c.`product_code` = ?";

		return $this->db->query($query, array($user_id, $product_code))->row();
	}
}