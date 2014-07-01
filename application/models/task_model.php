<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task_Model extends CI_Model {

	function get_tasks($userid) {
		$this->db->select('tasks.*');
		$this->db->from('tasksusers');
		$this->db->join('tasks', 'tasks.id = tasksusers.TaskId');
		$this->db->where('UserId',$userid);

		$query = $this->db->get();
		return $query->result();
	}

	function insert_task($data) 
    {
        $this->db->insert('tasks',$data);
        return $this->db->insert_id();
    }

    function delete_task($id) 
    {
    	$this->db->delete('tasks', array('Id' => $id)); 
    }

    function update_task($taskid, $task) 
    {
    	$this->db->where('id', $taskid);
    	$this->db->update('tasks', $task);
    }

    function add_user_to_task($taskid, $userids) 
    {
    	foreach ($userids as $userid) {
    		$data = array(
				'TaskId' => $taskid,
				'UserId' => $userid
				);
    		$this->db->insert('tasksusers',$data);
    	}
    }

    function add_class_to_task($taskid, $classid) 
    {
		$data = array(
			'TaskId' => $taskid,
			'ClassId' => $classid
			);
		$this->db->insert('taskclasses',$data);
    }

    function get_task_classid($taskid) 
    {
    	$this->db->select('ClassId');
    	$this->db->from('tasks');
    	$this->db->where('Id', $taskid);
    	$query = $this->db->get();
    	return $query->result();
    }	
}