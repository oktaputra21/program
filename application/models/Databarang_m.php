<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('barang');
        if ($id != null) {
            $this->db->where('no_transaksi', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}
