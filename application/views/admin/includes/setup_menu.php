<?php

  $data['menu'] = [

    [
      'name' => _l('dashboard'),
      'href' => admin_url('dashboard'),
      'icon' => 'dashboard',
      'position' => 0
    ],
    [
      'name' => _l('label_management'),
      'href' => admin_url('label_management'),
      'icon' => 'library_books',
      'position' => 15
    ],
    [
      'collapse' => 1,
      'name' => _l('manage_users'),
      'href' => 'users',
      'icon' => 'person',
      'position' => 10,
      'links' => [
          [
            'name' => _l('users'),
            'href' => admin_url('users'),
            'title' => 'US',
            'position' => 10
          ],
          [
            'name' => _l('groups'),
            'href' => admin_url('users/groups'),
            'title' => 'GR',
            'position' => 15
          ],
      ],
    ],
    

  ];

  $this->load->view('admin/includes/menu_algorithm', $data);
