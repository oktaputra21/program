<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('stock');
        if ($id != null) {
            $this->db->where('id_stock', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_out($id = null)
    {
        $this->db->from('stock');
        if ($id != null) {
            $this->db->where('id_stock', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function hapus($id)
    {
        $this->db->where('id_stock', $id);
        $this->db->delete('stock');
    }

    public function get_stock_in()
    {
        $this->db->select('*');
        $this->db->from('stock');
        $this->db->join('barang', 'stock.id_barang = barang.id_barang');
        $this->db->where('type', 'in');
        $this->db->order_by('tanggal', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function get_stock_out()
    {
        $this->db->select('*');
        $this->db->from('stock');
        $this->db->join('barang', 'stock.id_barang = barang.id_barang');
        $this->db->where('type', 'out');
        $this->db->order_by('tanggal', 'desc');
        $query = $this->db->get();
        return $query;
    }


    public function add_stock_in($post)
    {
        $params = [
            'id_barang' => $post['id_barang'],
            'type' => 'in',
            'keterangan' => $post['keterangan'],
            'id_barang' => $post['id_barang'],
            'qty' => $post['qty'],
            'tanggal' => $post['tanggal'],
            'user_id' => $this->session->userdata('role_id'),
        ];
        $this->db->insert('stock', $params);
    }

    public function add_stock_out($post)
    {
        $params = [
            'id_barang' => $post['id_barang'],
            'type' => 'out',
            'keterangan' => $post['keterangan'],
            'id_barang' => $post['id_barang'],
            'qty' => $post['qty'],
            'tanggal' => $post['tanggal'],
            'user_id' => $this->session->userdata('role_id'),
        ];
        $this->db->insert('stock', $params);
    }
}
