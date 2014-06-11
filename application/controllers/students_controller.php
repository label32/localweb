<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once (dirname(__FILE__) . "/main_controller.php");
class Students_controller extends Main_controller {

    public function __construct() {
        parent::__construct();

        if(!$this->is_loged()){
        	header("Location: /login");
        	exit();
        }
    }

    public function all_students()
	{
		
		$data = array(
			'students' => $this->user_model->get_users(2), 
			'page_name' => "Students"
		);


		$this->load->view('templates/header');
		$this->load->view('users/students', $data);
		$this->load->view('templates/footer');
	}

	public function edit_student($id) 
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			// $profi = array('prof1','prof2', 'prof3' );

			// $data = array(
			// 	'profi' => $profi, 
			// 	'page_name' => "All students"
			// );

			// $this->load->view('templates/header', array('page_title' => "Add student"));
			// $this->load->view('students/add_student', $data);
			// $this->load->view('templates/footer');
		}
		else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// $array = array(
			// 	'Name' => $this->input->post('name'), 
			// 	);
			// print_r($this->input->post('profs'));

		} else {
			$this->load->view('templates/error_404');
		}

	}

	public function delete_student($id)
	{
		
	}
}
