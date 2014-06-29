<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task_Model extends CI_Model {

	function get_tasks($userid) {
		$this->db->select('tasks.*');
		$this->db->from('tasksusers');
		$this->db->join('users', 'users.id = taskusers.ClassId');
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
}