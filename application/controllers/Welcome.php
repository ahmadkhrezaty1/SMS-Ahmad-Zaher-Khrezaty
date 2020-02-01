<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('admin_helper');
		$this->load->helper('fields_helper');
		$this->load->helper('language');
	}

	public function index()
	{
		$this->load->view('template');
	}
}
