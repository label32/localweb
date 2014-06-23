<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Class_Model extends CI_Model {

	function get_classes() 
	{
		$query = $this->db->get('classes');
        return $query->result();
	}

	function get_userClasses($userid) {
		$this->db->select('classes.*');
		$this->db->from('userclasses');
		$this->db->join('classes', 'classes.id = userclasses.ClassId');
		$this->db->where('UserId',$userid);

		$query = $this->db->get();
		return $query->result();
	}

	function get_classDays($classid) {
		$query = $this->db->get_where('schedule', array('ClassId' => $classid));
		return $query->result();
	}

	function get_class_schedule($classid) 
	{
		$query = $this->db->get_where('schedule', array('ClassId' => $classid));
		return $query->result();
	}

	function get_class_prof($classid) 
	{
		$this->db->select('*');
		$this->db->from('userclasses');
		$this->db->join('users', 'users.id = userclasses.UserId');
		$this->db->where('ClassId',$classid);
		$this->db->where('Type',1);

		$query = $this->db->get();
		return $query->result();
	}

	function insert_class($data) 
    {
        $this->db->insert('classes',$data);
        return $this->db->insert_id();
    }

    function delete_class($id) 
    {
    	$this->db->delete('classes', array('Id' => $id)); 
    }

    function add_users_to_class($classid, $userids) 
    {
    	foreach ($userids as $userid) {
    		$data = array(
				'ClassId' => $classid,
				'UserId' => $userid
				);
    		$this->db->insert('userclasses',$data);
    	}
    }

    function add_class_schedule($classid, $days) 
    {
    	foreach ($days as $day) {
    		$data = array(
				'ClassId' => $classid,
				'Day' => $day
				);
    		$this->db->insert('schedule',$data);
    	}
    }

}