<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model {

	function login($username, $pass)
	{
		$this->db->where('Email', $username);
        $this->db->where('Password', $pass);
        
        $query = $this->db->get('Users');        
        if($query->num_rows == 1)
        	return true;
        else
        	return false;
	}
}
