<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	protected $page = 'cart';

	function __construct() {
		 parent::__construct();

		 if (empty($this->session->userdata('is_logged_in'))) {
		 	redirect('auth/login');
		 }
	}

	public function index()
	{
		$this->load->model('m_cart');

		$user_id 	= $this->session->userdata('user_id');
		$carts 		= $this->m_cart->getCartByUserId($user_id);

		$page 		= $this->page;
		$this->load->view('layouts/navbar', compact('page'));
		$this->load->view('contents/cart', compact('carts'));
		$this->load->view('layouts/footer');
	}

	public function add_to_cart()
	{
		$this->load->model('m_cart');

		$user_id 		= $this->session->userdata('user_id');
		$product_code 	= $this->input->post('product_code');

		$existing_cart 	= $this->m_cart->getDetailCart($user_id, $product_code);

		if (isset($existing_cart->id)) {
			$data = array(
				'qty'		=> $existing_cart->qty + 1
			);

			$where = array(
				'user_id'		=> $user_id,
				'product_code'	=> $product_code
			);

			if (! $this->m_cart->update($data, $where)) {
				echo json_encode(array(
					'status' => false,
					'message'	=> 'Gagal menambahkan product ke dalam cart'
				));
				exit();
			}

		}else{
			$data = array(
				'user_id'		=> $user_id,
				'product_code'	=> $product_code,
				'qty'			=> 1
			);

			if (! $this->m_cart->insert($data)) {
				echo json_encode(array(
					'status' => false,
					'message'	=> 'Gagal menambahkan product ke dalam cart'
				));
				exit();
			}
		}

		echo json_encode(array(
			'status'	=> true,
			'message'	=> 'Sukses menambahkan product ke dalam cart'
		));
	}

	public function delete_cart()
	{
		$this->load->model('m_cart');

		$cart_id = $this->input->post('cart_id');

		if (! $this->m_cart->delete(array('id' => $cart_id))) {
			echo json_encode(array(
				'status' => false,
				'message'	=> 'Gagal menghapus product dari cart'
			));
			exit();
		}

		echo json_encode(array(
			'status'	=> true,
			'message'	=> 'Sukses menghapus product dari cart'
		));
	}

	public function checkout()
	{
		$this->load->model(array(
			'm_cart',
			'm_transaction'
		));

		$user_id 	= $this->session->userdata('user_id');
		$carts 		= $this->m_cart->getCartByUserId($user_id);

		$total = 0;
		$transaction_details = array();
		foreach ($carts as $cart) {
			$sub_total 	= $cart->qty * $cart->price;
			$total 		+= $sub_total;

			$transaction_details[] = (object) array(
				'product_code'	=> $cart->product_code,
				'quantity'		=> $cart->qty,
				'sub_total'		=> $sub_total
			);
		}

		$data_transaction = array(
			'document_code'		=> 'TRX',
			'user_id'			=> $user_id,
			'total'				=> $total
		);

		$insert_transaction 	= $this->m_transaction->insert_transaction($data_transaction);
		if (! $insert_transaction['status']) {
			echo json_encode(array(
				'status' => false,
				'message'	=> 'Gagal Melakukan Checkout'
			));
			exit();
		}

		$document_number 	= $insert_transaction['id'];

		foreach ($transaction_details as $transaction_detail) {
			$data_transaction_details = array(
				'document_code'	=> 'TRX',
				'document_number'	=> $document_number,
				'product_code'		=> $transaction_detail->product_code,
				'quantity'			=> $transaction_detail->quantity,
				'sub_total'			=> $transaction_detail->sub_total
			);

			if (! $this->m_transaction->insert_transaction_detail($data_transaction_details)) {
				echo json_encode(array(
					'status' => false,
					'message'	=> 'Gagal Melakukan Checkout'
				));
				exit();
			}
		}

		if (! $this->m_cart->delete(array('user_id' => $user_id))) {
			echo json_encode(array(
				'status' => false,
				'message'	=> 'Gagal Melakukan Checkout'
			));
			exit();
		}

		echo json_encode(array(
			'status'	=> true,
			'message'	=> 'Sukses melakukan checkout'
		));


	}

}