<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan_barang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_permintaan_barang');
	}

	public function index()
	{
		$session = $this->session->userdata('id_user');
		if ($session == null) {
			redirect('login');
		}

		$data['title'] = 'Permintaan Barang';
		$data['permintaan'] = $this->M_permintaan_barang->getpermintaan();

		$this->load->view('templates/header.php');
		$this->load->view('templates/navbar.php');
		$this->load->view('permintaan_barang/index.php', $data);
		$this->load->view('templates/footer.php');
	}

	// function untuk menampilkan halaman tambah 
	public function tambah()
	{
		$data['title'] = 'Tambah Data Permintaan Barang';
		$data['permintaan'] = $this->M_permintaan_barang->getpermintaan();
		$data['stok_barang'] = $this->M_permintaan_barang->getstokbarang();
		$data['jenis_barang'] = $this->M_permintaan_barang->getpermintaan();
		$data['stok_barang_sementara'] = $this->M_permintaan_barang->getpermintaansementara();

		$this->load->view('templates/header.php');
		$this->load->view('templates/navbar.php');
		$this->load->view('permintaan_barang/tambah.php', $data);
		$this->load->view('templates/footer.php');

	}

	// proses simpan data permintaan barang
	public function simpan()
	{
		$this->form_validation->set_rules('id_stok_barang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$data = [
				'id_stok_barang' => $this->input->post('id_stok_barang'),
				'id_user' => $this->session->userdata('id_user'),
				'tgl_permintaan' => date('Y-m-d'),
				'jumlah' => $this->input->post('jumlah'),
				'status' => '0'
			];

			$this->db->insert('tb_permintaan', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Permintaan Barang Berhasil Ditambahkan</div>');
			redirect('permintaan_barang/tambah');
		}

	}

	public function ajukan($id)
	{
		// Mengambil data permintaan berdasarkan ID
		$permintaan = $this->db->get_where('tb_permintaan', ['id_permintaan' => $id])->row();

		if ($permintaan) {
			// Mengambil data stok barang berdasarkan ID stok_barang
			$stok_barang = $this->db->get_where('tb_stok_barang', ['id_stok_barang' => $permintaan->id_stok_barang])->row();

			if ($stok_barang) {
				// Pastikan jumlah yang diminta tidak melebihi stok yang tersedia
				if ($permintaan->jumlah <= $stok_barang->stok) {
					// Menghitung stok keluar sebagai penambahan stok keluar sebelumnya dan jumlah yang diminta
					$stok_keluar = $stok_barang->keluar + $permintaan->jumlah;

					// Menghitung sisa stok sebagai selisih antara stok dan stok keluar
					$sisa_stok = $stok_barang->stok - $stok_keluar;

					// Update status permintaan menjadi '1'
					$this->db->where('id_permintaan', $id);
					$this->db->update('tb_permintaan', ['status' => '1']);

					// Update stok_barang dengan jumlah yang baru, 'keluar', dan 'sisa'
					$this->db->where('id_stok_barang', $permintaan->id_stok_barang);
					$this->db->update('tb_stok_barang', ['stok' => $sisa_stok, 'keluar' => $stok_keluar, 'sisa' => $sisa_stok]);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Permintaan Barang Berhasil Diajukan</div>');
					redirect('permintaan_barang/tambah');
				} else {
					// Jika jumlah melebihi stok yang ada, tampilkan pesan error
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jumlah yang diminta melebihi stok yang tersedia</div>');
					redirect('permintaan_barang/tambah');
				}
			} else {
				// Handle jika data stok barang tidak ditemukan
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Stok Barang Tidak Ditemukan</div>');
				redirect('permintaan_barang/tambah');
			}
		} else {
			// Handle jika data permintaan tidak ditemukan
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Permintaan Barang Tidak Ditemukan</div>');
			redirect('permintaan_barang/tambah');
		}
	}


	public function hapus($id)
	{
		$this->db->where('id_permintaan', $id);
		$this->db->delete('tb_permintaan');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Permintaan Berhasil Dihapus</div>');
		redirect('permintaan_barang/tambah');

	}


}