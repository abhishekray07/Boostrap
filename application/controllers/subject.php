<?php
class Subject extends CI_Controller {

	public function __construct()	{
		parent::__construct();

		$this->load->model('class_model');
		$this->load->model('subject_model');
		$this->load->model('paper_model');

		$this->load->library('session');
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

	public function selectClass() {

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['claass'] = $this->class_model->get_all_class_val();	

		$this->form_validation->set_rules('claass', 'Class', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('include/header');	
			$this->load->view('subject/selectClass', $data);
			$this->load->view('include/footer');
		} else{
			$id = $this->input->post('claass');
			$this->session->set_userdata('classIndex', $id);

			$data['subjects'] = $this->subject_model->get_subject_class($id);
			
			$this->load->view('include/header');	
			$this->load->view('subject/delete', $data);
			$this->load->view('include/footer');
		}
	}


	public function delete() {

		$this->load->helper('form');
		$this->load->library('form_validation');	

		$id = $this->session->userdata('classIndex');
		$data['subjects'] = $this->subject_model->get_subject_class($id);

		$this->form_validation->set_rules('subject', 'Subject', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('include/header');	
			$this->load->view('subject/delete', $data);
			$this->load->view('include/footer');
		} else{
			$id = $this->input->post('subject');
			$this->subject_model->delete_subject($id);

			$this->load->view('include/header');	
			$this->load->view('subject/delete_success');
			$this->load->view('include/footer');
		}
	}
}