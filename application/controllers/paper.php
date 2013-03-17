<?php 
        class Paper extends CI_Controller {

    	public function __construct()
    	{
    		parent::__construct();
    		
            $this->load->helper(array('form', 'url'));
    		$this->load->model('question_model');
    		$this->load->model('paper_model');
            $this->load->model('class_model');
            $this->load->model('subject_model');
    
            $this->index = 0;
            $this->load->library('session');
    	}

        public function view($id) {   

            $this->session->set_userdata('index', $id);

            $data['paper_item'] = $this->paper_model->get_paper($id);

            $this->load->view('include/header');
            $this->load->view('paper/view', $data);
            $this->load->view('include/footer');
        }

        public function answer()
        {
            $this->load->helper('form');

            $ind = $this->session->userdata('index');
            $data['paper_item'] = $this->paper_model->get_paper($ind);
                
            $this->load->view('include/header');     
            $this->load->view('paper/answer', $data);
            $this->load->view('include/footer');
        }

    	public function create()
    	{
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('num_question', 'Num of Questions', 'required');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('subject_id', 'Subject Id', 'required');
            
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size'] = '1000';
            $config['max_width']  = '2000';
            $config['max_height']  = '2000';

            $this->load->library('upload', $config);
            
            if ($this->form_validation->run() === FALSE) {
            
                if ( ! $this->upload->display_errors("userfile1")) {
                    $error = array('error' => $this->upload->display_errors());
                }

                $this->load->view('include/header'); 
                $this->load->view('paper/create');
                $this->load->view('include/footer');
                
            } else{

                if (!$this->upload->do_upload('userfile1')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('include/header'); 
                    $this->load->view('paper/create');
                    $this->load->view('include/footer');
                } else {
                    # code...
                    $image1Data = array('upload_data' => $this->upload->data());
                    $image1 = "uploads/".$image1Data['upload_data']['file_name'];
                }

                if (!$this->upload->do_upload('userfile2')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('include/header'); 
                    $this->load->view('paper/create');
                    $this->load->view('include/footer');
                } else {
                    # code...
                    $image1Data = array('upload_data' => $this->upload->data());
                    $image2 = "uploads/".$image1Data['upload_data']['file_name'];
                }

                $this->paper_model->set_paper( array('image1' => $image1, 'image2' => $image2 ));
                $this->load->view('include/header');
                $this->load->view('paper/success');
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