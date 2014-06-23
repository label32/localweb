<?php 
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Android_controller extends CI_Controller {

	public function __construct() {
        parent::__construct();

    }

    public function login() {
    	$email = $this->input->get('email');
    	$pass = $this->input->get('pass');
     	$result = $this->user_model->login2($email, $pass);
     	header('Content-Type: application/json');
		echo json_encode($result[0]);
    }

    public function test($classid) {
    	$data = $this->class_model->get_class_schedule($classid);
    	$days = array();
    	foreach ($data as $item) {
    		$day = $item->Day;
    		array_push($days, $day);
    	}
    	$result = array(
    			'days' => $days
    		);

    	header('Content-Type: application/json');
		echo json_encode($result);
    }

	public function get_user() {
		 $id = $this->input->get('id');
		 $result = $this->user_model->get_user2($id);
		 $user = $result[0];
		 header('Content-Type: application/json');
		 echo json_encode( $user );
	}

	public function get_userClasses() {
		$userid = $this->input->get('userid');
		$classes = $this->class_model->get_userClasses($userid);
		$result = array(
			'classes' => $classes
			);
		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function get_classDays() {
		$classid = $this->input->get('classid');
		$data = $this->class_model->get_class_schedule($classid);
    	$days = array();
    	foreach ($data as $item) {
    		$day = $item->Day;
    		array_push($days, $day);
    	}
    	$result = array(
    			'days' => $days
    		);

    	header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function get_tasks($userid) {
		$result = $this->class_model->get_userClasses($userid);
		header('Content-Type: application/json');
		echo json_encode($result);
	}


}