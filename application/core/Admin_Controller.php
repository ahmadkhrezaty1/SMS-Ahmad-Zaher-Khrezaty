<?php

class Admin_Controller extends MY_Controller{
	public $user;
		if (!$this->ion_auth->is_admin())
		{
			redirect('auth/login');
		}
		$this->user = $this->ion_auth->user($this->session->userdata('user_id'))->row();
	}
}