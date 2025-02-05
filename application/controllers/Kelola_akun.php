<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_akun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $session = $this->session->userdata('id_user');
        if ($session == null) {
            redirect('login');
        }
        $data['title'] = "Kelola Akun";
        $data['user'] = $this->db->get('tb_user')->result_array();

        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('kelola_akun/index.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Akun";

        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('kelola_akun/tambah.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function save()
    {

        // melakukan validasi form
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_user.username]', [
            'required' => 'Username harus diisi!',
            'is_unique' => 'Username sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
            'required' => 'Password harus diisi!',
            'min_length' => 'Password minimal 6 karakter!'
        ]);
        $this->form_validation->set_rules('level', 'Level', 'required|trim', [
            'required' => 'Level harus diisi!'
        ]);
        $this->form_validation->set_rules('unit', 'Unit', 'required|trim', [
            'required' => 'Unit harus diisi!'
        ]);

        // jika validasi gagal
        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Akun";

            $this->load->view('templates/header.php');
            $this->load->view('templates/navbar.php');
            $this->load->view('kelola_akun/tambah.php', $data);
            $this->load->view('templates/footer.php');
        } else
        // jika validasi berhasil
        {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'level' => htmlspecialchars($this->input->post('level', true)),
                'unit' => htmlspecialchars($this->input->post('unit', true))
            ];

            // insert data ke database
            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data akun berhasil ditambahkan!</div>');
            redirect('kelola_akun');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit Akun";
        $data['user'] = $this->db->get_where('tb_user', ['id_user' => $id])->row_array();

        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('kelola_akun/edit.php', $data);
        $this->load->view('templates/footer.php');

    }

    public function update()
    {
        $id = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $level = $this->input->post('level');
        $unit = $this->input->post('unit');

        $data = [
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'level' => $level,
            'unit' => $unit
        ];

        $this->db->where('id_user', $id);
        $this->db->update('tb_user', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data akun berhasil diubah!</div>');
        redirect('kelola_akun');
    }

    public function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('tb_user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data akun berhasil dihapus!</div>');
        redirect('kelola_akun');
    }
}