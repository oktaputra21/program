<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', $post['password']);
        $query = $this->db->get();
        return $query;
    }


    public function get($id_barang = null)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.kategori_id = barang.kategori_id');
        $this->db->join('satuan', 'satuan.id_satuan = barang.id_satuan');
        if ($id_barang != null) {
            $this->db->where('id_barang', $id_barang);
        }
        $query = $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params['kategori_id'] = $post['kategori'];
        $params['id_satuan'] = $post['satuan'];
        $params['nama_barang'] = $post['nama_barang'];
        $params['harga'] = $post['harga'];
        $params['ukuran'] = $post['ukuran'];
        $this->db->insert('barang', $params);
    }

    public function editbarang($post)
    {
        $params['kategori_id'] = $post['kategori'];
        $params['id_satuan'] = $post['satuan'];
        $params['nama_barang'] = $post['nama_barang'];
        $params['harga'] = $post['harga'];
        $params['ukuran'] = $post['ukuran'];
        $this->db->where('id_barang', $post['id_barang']);
        $this->db->update('barang', $params);
    }

    public function hapus($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('barang');
    }

    public function update_stock_in($data)
    {
        $qty = $data['qty'];
        $id = $data['id_barang'];
        // var_dump($data);
        // die();
        $sql = "UPDATE barang SET stock = stock + '$qty' WHERE id_barang = $id";
        $this->db->query($sql);
    }

    public function update_stock_out($data)
    {
        // dd($data);
        $qty = $data['qty'];
        $id = $data['id_barang'];

        $sql = "UPDATE barang SET stock = stock - '$qty' WHERE id_barang = $id";
        $this->db->query($sql);
    }

    public function update_stock_in_out($data)
    {
        $qty = $data['qty'];
        $id = $data['id_barang'];
        // var_dump($data);
        // die();
        $sql = "UPDATE barang SET stock = stock + '$qty' WHERE id_barang = $id";
        $this->db->query($sql);
    }

    public function update_stock_out_in($data)
    {
        $qty = $data['qty'];
        $id = $data['id_barang'];
        // var_dump($data);
        // die();
        $sql = "UPDATE barang SET stock = stock - '$qty' WHERE id_barang = $id";
        $this->db->query($sql);
    }
}
