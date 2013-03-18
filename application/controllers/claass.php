<?php
class Claass extends CI_Controller {

	public function __construct()	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('class_model');
		$this->load->model('subject_model');

	}


	public function view($id)
	{	
		$data['class_item'] = $this->class_model->get_claass_id($id);
		$data['subject_items'] = $this->subject_model->get_subject_class($id);

		$this->load->view('include/header');
		$this->load->view('class/view', $data);
		$this->load->view('include/footer');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['category'] = $this->category_model->get_category_all();

		$this->form_validation->set_rules('className', 'Class Name', 'required');
		$this->form_validation->set_rules('category_id', 'Category Id', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('include/header');	
			$this->load->view('class/create', $data);
			$this->load->view('include/footer');
		} else{
			$this->class_model->set_class_val();
			$this->load->view('include/header', $data);	
			$this->load->view('class/success');
			$this->load->view('include/footer');
		}
	}


	public function delete() {

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['claass'] = $this->class_model->get_all_class_val();	

		$this->form_validation->set_rules('claass', 'Class', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('include/header');	
			$this->load->view('class/delete', $data);
			$this->load->view('include/footer');
		} else{
			$id = $this->input->post('claass');
			$this->class_model->delete_class_val($id);
			$this->load->view('include/header');	
			$this->load->view('class/delete_success');
			$this->load->view('include/footer');
		}
	}
}