<?php
class paper_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function get_papers_subject($subjectId) {
		$query = $this->db->get_where('paper', array('subject_id' => $subjectId));
		return $query->result_array();
	}

	public function get_paper($id) {
		
		$query = $this->db->get_where('paper', array('id' => $id));
		return $query->row_array();
	}

	public function set_paper($inputData)
	{
		$this->load->helper('url');
		
		$data = array(
			'num_question' => $this->input->post('num_question'),
			'name' => $this->input->post('name'),
			'question_path' => $inputData['image1'],
			'sol_path' => $inputData['image2'],
			'subject_id' => $this->input->post('subject_id'),
		);
		
		return $this->db->insert('paper', $data);
	}

	public function delete_category($cat_id) {
		$this->db->delete('category', array('id' => $cat_id)); 
	}


}