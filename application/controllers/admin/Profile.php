<?php

class Profile extends MY_Controller{

	
	public function edit_user($id)
	{
		$this->data['title'] = _l('profile');
		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('auth', 'refresh');
		}
		$user = $this->ion_auth->user($id)->row();
		$groups = $this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();
			
		//USAGE NOTE - you can do more complicated queries like this
		//$groups = $this->ion_auth->where(['field' => 'value'])->groups()->result_array();
	
		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('first_name'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'trim|required');
		$this->form_validation->set_rules('username', $this->lang->line('username'), 'trim|required');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'trim|numeric|exact_length[10]');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'trim');
		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}
			// update the password if it was posted
			if (!empty($this->input->post('password')))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			
			if ($this->form_validation->run() === TRUE)
			{
				$data = [
					'email' => $this->input->post('email'),
					'default_language' => $this->input->post('default_language'),
					'dir' => $this->input->post('dir'),
					'username' => $this->input->post('username'),
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'company' => $this->input->post('company'),
					'phone' => $this->input->post('phone'),
					'address' => $this->input->post('address'),
					'country' => $this->input->post('country'),
					'city' => $this->input->post('city'),
				];

				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}
				// Upload Avatar
				if (!empty($_FILES['avatar']['name'])) {
                    $val = $this->ion_auth->uploadImage('avatar', $id);
                    $val == TRUE || redirect('admin/profile/edit_user/'.$id);
                    if(!empty($val['path'])){
                    	$data['avatar'] = $val['path'];
                    }else{
                    	$data['avatar'] = null;
                    }
                }
                if($this->input->post('without_photo') == 'yes'){
                	$data['avatar'] = null;
                	deleteDirectory("uploads/faces/$id");
                }
				// check to see if we are updating the user
				if ($this->ion_auth->update($user->id, $data))
				{
					// redirect them back to the admin page if admin, or to the base url if non admin

					if ($this->ion_auth->is_admin()){
		

						if(!empty($this->input->post('is_admin'))){
							if(!$this->ion_auth->is_admin($id)){
								$this->ion_auth->add_to_group(1, $id);
							}
						}else{
							$this->ion_auth->remove_from_group(1, $id);
						}

						if(!empty($this->input->post('user_type'))){

							$user_type = $this->input->post('user_type');
							
					        $this->ion_auth->remove_from_group(array('2', '3', '4', '5', '6', '7', '8', '9', '10'), $id);
							$this->ion_auth->add_to_group($user_type, $id);
						}
					}


					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect(admin_url('profile/edit_user/'.$id));
				}
				else
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					redirect(admin_url('profile/edit_user/'.$id));
				}
			}
		}
		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();
		// set the flash data error message if there is one
		$this->data['warning'] = validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : '');
		$this->data['success'] = $this->session->flashdata('message') ? $this->session->flashdata('message') : '';
		// pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;
		$this->data['first_name'] = [
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
		];
		$this->data['last_name'] = [
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		];
		$this->data['company'] = [
			'name'  => 'company',
			'id'    => 'company',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('company', $user->company),
		];
		$this->data['phone'] = [
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone),
		];
		$this->data['country'] = [
			'name'  => 'country',
			'id'    => 'country',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('country', $user->phone),
		];
		$this->data['city'] = [
			'name'  => 'city',
			'id'    => 'city',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('city', $user->phone),
		];
		$this->data['address'] = [
			'name'  => 'address',
			'id'    => 'address',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('address', $user->address),
		];
		$this->data['password'] = [
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password'
		];
		$this->data['password_confirm'] = [
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password'
		];
		$this->_render_page('admin/profile/edit_user', $this->data);
	}

	
	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);
		return [$key => $value];
	}
	/**
	 * @return bool Whether the posted CSRF token matches
	 */
	public function _valid_csrf_nonce(){
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
			return FALSE;
	}
	/**
	 * @param string     $view
	 * @param array|null $data
	 * @param bool       $returnhtml
	 *
	 * @return mixed
	 */
	public function _render_page($view, $data = NULL, $returnhtml = FALSE)//I think this makes more sense
	{
		$viewdata = (empty($data)) ? $this->data : $data;
		$view_html = $this->load->view($view, $viewdata, $returnhtml);
		// This will return html on 3rd argument being true
		if ($returnhtml)
		{
			return $view_html;
		}
	}
	public function redirectUser(){
		if ($this->ion_auth->is_admin()){
			redirect('auth', 'refresh');
		}
		redirect('/', 'refresh');
	}
}