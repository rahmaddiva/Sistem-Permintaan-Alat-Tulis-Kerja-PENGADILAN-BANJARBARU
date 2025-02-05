<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_permintaan_barang extends CI_Model
{
    // join antara tb_permintaan dengan tb_user dan tb_stok_barang
    public function getpermintaan()
    {
        $this->db->select('tb_permintaan.*, tb_user.nama, tb_user.unit, tb_stok_barang.nama_barang, tb_stok_barang.kode_barang, tb_jenis_barang.jenis_barang, tb_user.id_user');
        $this->db->from('tb_permintaan');
        $this->db->join('tb_user', 'tb_user.id_user = tb_permintaan.id_user');
        $this->db->join('tb_stok_barang', 'tb_stok_barang.id_stok_barang = tb_permintaan.id_stok_barang');
        $this->db->join('tb_jenis_barang', 'tb_jenis_barang.id_jenis_barang = tb_stok_barang.id_jenis_barang');
        // berdasarkan id_user
        $this->db->where('tb_permintaan.id_user', $this->session->userdata('id_user'));

        return $this->db->get()->result_array();
    }

    public function getpermintaansementara()
    {
        $this->db->select('tb_permintaan.*, tb_user.nama, tb_user.unit, tb_stok_barang.nama_barang, tb_stok_barang.kode_barang, tb_jenis_barang.jenis_barang');
        $this->db->from('tb_permintaan');
        $this->db->join('tb_user', 'tb_user.id_user = tb_permintaan.id_user');
        $this->db->join('tb_stok_barang', 'tb_stok_barang.id_stok_barang = tb_permintaan.id_stok_barang');
        $this->db->join('tb_jenis_barang', 'tb_jenis_barang.id_jenis_barang = tb_stok_barang.id_jenis_barang');
        $this->db->where('tb_permintaan.status', '0');
         // berdasarkan id_user
         $this->db->where('tb_permintaan.id_user', $this->session->userdata('id_user'));
        

        return $this->db->get()->result_array();
    }


    // join antara tb_permintaan dengan tb_stok_barang
    public function getstokbarang()
    {
        $this->db->select('tb_stok_barang.*, tb_jenis_barang.jenis_barang');
        $this->db->from('tb_stok_barang');
        $this->db->join('tb_jenis_barang', 'tb_jenis_barang.id_jenis_barang = tb_stok_barang.id_jenis_barang');

        return $this->db->get()->result_array();
    }

}