<?php
class question_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function get_questions_all($category_id) {
		
		$query = $this->db->get_where('question', array('cat_id' => $category_id));
		return $query->result_array();
	}

	public function get_questions($id) {
		
		$query = $this->db->get_where('question', array('id' => $id));
		return $query->row_array();
	}

	public function set_question()
	{
		$this->load->helper('url');
		
		$data = array(
			'cat_id' => $this->input->post('category_id'),
			'question' => $this->input->post('question'),
			'answer' => $this->input->post('answer'),
			'solution' => $this->input->post('solution'),
		);
		
		return $this->db->insert('question', $data);
	}

	public function question_answer($qid) {
		$this->load->helper('url');

		$ans = $this->input->post('answer');
		$query = $this->db->get_where('question', array('id' => $qid));
		$question = $query->row_array();

		if (strcasecmp ($ans, $question['answer']) == 0) {
			return TRUE;
		} else {
			return FALSE;
		}

	}
}