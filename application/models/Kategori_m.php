<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        if ($id != null) {
            $this->db->where('kategori_id', $id);
        }
        $this->db->where('deleted_at', null);
        $query = $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params['nama_kategori'] = $post['nama_kategori'];
        $this->db->insert('kategori', $params);
    }

    public function editkategori($post)
    {
        $params['nama_kategori'] = $post['nama_kategori'];
        $this->db->where('kategori_id', $post['kategori_id']);
        $this->db->update('kategori', $params);
    }

    public function hapus($id)
    {
        $this->db->set('deleted_at', date("Y-m-d H:i:s"));
        $this->db->where('kategori_id', $id);
        $this->db->update('kategori');
    }
}
