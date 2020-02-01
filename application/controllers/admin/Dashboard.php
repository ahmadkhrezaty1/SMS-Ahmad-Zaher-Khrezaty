<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function index()
	{
		
		$data['title'] = lang('dashboard');
		$data['user'] = $this->user;
		$this->load->view('template', $data);
	}
}
