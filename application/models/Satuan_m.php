<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('satuan');
        if ($id != null) {
            $this->db->where('id_satuan', $id);
        }
        $query = $this->db->get();
        return $query;
        // $this->db->where('deleted_at', null);
        // $query = $this->db->get();
        // return $query;
    }

    public function tambah($post)
    {
        $params['nama_satuan'] = $post['nama_satuan'];
        $this->db->insert('satuan', $params);
    }

    public function editsatuan($post)
    {
        $params['nama_satuan'] = $post['nama_satuan'];
        $this->db->where('id_satuan', $post['id_satuan']);
        $this->db->update('satuan', $params);
    }

    // public function hapus($id)
    // {
    //     $this->db->set('deleted_at', date("Y-m-d H:i:s"));
    //     $this->db->where('kategori_id', $id);
    //     $this->db->update('kategori');
    // }
}
