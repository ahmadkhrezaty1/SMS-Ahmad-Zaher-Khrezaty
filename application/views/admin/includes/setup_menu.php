<?php

  $data['menu'] = [

    [
      'name' => _l('dashboard'),
      'href' => admin_url('dashboard'),
      'icon' => 'dashboard',
      'permission' => [1],
      'position' => 0
    ],
    [
      'name' => _l('label_management'),
      'href' => admin_url('label_management'),
      'icon' => 'library_books',
      'permission' => [1, 7],
      'position' => 15
    ],
    [
      'collapse' => 1,
      'name' => _l('manage_users'),
      'href' => 'users',
      'icon' => 'person',
      'permission' => [],
      'position' => 10,
      'links' => [
          [
            'name' => _l('users'),
            'href' => admin_url('users'),
            'title' => 'US',
            'permission' => [],
            'position' => 10
          ],
      ],
    ],
    

  ];

  $this->load->view('admin/includes/menu_algorithm', $data);
