<?php
class Question extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('question_model');
		$this->load->model('category_model');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Create a new question';
		$data['category'] = $this->category_model->get_category_all();

		$this->form_validation->set_rules('question', 'Question', 'required');
		$this->form_validation->set_rules('answer', 'Answer', 'required');
		$this->form_validation->set_rules('solution', 'Solution', 'required');
		$this->form_validation->set_rules('category_id', 'Category Id', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('include/header', $data);	
			$this->load->view('question/create');
			$this->load->view('include/footer');
		} else{
			$this->question_model->set_question();
			$this->load->view('include/header', $data);	
			$this->load->view('question/success');
			$this->load->view('include/footer');
		}
	}

	public function delete() {

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['questions'] = $this->question_model->get_all_questions();	

		$this->form_validation->set_rules('question', 'Question', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('include/header');	
			$this->load->view('question/delete', $data);
			$this->load->view('include/footer');
		} else{
			$this->question_model->delete_question($this->input->post('question'));
			$this->load->view('include/header');	
			$this->load->view('question/delete_success');
			$this->load->view('include/footer');
		}
	}
}