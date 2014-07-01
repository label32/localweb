<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Announcement_Model extends CI_Model {

	function insert_announcement($data) 
    {
        $this->db->insert('announcements',$data);
        return $this->db->insert_id();
    }

    function insert_ann_users($annid, $userids) {
    	foreach ($userids as $userid) {
    		$data = array(
				'AnnId' => $annid,
				'UserId' => $userid
				);
    		$this->db->insert('annusers',$data);
    	}
    }

    function delete_ann($annid) {
    	$this->db->delete('announcements', array('Id' => $annid)); 
    }

    function delete_user_ann($annid, $userid) {
    	$this->db->delete('annusers', array('UserId' => $userid, 'ClassId' => $classid));
    }

    function get_user_anns($userid) {
    	$this->db->select('announcements.*');
		$this->db->from('annusers');
		$this->db->join('announcements', 'announcements.id = annusers.AnnId');
		$this->db->where('UserId',$userid);

		$query = $this->db->get();
		echo json_encode($query);
		return $query->result();
    }

}