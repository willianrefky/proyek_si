<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_m extends CI_Model {

	public function login_check($table, $where) {
		return $this->db->get_where($table, $where);
	}

}