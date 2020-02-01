<?php

  $data['menu'] = [

    [
      'name' => lang('dashboard'),
      'href' => admin_url('dashboard'),
      'icon' => 'dashboard',
      'position' => 0
    ],
    [
      'name' => lang('profile'),
      'href' => admin_url('profile'),
      'icon' => 'person',
      'position' => 5
    ],
    [
      'name' => lang('label_management'),
      'href' => admin_url('label_management'),
      'icon' => 'library_books',
      'position' => 15
    ],
    [
      'collapse' => 1,
      'name' => lang('manage_users'),
      'href' => 'users',
      'icon' => 'person',
      'position' => 10,
      'links' => [
          [
            'name' => lang('users'),
            'href' => admin_url('users'),
            'title' => 'US',
            'position' => 10
          ],
          [
            'name' => lang('groups'),
            'href' => admin_url('users/groups'),
            'title' => 'GR',
            'position' => 15
          ],
      ],
    ],
    

  ];

  $this->load->view('admin/includes/menu_algorithm', $data);
