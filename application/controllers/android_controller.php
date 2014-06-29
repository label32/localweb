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
		$classes = $this->class_model->get_userClasses($userid, false);
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

	public function add_offlineClass() {
		$class_data = array(
				'Name' => $this->input->get('name'),
				'Classroom' => $this->input->get('classroom'),
				'Details' => $this->input->get('details'),
				'StartTime' => $this->input->get('start_time'),
				'EndTime' => $this->input->get('end_time'),
				'Color' => $this->input->get('color'),
				'Offline' => 1
				);
		$userid = $this->input->get('userid');
		$userids = array();
		array_push($userids, $userid);
		$classid = $this->class_model->insert_class($class_data);
		$this->class_model->add_users_to_class($classid, $userids);

		// Numar a carui cifre reprezinta zilele 
		$days_int = $this->input->get('days');
		$days = array();
		while ($days_int >= 1) {
    		array_push($days, $days_int % 10);
    		$days_int = $days_int / 10;
		}
		if(!empty($days)) 
			$this->class_model->add_class_schedule($classid, $days);
		$result = array(
    			'classid' => $classid
    		);
		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function update_offlineClass() {
		
		$class_data = array(
				'Name' => $this->input->get('name'),
				'Classroom' => $this->input->get('classroom'),
				'Details' => $this->input->get('details'),
				'StartTime' => $this->input->get('start_time'),
				'EndTime' => $this->input->get('end_time'),
				'Color' => $this->input->get('color'),
				'Offline' => 1
				);
		$classid = $this->input->get('classid');

		// update class
		$this->class_model->update_class($classid, $class_data);

		// update class schedule
		$days_int = $this->input->get('days');
		$days = array();
		while ($days_int > 0) {
    		array_push($days, $days_int % 10);
    		$days_int = $days_int / 10;
		}

		if(!empty($days)) 
			$this->class_model->update_class_schedule($classid, $days);
		else
			$this->class_model->delete_class_schedule($classid);

		$result = array(
    			'result_id' => 0
    		);

		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function delete_class() {
		$this->class_model->delete_class($this->input->get('classid'));
		$result = array(
    			'result_id' => 0
    		);
		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function get_tasks($userid) {
		$result = $this->class_model->get_userClasses($userid);
		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function add_task() {
		
		$task_data = array(
				'ClassId' => $this->input->get('classid'),
				'Type' => $this->input->get('type'),
				'Deadline' => $this->input->get('deadline'),
				'Title' => $this->input->get('title'),
				'Details' => $this->input->get('details'),
				'Done' => $this->input->get('done'),
				'Offline' => 1
				);

		$userid = $this->input->get('userid');
		$userids = array();
		array_push($userids, $userid);
		$taskid = $this->task_model->insert_task($task_data);
		
		$result = array(
    			'taskid' => $taskid
    		);

		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function update_task() {

		$task_data = array(
				'ClassId' => $this->input->get('classid'),
				'Type' => $this->input->get('type'),
				'Deadline' => $this->input->get('deadline'),
				'Title' => $this->input->get('title'),
				'Details' => $this->input->get('details'),
				'Done' => $this->input->get('done'),
				'Offline' => 1
				);

		$userid = $this->input->get('userid');
		$userids = array();
		array_push($userids, $userid);

		$taskid = $this->input->get('taskid');

		$this->task_model->update_task($taskid, $task_data);
		
		$result = array(
    			'result_id' => 0
    		);

		header('Content-Type: application/json');
		echo json_encode($result);

	}

	public function delete_task() {
		$this->task_model->delete_task($this->input->get('taskid'));
		$result = array(
    			'result_id' => 0
    		);
		header('Content-Type: application/json');
		echo json_encode($result);
	}


}