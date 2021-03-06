<?php

	$dt = new Datatables();

	$dt->table = 'groups';

	$dt->searchable = array(
		'id',
		'name',
		'description',
	);

	$dt->columns_valid = array(
	    "id" =>    "groups.id", 
	    "name" =>    "groups.name", 
	    "description" =>    "groups.description"
    );

    $dt->other_rows = array(
    	'<a  href="'.admin_url("profile/edit_user/").'{{id}}" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i></a><a onclick="deactive_json({{id}})" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>'
    );

    $dt->where = array(
    	// 'users.active=' => 0
    );

    $dt->join = array(
    	// array('users_groups', 'users_groups.user_id=users.id', 'inner'),
    );

	$dt->render_table();