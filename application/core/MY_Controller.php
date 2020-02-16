<?php

class MY_Controller extends CI_Controller{
	public $user;
	public function __construct(){
		parent::__construct();
		$this->load->helper([
			'fields_helper', 
			'html_helper', 
			'general_helper',
			'language', 
			'url', 
			'admin_helper'
		]);
		$this->load->database();
		$this->load->add_package_path(APPPATH.'third_party/ion_auth/');
		$this->load->library([
			'ion_auth', 
			'form_validation'
		]);
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('arabic_lang', 'arabic');

		if (!$this->ion_auth->is_admin())
		{
			//redirect('auth/login');
		}
		$this->user = $this->ion_auth->user($this->session->userdata('user_id'))->row();
	}
}