<?php
class class_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function get_all_class_val() {
		
		$query = $this->db->get('class');
		return $query->result_array();
	}

	public function get_claass_id($id) {
		$query = $this->db->get_where('class', array('id' => $id));
		return $query->row_array();
	}

	public function get_class_cat($catId) {
		$query = $this->db->get_where('class', array('cat_id' => $catId));
		return $query->result_array();
	}

	public function set_class_val()
	{
		$this->load->helper('url');
		
		$data = array(
			'cat_id' => $this->input->post('category_id'),
			'name' => $this->input->post('className'),
		);
		
		return $this->db->insert('class', $data);
	}

	public function delete_class_val($classId) {
		$this->db->delete('class', array('id' => $classId)); 
	}


}