<?php
class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('question_model');
		$this->load->model('category_model');
	}

	public function index()
	{
		
		$this->load->view('include/header');
		$this->load->view('admin/index');
		$this->load->view('include/footer');
	}


}
