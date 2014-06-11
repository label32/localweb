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

    public function add_user($type) 
    {
    	if($type != 'student' && $type !='professor') {
    	 	$this->load->view('templates/error_404');
    	 	return 0;
    	}

    	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$this->load->view('templates/header', array('page_title' => "Add student"));
			$this->load->view('users/add_user', array('type'=>$type));
			$this->load->view('templates/footer');
		}
		else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			
			$data = array(
				'Name' => $this->input->post('name'),
				'Email' => $this->input->post('email'), 
				'Password' => md5($this->input->post('password')),
				'Type' => $type=='professor'?1:2
				);

			$this->user_model->insert_user($data);
			$type=='professor'?header('Location: /profs'):header('Location: /');

		} else {
			$this->load->view('templates/error_404');
		}    	
    }

    public function edit_user($id, $type) 
    {

    	if($type != 'student' && $type !='professor') {
    	 	$this->load->view('templates/error_404');
    	 	return 0;
    	}

    	if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    		$result = $this->user_model->get_user($id, $type=='professor'?1:2);

    		$data = array(
    			'type' => $type,
    			'user' => $result[0]
    			);

			$this->load->view('templates/header', array('page_title' => "Edit user"));
			$this->load->view('users/edit_user', $data);
			$this->load->view('templates/footer');
		}
		else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			
			$data = array(
				'Name' => $this->input->post('name'),
				'Email' => $this->input->post('email'), 
				'Password' => md5($this->input->post('password')),
				'Type' => $type=='professor'?1:2
				);

			$this->user_model->update_user($id, $data);
			$type=='professor'?header('Location: /profs'):header('Location: /');

		} else {
			$this->load->view('templates/error_404');
		}    	
    }		
}
