<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller{

	protected $page = 'report';

	function __construct() {
		 parent::__construct();

		 if (empty($this->session->userdata('is_logged_in'))) {
		 	redirect('auth/login');
		 }
	}

	public function index()
	{
		$this->load->model('m_transaction');

		$page 		= $this->page;

		$transactions 	= $this->m_transaction->get_all_transactions();

		$transaction_details = array();
		foreach ($transactions as $transaction) {
			$transaction_details[$transaction->document_number] = $this->m_transaction->get_transactions_details($transaction->document_number);
		}

		$this->load->view('layouts/navbar', compact('page'));
		$this->load->view('contents/report', compact('transactions', 'transaction_details'));
		$this->load->view('layouts/footer');
	}
}
