<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once (dirname(__FILE__) . "/main_controller.php");
class Profs_controller extends Main_controller {

    public function __construct() {
        parent::__construct();

        if(!$this->is_loged()){
        	header("Location: /login");
        	exit();
        }
    }

    public function all_profs()
	{
		$data = array(
            'profs' => $this->user_model->get_users(1), 
            'page_name' => "Professors"
        );


        $this->load->view('templates/header');
        $this->load->view('users/profs', $data);
        $this->load->view('templates/footer');
	}

    public function edit_prof($id) 
    {

    }

    public function delete_prof($id)
    {
        $this->user_model->delete_user($id);
        header('Location: /profs');
    }
}
