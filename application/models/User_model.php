
<?php

class User_model extends CI_Model{


	public function __construct(){
		parent::__construct();
	}

	public function change_type($user_id, $type){
        $this->ion_auth->remove_from_group(array('2', '3', '4', '5', '6', '7', '8', '9', '10'), $user_id);
		$this->ion_auth->add_to_group($type, $user_id);

	}
}