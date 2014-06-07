<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_controller extends CI_Controller {

	public function __construct() {
        parent::__construct();

    }

	public function index()
	{
		header('Location: students');
	}

	public function login()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$this->load->view('login');
		}else{
			$username = $this->input->post('username');
			$pass = $this->input->post('password');

			if($this->user_model->login($username, $pass))
			{
				$this->session->set_userdata('logat', true);
				header("Location: /") ;
			}
			else header("Location: /login");
		}
	}

	public function logout()
	{
		$this->session->set_userdata('logat', false);
		header("Location: /login") ;
	}

	public function is_loged()
	{
		if($this->session->userdata('logat'))
			return true;
		else return false;
	}

	public function error_404()
	{
		$this->load->view('templates/error_404');
	}
}
