<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		$this->load->view('auth/v_login_page');
	}

	public function act_login()
	{
		$this->load->model('m_users');

		$input = (object) $this->input->post();

		$username	= $input->username;
		$password 	= $input->password;

		$data_user 	= $this->m_users->getByUsername($username);

		if (! isset($data_user->id)) {
			redirect('auth/login');
		}

		$password_hash 	= $data_user->password;

		if (password_verify($password, $password_hash)) {
			$data = array(
				'is_logged_in'	=> TRUE,
				'user_id'		=> $data_user->id,
				'username'		=> $data_user->user
			);

			$this->session->set_userdata($data);

			redirect('home');
			exit();
		}

		redirect('auth/login');
	}

	public function register()
	{
		$this->load->view('auth/v_register_page');
	}

	public function act_register()
	{
		$this->load->model('m_users');

		$input = (object) $this->input->post();

		$username	= $input->username;
		$password 	= password_hash($input->password, PASSWORD_BCRYPT);

		$data = array(
			'user'		=> $username,
			'password'	=> $password
		);

		if ($this->m_users->insert($data)) {
			redirect('auth/login');
		}else{
			redirect('auth/register');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();

		redirect('auth/login');
	}

}