<?php
class Subject extends CI_Controller {

	public function __construct()	{
		parent::__construct();

		$this->load->model('class_model');
		$this->load->model('subject_model');
		$this->load->model('paper_model');
	}


	public function view($id)
	{	
		$data['subject_item'] = $this->subject_model->get_subject_id($id);
		$data['paper_items'] = $this->paper_model->get_papers_subject($id);

		$this->load->view('include/header');
		$this->load->view('subject/view', $data);
		$this->load->view('include/footer');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['claass'] = $this->class_model->get_all_class_val();

		$this->form_validation->set_rules('subjectName', 'Subject Name', 'required');
		$this->form_validation->set_rules('class_id', 'Class', 'required');

		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('include/header', $data);	
			$this->load->view('subject/create');
			$this->load->view('include/footer');
			
		}
		else
		{
			$this->subject_model->set_subject();
			$this->load->view('include/header', $data);	
			$this->load->view('subject/success');
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