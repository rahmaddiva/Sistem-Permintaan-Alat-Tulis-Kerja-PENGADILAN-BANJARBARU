<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
{

    public function index()
    {

        $session = $this->session->userdata('id_user');
        if ($session == null) {
            redirect('login');
        }
        $data['title'] = 'Satuan Barang';
        $data['satuan'] = $this->db->get('tb_satuan')->result_array();

        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('satuan/index.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function tambah()
    {
        $this->form_validation->set_rules(
            'nama_satuan',
            'Nama_satuan',
            'required|trim'
            ,
            ['required' => 'Nama satuan harus diisi!']
        );

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = [
                'nama_satuan' => $this->input->post('nama_satuan')
            ];

            $this->db->insert('tb_satuan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check-circle"></i> Data satuan berhasil ditambahkan!</div>');
            redirect('satuan');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Satuan Barang';
        $data['satuan'] = $this->db->get_where('tb_satuan', ['id_satuan' => $id])->result_array();

        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('satuan/edit.php', $data);
        $this->load->view('templates/footer.php');

    }

    public function edit_save()
    {
        $this->form_validation->set_rules(
            'nama_satuan',
            'Nama_satuan',
            'required|trim'
            ,
            ['required' => 'Nama satuan harus diisi!']
        );

        if ($this->form_validation->run() == false) {
            $this->edit($this->input->post('id_satuan'));
        } else {
            $data = [
                'nama_satuan' => $this->input->post('nama_satuan')
            ];

            $this->db->where('id_satuan', $this->input->post('id_satuan'));
            $this->db->update('tb_satuan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert"><i class="fas fa-check-circle"></i> Data satuan berhasil diubah!</div>');
            redirect('satuan');
        }
    }

    public function hapus($id)
    {
        $this->db->delete('tb_satuan', ['id_satuan' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fas fa-check-circle"></i> Data satuan berhasil dihapus!</div>');
        redirect('satuan');
    }


}