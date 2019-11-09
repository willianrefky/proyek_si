<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_m');
		$this->load->library('encryption');
	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('login/v_login');
	}


	public function login_process() 
	{

		/** Digest HTTP Authentication **/
		function http_digest_parse($userdata, $realm ="Login") {
			if ( ! empty($_SERVER['PHP_AUTH_DIGEST']))
			{

				// Decode the data the client gave us
				$default = array('nonce', 'nc', 'cnonce', 'qop', 'username', 'uri', 'response');
				preg_match_all('~(\w+)="?([^",]+)"?~', $_SERVER['PHP_AUTH_DIGEST'], $matches);
				$data = array_combine($matches[1] + $default, $matches[2]);

				// Generate the valid response
				$A1 = md5($data['username'] . ':' . $realm . ':' . $userdata[$data['username']]);
				$A2 = md5(getenv('REQUEST_METHOD') . ':' . $data['uri']);
				$valid_response = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

				// Compare with what was sent
				if ($data['response'] === $valid_response)
				{
					return true;
				}

			}

			// Failed, or haven't been prompted yet
			header('HTTP/1.1 401 Unauthorized');
			header('WWW-Authenticate: Digest realm="' . $realm . '",qop="auth",nonce="' . uniqid() . '",opaque="' . md5($realm) . '"');
			exit;
		}
		
		// $valid = false;

		// data post
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		/** Basic PHP_AUTH_USER 

		$valid = false;

		if ( !isset($_SERVER['PHP_AUTH_USER']) )
		{
			header('WWW-Authenticate: Basic realm="Login"');
			header('HTTP/1.0 401 Unauthorized');
			echo("Please enter a valid username and password");
			exit;
		}
		elseif ( ($_SERVER['PHP_AUTH_USER'] ==  $username) && ($_SERVER['PHP_AUTH_PW'] == $password) )
		{
			$valid = true;
		}
		else
		{
			echo("Please enter a valid username and password");
			exit;
		}

		if ($valid) {*/

			// Fetch some users from the database or a config file
			$userdata = array($username => $password, 'guest' => 'guest');

			http_digest_parse($userdata);

			$where = array(
				'username' => $username,
				'password' => md5($password) 
			);

			$cek = $this->login_m->login_check("user", $where)->num_rows();

			if ($cek > 0) {

				$data_session = array(
					'username' => $username,
					'status' => "login"
				);

				$this->session->set_userdata($data_session);

				redirect(base_url("dashboard"));

			} else {
				echo "<script>alert('Username dan password salah!'); </script>";
			//}
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}