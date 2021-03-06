<?php 

class Datatables extends CI_Model{

	public $table;

	public $searchable = array();

	public $join = array();

	public $where = array();

	public $columns_valid = array();

	public $other_rows = array();

	public function __construct(){

		parent::__construct();

	}

	public function render_table(){

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$end = intval($this->input->get("end"));
		$length = intval($this->input->get("length"));

		foreach ($this->columns_valid as $value) {
			$this->db->select($value['select'] . ' as ' . $value['as']);
		}

		$this->db->group_start();
		$i = 0;
		foreach ($this->searchable as $col){

			if($i == 0){
	    		$this->db->like($col, $_GET['search']['value']);
			}else{
				$this->db->or_like($col, $_GET['search']['value']);
			}
			$i++;

		}

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

        foreach ($this->columns_valid as $v){
        	$sort_cols[] = $v['select'];
        }

        if(!isset($sort_cols[$col])) {
            $order = null;
        } else {
            $order = $sort_cols[$col];
        }

        if($order !=null) {
            $this->db->order_by($order, $dir);
        }

        foreach ($this->join as $v){

			$this->db->join($v[0], $v[1], $v[2]);

		}

		foreach ($this->where as $key => $value){

			$this->db->where($key, $value);

		}

		$this->db->limit($length, $start);

		$query = $this->db->get($this->table);

		$data = array();

		function sortByPosition($a, $b) {
		    return $a['position'] - $b['position'];
		}

		foreach($query->result() as $r) {

		   $d = array();
		   foreach($this->columns_valid as $v){
		   		if($v['position'] == false) continue;
		   		$as = $v['as'];
		   		$v['as'] = $r->$as;
		   		$d[] = $v;
		   }

		   foreach($this->other_rows as $row){
		   		$link = $this->get_string_between($row['as'], '{{', '}}');
		   		$row['as'] = str_replace(array($link, '{{', '}}'), array($r->$link, '', ''), $row['as']);
		   		$d[] = $row;

		   }
		   usort($d, 'sortByPosition');
		   $result = array();
		   foreach ($d as $v){
		   		$result[] = $v['as'];
		   }
		   $data[] = $result;
		}
		$result = array(
	        "draw" => $draw,
	        "recordsTotal" => $this->count_all_results(),
	        "recordsFiltered" => $this->count_all_results(),
	        "data" => $data
	    );


		echo json_encode($result);
		exit();
	}

	public function get_string_between($string, $start, $end){
	    $string = ' ' . $string;
	    $ini = strpos($string, $start);
	    if ($ini == 0) return '';
	    $ini += strlen($start);
	    $len = strpos($string, $end, $ini) - $ini;
	    return substr($string, $ini, $len);
	}


	public function count_all_results(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$end = intval($this->input->get("end"));
		$length = intval($this->input->get("length"));

		foreach ($this->columns_valid as $key => $value) {
			$this->db->select($value['select'] . ' as ' . $value['as']);
		}

		$this->db->group_start();
		$i = 0;
		foreach ($this->searchable as $col){

			if($i == 0){
	    		$this->db->like($col, $_GET['search']['value']);
			}else{
				$this->db->or_like($col, $_GET['search']['value']);
			}
			$i++;

		}

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

        foreach ($this->columns_valid as $v){
        	$sort_cols[] = $v['select'];
        }

        if(!isset($sort_cols[$col])) {
            $order = null;
        } else {
            $order = $sort_cols[$col];
        }

        if($order !=null) {
            $this->db->order_by($order, $dir);
        }

        foreach ($this->join as $v){

			$this->db->join($v[0], $v[1], $v[2]);

		}

		foreach ($this->where as $key => $value){

			$this->db->where($key, $value);

		}

		return $this->db->get($this->table)->num_rows();
	}
}