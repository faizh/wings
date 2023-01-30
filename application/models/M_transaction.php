<?php 

class M_transaction extends CI_Model {

	public function transactionTable()
	{
		return 'transaction_header';
	}

	public function transactionDetailTable()
	{
		return 'transaction_detail';
	}

	public function insert_transaction($data=array())
	{
		if (! $this->db->insert($this->transactionTable(), $data)) {
			return array(
				'status'	=> false,
				'id'		=> null
			);
		}

		return array(
			'status'	=> true,
			'id'		=> $this->db->insert_id()
		);
	}

	public function insert_transaction_detail($data=array())
	{
		if (! $this->db->insert($this->transactionDetailTable(), $data)) {
			return FALSE;
		}

		return TRUE;
	}

	public function get_all_transactions()
	{
		$query = "
		SELECT 
		th.`document_code`,
		th.`document_number`,
		u.`user`,
		th.`total`,
		DATE(th.`created_dtm`) AS create_date
		FROM `transaction_header` th
		JOIN `transaction_detail` td ON td.`document_number` = th.`document_number` AND td.`document_code` = th.`document_code`
		JOIN `product` p ON p.`product_code` = td.`product_code`
		JOIN users u ON u.`id` = th.`user_id`
		GROUP BY th.`document_number`";

		return $this->db->query($query)->result();
	}

	public function get_transactions_details($document_number)
	{
		$query = "
		SELECT 
		p.`product_name`,
		td.`quantity`
		FROM `transaction_detail` td 
		JOIN `product` p ON p.`product_code` = td.`product_code`
		WHERE td.`document_number` = ?";

		return $this->db->query($query, array($document_number))->result();
	}
}