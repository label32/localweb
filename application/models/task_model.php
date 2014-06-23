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
}