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
		
		$data['title'] = 'Create a news item';
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('include/header', $data);	
			$this->load->view('category/create');
			$this->load->view('include/footer');
			
		}
		else
		{
			$this->category_model->set_category();
			$this->load->view('include/header', $data);	
			$this->load->view('category/success');
			$this->load->view('include/footer');
		}
	}


	public function delete() {

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['category'] = $this->category_model->get_category_all();	

		$this->form_validation->set_rules('category', 'Category', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('include/header');	
			$this->load->view('category/delete', $data);
			$this->load->view('include/footer');
		} else{
			$cat_id = $this->input->post('category');
			$this->category_model->delete_category($cat_id);
			$this->question_model->delete_question_cat($cat_id);
			$this->load->view('include/header');	
			$this->load->view('category/delete_success');
			$this->load->view('include/footer');
		}
	}
}