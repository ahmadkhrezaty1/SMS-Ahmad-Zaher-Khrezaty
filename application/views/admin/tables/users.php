<?php
	$table = 'users';

	$num_rows = $this->db->get($table)->num_rows();

	$draw = intval($this->input->get("draw"));
	$start = intval($this->input->get("start"));
	$end = intval($this->input->get("end"));
	$length = intval($this->input->get("length"));

	$this->db->group_start();

    		$this->db->like('users.id', $_GET['search']['value']);
		
			$this->db->or_like('users.first_name', $_GET['search']['value']);

			$this->db->or_like('users.last_name', $_GET['search']['value']);

			$this->db->or_like('users.email', $_GET['search']['value']);
		
	$this->db->group_end();

	$order = $this->input->get("order");

    $col = 0;
    $dir = "";
    if(!empty($order)) {
        foreach($order as $o) {
            $col = $o['column'];
            $dir= $o['dir'];
        }
    }

    if($dir != "asc" && $dir != "desc") {
        $dir = "asc";
    }

    $sort_cols = array();

    $cols = ['', 'users.first_name', 'users.email'];

    foreach ($cols as $v){
    	$sort_cols[] = $v;
    }

    if(!isset($sort_cols[$col])) {
        $order = null;
    } else {
        $order = $sort_cols[$col];
    }

    if($order !=null) {
        $this->db->order_by($order, $dir);
    }

    // Joines here

    // Wheres here

    $this->db->limit($length, $start);

    $query = $this->db->get($table);

    $data = array();

    foreach($query->result() as $r) {

	   $d = array();
	   if($r->avatar != ''){
	   	$avatar = '<div class="avatar avatar-sm rounded-circle img-circle" style="width:100px; height:100px;overflow: hidden;">
                                <img src="'.base_url().$r->avatar.'" alt="" style="max-width: 100px;">
                            </div>';
	   }else{
	   	$avatar ='<div class="avatar avatar-sm rounded-circle img-circle" style="width:100px; height:100px;overflow: hidden;">
                                <img src="'. base_url().'assets1/img/faces/default-avatar.jpg'.'" alt="" style="max-width: 100px;">
                            </div>';
	   }
	   $d[] = $avatar;
	   $d[] = '<a class ="text-info" href="'.admin_url("profile/edit_user/".$r->id).'">'.$r->first_name . ' ' . $r->last_name.'</a>';
	   $d[] = '<small>'.$r->email.'</small>';
	   $d[] = '<a href="'.admin_url("profile/edit_user/".$r->id).'" type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs" data-original-title="Edit Task">
                      <i class="material-icons">edit</i>
                    <div class="ripple-container"></div></a>
                    <a type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs" data-original-title="Remove" onclick="deactive_json('.$r->id.')">
                      <i class="material-icons">close</i>
                    </a>';
	   
	   $data[] = $d;
	}

	$result = array(
	        "draw" => $draw,
	        "recordsTotal" => $num_rows,
	        "recordsFiltered" => $num_rows,
	        "data" => $data
	);
	echo json_encode($result);
	exit();