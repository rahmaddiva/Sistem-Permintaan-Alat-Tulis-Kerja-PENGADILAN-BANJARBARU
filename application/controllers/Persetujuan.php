<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persetujuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_persetujuan');
    }

    public function index()
    {

        $session = $this->session->userdata('id_user');
        if ($session == null) {
            redirect('login');
        }
        $data['title'] = 'Persetujuan Permintaan Barang';
        $data['persetujuan'] = $this->M_persetujuan->getpermintaanbarang();


        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('persetujuan/index.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function histori()
    {
        $data['title'] = 'Histori Persetujuan Permintaan Barang';
        $data['histori'] = $this->M_persetujuan->getpermintaanbaranghistori();


        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('persetujuan/histori.php', $data);
        $this->load->view('templates/footer.php');

    }

    public function cetak()
    {
        $data['title'] = 'Cetak Persetujuan Permintaan Barang';

        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        if ($start_date && $end_date) {
            $data['histori'] = $this->M_persetujuan->getpermintaanbaranghistori($start_date, $end_date);
        } else {
            // Tampilkan semua data jika tanggal mulai dan tanggal selesai tidak diisi
            $data['histori'] = $this->M_persetujuan->getpermintaanbaranghistori();
        }

        $this->load->view('persetujuan/cetak.php', $data);
    }


    public function setujui($id_permintaan)
    {
        $data = [
            'tgl_disetujui' => date('Y-m-d H:i:s'),
            'status' => '2'
        ];
        $this->db->where('id_permintaan', $id_permintaan);
        $this->db->update('tb_permintaan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permintaan Barang Disetujui</div>');
        redirect('persetujuan');
    }

    public function tolak($id_permintaan)
    {
        $data = [
            'tgl_disetujui' => date('Y-m-d H:i:s'),
            'status' => '3'
        ];
        $this->db->where('id_permintaan', $id_permintaan);
        $this->db->update('tb_permintaan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Permintaan Barang Ditolak</div>');
        redirect('persetujuan');
    }
}