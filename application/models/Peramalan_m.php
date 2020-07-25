<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peramalan_m extends CI_Model
{

    public function getdata($id = null)
    {
        $this->db->select('*');

        $this->db->from('peramalan');
        $this->db->join('barang', 'peramalan.id_barang = barang.id_barang');
        if ($id != null) {
            $this->db->where('no_transaksi', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get($barangId, $bulan, $tahun)
    {
        $peramalan = $this->db->where('id_barang', $barangId)->where('bulan', $bulan)->where('tahun', $tahun)->get('peramalan')->row();
        return $peramalan;
    }

    public function store($barangId, $bulan, $tahun, $hasil, $mad)
    {
        $params = array(
            'id_barang' => $barangId,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'hasil' => $hasil,
            'mad' => $mad
        );

        $this->db->insert('peramalan', $params);
    }

    public function del($id)
    {
        $this->db->where('id_peramalan', $id);
        $this->db->delete('peramalan');
    }
}
