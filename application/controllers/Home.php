<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	protected $page = 'home';

	function __construct() {
		 parent::__construct();

		 if (empty($this->session->userdata('is_logged_in'))) {
		 	redirect('auth/login');
		 }
	}

	public function index()
	{
		$this->load->model(array(
			'm_products'
		));

		$products = $this->m_products->getProducts();

		$page = $this->page;

		$this->load->view('layouts/navbar', compact('page'));
		$this->load->view('contents/home', compact('products'));
		$this->load->view('layouts/footer');
	}
}