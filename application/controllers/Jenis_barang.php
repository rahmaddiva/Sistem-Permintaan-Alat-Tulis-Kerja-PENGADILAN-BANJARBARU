<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // menggunakan form validation untuk validasi inputan
        $this->load->library('form_validation');
    }

    public function index()
    {
        $session = $this->session->userdata('id_user');
        if ($session == null) {
            redirect('login');
        }

        $data['title'] = 'Jenis Barang';
        $data['jenis_barang'] = $this->db->get('tb_jenis_barang')->result_array();

        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('jenis_barang/index.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function tambah()
    {
        // menggunakan form validation untuk validasi inputan di modal tambah
        $this->form_validation->set_rules(
            'jenis_barang',
            'Jenis Barang',
            'required|trim'
            ,
            [
                'required' => '*Jenis Barang Harus Diisi'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = [
                'jenis_barang' => $this->input->post('jenis_barang')
            ];

            $this->db->insert('tb_jenis_barang', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="feather icon-check-circle mr-2"></i>Data Jenis Barang Berhasil Ditambahkan</div>');
            redirect('jenis_barang');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Jenis Barang';
        $data['jenis_barang'] = $this->db->get_where('tb_jenis_barang', ['id_jenis_barang' => $id])->result_array();

        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('jenis_barang/edit.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function edit_save()
    {
        $id = $this->input->post('id_jenis_barang');
        $jenis_barang = $this->input->post('jenis_barang');

        $data = [
            'jenis_barang' => $jenis_barang
        ];

        $this->db->where('id_jenis_barang', $id);
        $this->db->update('tb_jenis_barang', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert"><i class="feather icon-check-circle mr-2"></i>Data Jenis Barang Berhasil Diubah</div>');
        redirect('jenis_barang');
    }

    public function hapus($id)
    {
        $this->db->where('id_jenis_barang', $id);
        $this->db->delete('tb_jenis_barang');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="feather icon-check-circle mr-2"></i>Data Jenis Barang Berhasil Dihapus</div>');
        redirect('jenis_barang');
    }
}