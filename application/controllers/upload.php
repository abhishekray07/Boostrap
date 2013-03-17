<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('upload/upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|pdf';
		$config['max_size']	= '1000';
		$config['max_width']  = '2000';
		$config['max_height']  = '2000';

		$this->load->library('upload');

		// if ( ! $this->upload->do_upload())
		// {
		// 	$error = array('error' => $this->upload->display_errors());

		// 	$this->load->view('upload/upload_form', $error);
		// }
		// else
		// {
		// 	$data = array('upload_data' => $this->upload->data());

		// 	$this->load->view('upload/upload_success', $data);
		// }

		foreach ($_FILES as $key => $value)
            {


                if (!empty($key['name']))
                {


                    $this->upload->initialize($config);
                    echo "key = ".$key;
                    if (!$this->upload->do_upload($key))
                    {

                        $error = array('error' => $this->upload->display_errors());

						$this->load->view('upload/upload_form', $error);

                    }
                    else
                    {
                         // Code After Files Upload Success GOES HERE
                    	$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload/upload_success', $data);
                    }
                }
            }
	}
}
?>