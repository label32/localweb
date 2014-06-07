<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once (dirname(__FILE__) . "/main_controller.php");
class Pages_controller extends Main_controller {

    public function __construct() {
        parent::__construct();

        if(!$this->is_loged()){
        	header("Location: /login");
        	exit();
        }
    }


	public function all_students()
	{

		//scoti studentii din BD intr-un array:

		$studenti = array(
			array('id' => 1 ,'nume' => 'ion', 'email' => 'ion@ion.com', 'varsta' => 22 ),
			array('id' => 2 ,'nume' => 'dorin', 'email' => 'ion@ion.com', 'varsta' => 22 ),
			array('id' => 3 ,'nume' => 'pidorin', 'email' => 'ion@ion.com', 'varsta' => 22 ),
			array('id' => 4 ,'nume' => 'cep', 'email' => 'ion@ion.com', 'varsta' => 22 ),
			array('id' => 5 ,'nume' => 'ceporin', 'email' => 'ion@ion.com', 'varsta' => 22 ),
			array('id' => 6 ,'nume' => 'ion', 'email' => 'ion@ion.com', 'varsta' => 22 ),
			array('id' => 7 ,'nume' => 'ion', 'email' => 'ion@ion.com', 'varsta' => 22 ) 
		);

		//alte date care le trimiti la view: 

		$data = array(
			'studenti' => $studenti, 
			'page_name' => "Toti studentii"
		);



		$this->load->view('templates/header');
		$this->load->view('students/students', $data);
		$this->load->view('templates/footer');
	}

	public function add_student()
	{

		$profi = array('prof1','prof2', 'prof3' );

		$data = array(
			'profi' => $profi, 
			'page_name' => "Toti studentii"
		);

		$this->load->view('templates/header', array('page_title' => "Add student"));
		$this->load->view('students/add_student', $data);
		$this->load->view('templates/footer');
	}

	public function all_profs()
	{
		$this->load->view('templates/header');
		$this->load->view('profs/profs');
		$this->load->view('templates/footer');
	}

	public function all_materii() // :))
	{
		$this->load->view('templates/header');
		$this->load->view('materii/materii');
		$this->load->view('templates/footer');
	}


	
}
