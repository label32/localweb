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

    public function register() {
    	$data = array(
    		'Name' => $this->input->get('name'),
    		'Email' => $this->input->get('email'),
    		'Password' => $this->input->get('pass'),
    		'Type' => $this->input->get('type')
    		);

    	$userid = $this->user_model->insert_user($data);
    	$result = array(
    			'userid' => $userid
    		);
    	header('Content-Type: application/json');
		echo json_encode($result);
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

		$days = array();
		foreach ($classes as $class) {
			$class_days = $this->get_classDays2($class->Id);
			array_push($days, $class_days);
		}

		$result = array(
			'classes' => $classes,
			'days' => $days
			);

		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function get_classDays2($classid) {
		$data = $this->class_model->get_class_schedule($classid);
    	$days = array();
    	foreach ($data as $item) {
    		$day = $item->Day;
    		array_push($days, $day);
    	}
    	// $result = array(
    	// 		'days' => $days
    	// 	);
		return $days;
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

	public function get_class() {
		
		$classid = $this->input->get('classid');
		$class = $this->class_model->get_class($classid);
		$days = $this->get_classDays2($classid);
		$result = array(
				'class' => $class[0],
    			'days' => $days
    		);
		
		header('Content-Type: application/json');
		echo json_encode($result);
	}

		public function get_class2($classid) {
		$class = $this->class_model->get_class($classid);
		return $class;
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
		$days_str = $this->input->get('days');
		$days_nr = strlen($days_str);
		$days_int = $days_str;
		$days = array();

		for($i=0; $i<$days_nr; $i++) {
			$day = $days_int % 10;
			array_push($days,$day);
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
		$days_str = $this->input->get('days');
		$days_nr = strlen($days_str);
		$days_int = $days_str;
		$days = array();

		for($i=0; $i<$days_nr; $i++) {
			$day = $days_int % 10;
			array_push($days,$day);
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

	public function get_tasks() {
		$tasks = $this->task_model->get_tasks($this->input->get('userid'));
		$tasks_data = array();

		foreach ($tasks as $task) {
			$task_data = array(
				'task' => $task,
				'task_class' => $this->get_task_class($task->Id),
				'task_class_days' => $this->get_classDays2($task->ClassId)
				);
			array_push($tasks_data, $task_data);
		}

		$result = array(
			'tasks_data' => $tasks_data
			);
		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function get_task_class($taskid) {
		$classid = $this->task_model->get_task_classid($taskid)[0]->ClassId;
		$class = $this->class_model->get_class($classid)[0];
		return $class;
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

		$this->task_model->add_user_to_task($taskid, $userids);
		
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

	public function add_announcement() {
		
		$data = array(
			'Title' => $this->input->get('title'),
			'Text' => $this->input->get('text'),
			'ClassId' => $this->input->get('classid')
			);

		$announcement_id = $this->announcement_model->insert_announcement($data);

		$classid = $this->input->get('classid');
		$users = $this->class_model->get_students_in_class($classid);
		$userids = array();
		foreach ($users as $user) {
			array_push($userids, $user->Id);
		}

		$this->announcement_model->insert_ann_users($announcement_id, $userids);

		$result = array(
			'annid' => $announcement_id
			);
		header('Content-Type: application/json');
		echo json_encode($result);

	}

	public function delete_announcement() {

		$annid = $this->input->get('annid');
		$this->announcement_model->delete_ann($annid);

	}

	public function delete_user_ann() {
		$userid = $this->input->get('userid');
		$annid = $this->input->get('annid');
		$this->announcement_model->delete_user_ann($annid, $userid);
	}

	public function get_announcement_class($annid, $classid) {
		$classid = $this->task_model->get_task_classid($taskid)[0]->ClassId;
		$class = $this->class_model->get_class($classid)[0];
		return $class;
	}

	public function get_announcements() {
		$userid = $this->input->get('userid');
		$anns = $this->announcement_model->get_user_anns($userid);
		$anns_data = array();

		foreach ($anns as $ann) {
			$ann_data = array (
				'announcement' => $ann,
				'announcement_class' => $this->get_class2($ann->ClassId)[0],
				'announcement_class_days' => $this->get_classDays2($ann->ClassId)
				);
			array_push($anns_data, $ann_data);
		}

		$result = array(
				'announcements_data' => $anns_data
			);

		header('Content-Type: application/json');		
		echo json_encode($result);
	}
}