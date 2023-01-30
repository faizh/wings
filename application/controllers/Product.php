<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	protected $page = 'home';

	function __construct() {
		 parent::__construct();

		 if (empty($this->session->userdata('is_logged_in'))) {
		 	redirect('auth/login');
		 }
	}

	public function product_details($product_code)
	{
		$this->load->model('m_products');

		$data_product = $this->m_products->getByProductCode($product_code);

		$page = $this->page;

		$this->load->view('layouts/navbar', compact('page'));
		$this->load->view('contents/product_details', compact('data_product'));
		$this->load->view('layouts/footer');
	}
}