<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_stok_barang extends CI_Model
{

  public function get_jenis_barang()
  {
    return $this->db->get('tb_jenis_barang')->result_array();
  }

  public function getstokbarang()
  {
    $this->db->select('tb_stok_barang.*, tb_permintaan.jumlah');
    $this->db->from('tb_stok_barang');
    $this->db->join('tb_permintaan', 'tb_permintaan.id_stok_barang = tb_stok_barang.id_stok_barang');

    return $this->db->get()->result_array();

  }

  // getstokbarangbyid
  public function getstokbarangbyid($id)
  {
    $this->db->select('tb_stok_barang.*, tb_satuan.nama_satuan, tb_jenis_barang.jenis_barang');
    $this->db->from('tb_stok_barang');
    $this->db->join('tb_satuan', 'tb_satuan.id_satuan = tb_stok_barang.id_satuan');
    $this->db->join('tb_jenis_barang', 'tb_jenis_barang.id_jenis_barang = tb_stok_barang.id_jenis_barang');
    $this->db->join('tb_permintaan', 'tb_permintaan.id_stok_barang = tb_stok_barang.id_stok_barang');
    $this->db->where('tb_stok_barang.id_stok_barang', $id);

    return $this->db->get()->row_array();
  }

  public function update_stok($id_stok_barang, $stok_baru)
  {
    $this->db->set('stok', 'stok + ' . (int) $stok_baru, false); // Penambahan stok
    $this->db->where('id_stok_barang', $id_stok_barang); // Kondisi berdasarkan id
    $this->db->update('tb_stok_barang'); // Eksekusi update
  }


}