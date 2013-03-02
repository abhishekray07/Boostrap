<?php
class Category extends CI_Controller {

	public function __construct()	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('question_model');

		$this->index = 0;
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('category_name', 'Name', 'required');

		$data['category'] = $this->category_model->get_category_all();
		$data['title'] = 'Category Listing';

		if ($this->form_validation->run() === FALSE){

			$this->session->set_userdata('index', 0);
	
			$this->load->view('include/header');
			$this->load->view('category/index', $data);
			$this->load->view('include/footer');	
		}
		else{
			$selectVal = !empty($_POST['category_name']) ? $_POST['category_name'] : null;

			$data['category_item'] = $this->category_model->get_category_id($selectVal);
			$data['questions'] = $this->question_model->get_questions_all($data['category_item']['id']);
			$this->questions = $data['questions'];

			if (count($this->questions) == 0) {
				$this->load->view('include/header', $data);	
				$this->load->view('category/noquestions');
				$this->load->view('include/footer');

			} else {

				$data['question'] = $this->questions[$this->index];
				$this->session->set_userdata('cat', $data['category_item']['id']);
				$data['title'] = 'Category Information';

				$this->load->view('include/header', $data);
				$this->load->view('category/view', $data);
				$this->load->view('include/footer');
			}
		}
	}


	public function view($id)
	{
		$data['category_item'] = $this->category_model->get_category($id);
		$data['title'] = 'Category Information';

		$this->load->view('include/header', $data);
		$this->load->view('category/view', $data);
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

	public function answer()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('answer', 'Answer', 'required');
		$data['title'] = "TRUE";

		if ($this->form_validation->run() === TRUE) {
			$ind = $this->session->userdata('index');
			$cat = $this->session->userdata('cat');
			$qns = $this->question_model->get_questions_all($cat);
			$this->question = $qns[$ind];

			$ind++;

			$this->session->set_userdata('index', $ind);

			$ans = $this->input->post('answer');

			if (strcasecmp ($ans, $this->question['answer']) == 0) {
				$data['answer'] = "TRUE";
			} else {
				$data['answer'] = "FALSE";
			}

			$data['solution'] = $this->question['solution'];

			$this->load->view('include/header', $data);	
			$this->load->view('category/answer', $data);
			$this->load->view('include/footer');
		}
	}

	public function next()
	{	
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('answer', 'Answer', 'required');

		$catId = $this->session->userdata('cat');
		$ind = $this->session->userdata('index');

		$data['category_item'] = $this->category_model->get_category($catId);
		$data['questions'] = $this->question_model->get_questions_all($data['category_item']['id']);
		
		$this->questions = array();
		$this->questions = $data['questions'];

		if (count($this->questions) > $ind) {
			$data['question'] = $this->questions[$ind];

			$this->session->set_userdata('cat', $data['category_item']['id']);

			$this->load->view('include/header', $data);
			$this->load->view('category/view', $data);
			$this->load->view('include/footer');
		} else {
			$this->load->view('include/header', $data);	
			$this->load->view('category/complete');
			$this->load->view('include/footer');
		}
	}
}