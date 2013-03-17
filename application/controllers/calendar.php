<?php 
        class Calendar extends CI_Controller {

    	public function __construct()
    	{
    		parent::__construct();
    	}

        public function index() {   
            $this->load->view('include/header');
            $this->load->view('calendar/index');
            $this->load->view('include/footer');
        }
}