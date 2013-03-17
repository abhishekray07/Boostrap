<?php
class subject_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function get_subject_id($id) {
		$query = $this->db->get_where('subject', array('id' => $id));
		return $query->row_array();
	}

	public function get_subject_class($classId) {
		$query = $this->db->get_where('subject', array('class_id' => $classId));
		return $query->result_array();
	}

	public function set_category()
	{
		$this->load->helper('url');
		
		$data = array(
			'name' => $this->input->post('name'),
		);
		
		return $this->db->insert('category', $data);
	}

	public function delete_category($cat_id) {
		$this->db->delete('category', array('id' => $cat_id)); 
	}


}