<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {

        $session = $this->session->userdata('id_user');
        if ($session == null) {
            redirect('login');
        }
        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('user.php');
        $this->load->view('templates/footer.php');
    }

}