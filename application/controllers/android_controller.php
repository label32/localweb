<?php 
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Android_controller {

	public function get_user($id) {
		 $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);    

		 header('Content-Type: application/json');
		 echo json_encode( $arr );
	}

	public function get_classes($userid) {
	}
}