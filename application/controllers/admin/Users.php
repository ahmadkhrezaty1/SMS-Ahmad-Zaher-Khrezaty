<?php

class Users extends MY_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('Data_table');
		$this->load->model('Datatables');
	}

	public function users_json(){
		$this->load->view('admin/tables/users');
	}

	public function groups_json(){
		$this->load->view('admin/tables/groups');
	}

	public function index(){

		$data['title'] = _l('users');
		$this->load->view('admin/users/manage', $data);
	}

	public function groups(){

		$data['title'] = _l('groups');
		$this->load->view('admin/users/groups', $data);
	}

	public function deactivate($id = NULL)
	{
		$this->ion_auth->deactivate($id);
		$this->data['success'] = $this->session->flashdata('message') ? $this->session->flashdata('message') : '';
			redirect(admin_url('users'));
	}

}