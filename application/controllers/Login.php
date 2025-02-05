<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'Login Page';
        $this->load->view('login.php', $data);
    }

    function login()
    {

        // Ambil input dari form
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Cari pengguna berdasarkan username
        $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

        // Periksa apakah pengguna ditemukan
        if ($user) {
            // Periksa apakah password cocok dengan password di database
            if (password_verify($password, $user['password'])) {
                // Buat data sesi (session)
                $data = [
                    'username' => $user['username'],
                    'level' => $user['level'],
                    'nama' => $user['nama'],
                    'unit' => $user['unit'],
                    'id_user' => $user['id_user']
                ];
                $this->session->set_userdata($data);

                // Redirect ke halaman sesuai dengan tingkat akses
                if ($user['level'] == 1) {
                    redirect('dashboard');
                } else {
                    redirect('user');
                }
            } else {
                // Password tidak cocok, tampilkan pesan kesalahan
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                redirect('login');
            }
        } else {
            // Pengguna tidak ditemukan, tampilkan pesan kesalahan
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Salah!</div>');
            redirect('login');
        }
    }



    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}