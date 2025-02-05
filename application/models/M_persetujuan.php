<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_persetujuan extends CI_Model
{

    public function getpermintaanbarang()
    {
        $this->db->select('tb_permintaan.*, tb_user.nama, tb_user.unit, tb_stok_barang.nama_barang, tb_stok_barang.kode_barang, tb_jenis_barang.jenis_barang, tb_user.id_user');
        $this->db->from('tb_permintaan');
        $this->db->join('tb_user', 'tb_user.id_user = tb_permintaan.id_user');
        $this->db->join('tb_stok_barang', 'tb_stok_barang.id_stok_barang = tb_permintaan.id_stok_barang');
        $this->db->join('tb_jenis_barang', 'tb_jenis_barang.id_jenis_barang = tb_stok_barang.id_jenis_barang');
        $this->db->where('tb_permintaan.status', '1');
        return $this->db->get()->result_array();
    }

    public function getpermintaanbaranghistori($start_date = null, $end_date = null)
    {
        $this->db->select('tb_permintaan.*, tb_user.nama, tb_user.unit, tb_stok_barang.nama_barang, tb_stok_barang.kode_barang, tb_jenis_barang.jenis_barang, tb_user.id_user');
        $this->db->from('tb_permintaan');
        $this->db->join('tb_user', 'tb_user.id_user = tb_permintaan.id_user');
        $this->db->join('tb_stok_barang', 'tb_stok_barang.id_stok_barang = tb_permintaan.id_stok_barang');
        $this->db->join('tb_jenis_barang', 'tb_jenis_barang.id_jenis_barang = tb_stok_barang.id_jenis_barang');
        $this->db->where('tb_permintaan.status', '2');
        $this->db->or_where('tb_permintaan.status', '3');

        if ($start_date && $end_date) {
            $this->db->where('tb_permintaan.tanggal_permintaan >=', $start_date);
            $this->db->where('tb_permintaan.tanggal_permintaan <=', $end_date);
        }

        return $this->db->get()->result_array();
    }


}