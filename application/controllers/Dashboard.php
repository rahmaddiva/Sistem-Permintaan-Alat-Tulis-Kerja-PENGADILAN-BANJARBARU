<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{

		// jika tidak mempunyai session id_user maka redirect ke halaman login
		$session = $this->session->userdata('id_user');
		if ($session == null) {
			redirect('login');
		}


		$this->load->view('templates/header.php');
		$this->load->view('templates/navbar.php');
		$this->load->view('dashboard.php');
		$this->load->view('templates/footer.php');
	}
}