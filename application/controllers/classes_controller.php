<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once (dirname(__FILE__) . "/main_controller.php");
class Classes_controller extends Main_controller {

    public function __construct() {
        parent::__construct();

        if(!$this->is_loged()){
        	header("Location: /login");
        	exit();
        }
    }

    public function all_classes() 
	{
		$classes = $this->class_model->get_classes();
		$cls = array();
		foreach ($classes as $class) {
			if($class->Offline == 0) {
				$rows = $this->class_model->get_class_schedule($class->Id);
				$class_prof = $this->class_model->get_class_prof($class->Id);
				$days = "";
				$first = true;
				foreach ($rows as $row) {
					if($first) {
						$days .= $this->day_tostr($row->Day);
						$first = false;
					}
					else
						$days .= ", ".$this->day_tostr($row->Day);
				}
				array_push($cls, array(
					'class' => $class,
					'days' => $days, 
					'prof' => $class_prof[0]
					));
			}
		}

		$data = array(
			'classes' => $cls, 
			'page_name' => "Classes"
		);

		$this->load->view('templates/header');
		$this->load->view('classes/classes', $data);
		$this->load->view('templates/footer');
	}

	public function edit_class($id)
	{

	}

	public function delete_class($id)
	{
		//modal...
		$this->class_model->delete_class($id);
		header('Location: /classes');
	} 

    public function add_class()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$students = $this->user_model->get_users(2);
			$profs = $this->user_model->get_users(1);

			$data = array(
				'students' => $students,
				'profs' => $profs, 
				'page_name' => "All classes"
			);

			$this->load->view('templates/header', array('page_title' => "Add class"));
			$this->load->view('classes/add_class', $data);
			$this->load->view('templates/footer');
		}
		else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$user_ids = $this->input->post('students');
			$prof_id = $this->input->post('prof');

			if(!empty($prof_id))
				array_push($user_ids, $prof_id);

			$color_hex = $this->input->post('color');
			$color_int = hexdec($color_hex);
			
			$class_data = array(
				'Name' => $this->input->post('name'),
				'Classroom' => $this->input->post('classroom'),
				'Details' => $this->input->post('details'),
				'StartTime' => $this->input->post('start_time'),
				'EndTime' => $this->input->post('end_time'),
				'Color' => $color_int,
				'Offline' => '0'
				);
			
			$classid = $this->class_model->insert_class($class_data);
			
			$this->class_model->add_users_to_class($classid, $user_ids);

			$days = $this->input->post('days');
			if(!empty($days)) 
				$this->class_model->add_class_schedule($classid, $days);

			header('Location: /classes');

		} else {
			$this->load->view('templates/error_404');
		}
	}

	public function day_tostr($day) 
	{
		switch($day) {
			case 1: return 'Monday';
			case 2: return 'Tuesday';
			case 3: return 'Wednesday';
			case 4: return 'Thursday';
			case 5: return 'Friday';
			case 6: return 'Saturday';
			case 7: return 'Sunday';
		}
	}
}
