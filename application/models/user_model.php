<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model {

        function login($email, $pass)
	{
		$this->db->where('Email', $email);
                $this->db->where('Password', $pass);
                
                $query = $this->db->get('Users');        
                if($query->num_rows == 1)
                	return true;
                else
                	return false;
	}

        function login2($email, $pass) {
                $this->db->where('Email', $email);
                $this->db->where('Password', $pass);
                
                $query = $this->db->get('Users');        
                if($query->num_rows == 1) {
                        return $query->result();
                } 
        }

        function get_users($type) 
        {
                $query = $this->db->get_where('users', array('type' => $type));
                return $query->result();
        }


        function get_user($id, $type)
        {              
                $this->db->select('*');
                $this->db->from('users');
                $this->db->where('Id',$id);
                $this->db->where('Type',$type);

                $query = $this->db->get();
                return $query->result();
        }

        function get_user2($id) {
                $this->db->select('*');
                $this->db->from('users');
                $this->db->where('Id',$id);
                $query = $this->db->get();
                return $query->result();                
        }

        function insert_user($data) 
        {
                $this->db->insert('users',$data);
                return $this->db->insert_id();
        }

        function update_user($id, $data) 
        {
                $this->db->where('id', $id);
                $this->db->update('users', $data); 
        }
}
