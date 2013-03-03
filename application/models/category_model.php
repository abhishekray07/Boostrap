<?php
class category_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function get_category_all() {
		
		$query = $this->db->get('category');
		return $query->result_array();
	}

	public function get_category($id) {
		$query = $this->db->get_where('category', array('id' => $id));
		return $query->row_array();
	}

	public function get_category_id($name) {
		$query = $this->db->get_where('category', array('name' => $name));
		return $query->row_array();
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