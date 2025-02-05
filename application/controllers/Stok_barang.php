<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Stok_barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_stok_barang');
        $this->load->library('pdfgenerator');
        // form validasi
        $this->load->library('form_validation');
    }

    public function index()
    {

        $session = $this->session->userdata('id_user');
        if ($session == null) {
            redirect('login');
        }
        $data['title'] = 'Stok Barang';
        $data['stok_barang'] = $this->db->get('tb_stok_barang')->result_array();

        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('stok_barang/index', $data);
        $this->load->view('templates/footer.php');
    }


    public function tambah()
    {
        $data['title'] = 'Tambah Stok Barang';
        $data['satuan_barang'] = $this->db->get('tb_satuan')->result_array();
        $data['jenis_barang'] = $this->db->get('tb_jenis_barang')->result_array();

        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('stok_barang/tambah', $data);
        $this->load->view('templates/footer.php');
    }

    public function simpan()
    {
        $this->form_validation->set_rules('id_jenis_barang', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('id_satuan', 'Satuan Barang', 'required');
        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required|is_unique[tb_stok_barang.kode_barang]');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|is_unique[tb_stok_barang.nama_barang]');
        $this->form_validation->set_rules('harga_barang', 'Harga Barang', 'required');
        $this->form_validation->set_rules('stok', 'Stok Barang', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = [

                'id_jenis_barang' => $this->input->post('id_jenis_barang'),
                'id_satuan' => $this->input->post('id_satuan'),
                'kode_barang' => $this->input->post('kode_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'harga_barang' => $this->input->post('harga_barang'),
                'stok' => $this->input->post('stok'),
            ];

            $this->db->insert('tb_stok_barang', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Stok Barang Berhasil Ditambahkan</div>');
            redirect('stok_barang');
        }

    }

    // function edit dan update untuk mengedit data stok barang
    public function edit($id)
    {
        $data['title'] = 'Edit Stok Barang';
        $data['stok_barang'] = $this->M_stok_barang->getstokbarangbyid($id);
        $data['satuan_barang'] = $this->db->get('tb_satuan')->result_array();
        $data['jenis_barang'] = $this->db->get('tb_jenis_barang')->result_array();

        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('stok_barang/edit', $data);
        $this->load->view('templates/footer.php');
    }

    public function tambah_stok_barang($id)
    {
        $data['title'] = 'Edit Stok Barang';
        $data['stok_barang'] = $this->M_stok_barang->getstokbarangbyid($id);
        $data['satuan_barang'] = $this->db->get('tb_satuan')->result_array();
        $data['jenis_barang'] = $this->db->get('tb_jenis_barang')->result_array();

        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('stok_barang/tambah_stok_barang', $data);
        $this->load->view('templates/footer.php');
    }

    public function simpan_stok_barang()
    {
        $this->form_validation->set_rules('stok', 'Stok Barang', 'required|integer');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_stok_barang'));
        } else {
            $id_stok_barang = $this->input->post('id_stok_barang');
            $stok_baru = $this->input->post('stok');

            // Memanggil method update_stok dari model untuk menambahkan stok
            $this->M_stok_barang->update_stok($id_stok_barang, $stok_baru);

            // Menambahkan flash message untuk notifikasi sukses
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Stok Barang Berhasil Ditambahkan!</div>'
            );

            // Redirect ke halaman stok barang
            redirect('stok_barang');
        }
    }


    // function update untuk mengupdate data stok barang
    public function update()
    {
        $this->form_validation->set_rules('id_jenis_barang', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('id_satuan', 'Satuan Barang', 'required');
        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('harga_barang', 'Harga Barang', 'required');
        $this->form_validation->set_rules('stok', 'Stok Barang', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_stok_barang'));
        } else {
            $data = [
                'id_jenis_barang' => $this->input->post('id_jenis_barang'),
                'id_satuan' => $this->input->post('id_satuan'),
                'kode_barang' => $this->input->post('kode_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'harga_barang' => $this->input->post('harga_barang'),
                'stok' => $this->input->post('stok'),
            ];

            $this->db->where('id_stok_barang', $this->input->post('id_stok_barang'));
            $this->db->update('tb_stok_barang', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Stok Barang Berhasil Diubah</div>');
            redirect('stok_barang');
        }
    }

    public function hapus($id)
    {
        $this->db->delete('tb_stok_barang', ['id_stok_barang' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Stok Barang Berhasil Dihapus</div>');
        redirect('stok_barang');
    }


    // function cetak menggunakan html2pdf
    public function cetak()
    {
        $this->load->library('pdfgenerator');

        $data['title'] = 'Cetak Stok Barang';
        $data['stok_barang'] = $this->db->get('tb_stok_barang')->result_array();

        // Variabel untuk total stok dan total keluar
        $total_stok = 0;
        $total_keluar = 0;

        foreach ($data['stok_barang'] as $barang) {
            $total_stok += $barang['stok'];
            $total_keluar += $barang['keluar'];
        }

        $data['total_stok'] = $total_stok;
        $data['total_keluar'] = $total_keluar;

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_penjualan_toko_kita';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = $this->load->view('stok_barang/cetak', $data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }





}