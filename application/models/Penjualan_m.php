<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_m extends CI_Model
{
    public function get($id_barang = null)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.kategori_id = barang.kategori_id');
        if ($id_barang != null) {
            $this->db->where('id_barang', $id_barang);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_detail($id)
    {
        return $this->db->select('*, detail_transaksi.total as total_detail')
                    ->from('detail_transaksi')
                    ->join('barang', 'barang.id_barang = detail_transaksi.id_barang')
                    ->join('transaksi', 'transaksi.no_transaksi = detail_transaksi.no_transaksi')
                    ->where(['transaksi.no_transaksi'=>$id])
                    ->get()
                    ->result();
    }

    public function getuser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query;
    }

    public function gettt()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('user', 'user.id = transaksi.id_user');
        $this->db->order_by('date', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function getDetailSale($barangId, $tgl)
    {
        return $this->db->select('*')
            ->from('detail_transaksi')
            ->join('barang', 'barang.id_barang = detail_transaksi.id_barang')
            ->join('transaksi', 'transaksi.no_transaksi = detail_transaksi.no_transaksi')
            ->like('transaksi.date', $tgl)
            ->where('detail_transaksi.id_barang', $barangId)
            ->get()
            ->result();
    }

    public function getAllTransaksi()
    {
        return $this->db->select('*')
            ->from('detail_transaksi')
            ->join('barang', 'barang.id_barang = detail_transaksi.id_barang')
            ->join('transaksi', 'transaksi.no_transaksi = detail_transaksi.no_transaksi')
            ->get()
            ->result();
    }

    public function get_cart($params = null)
    {
        $this->db->select('*, barang.nama_barang, cart.harga as harga_cart');
        $this->db->from('cart');
        $this->db->join('barang', 'cart.id_barang = barang.id_barang');
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('id_user', $this->session->userdata('user_id'));
        $query = $this->db->get();
        return $query;
    }

    public function add_cart($post)
    {
        $query = $this->db->query("SELECT MAX(id_cart) AS cart_no FROM cart");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $cart_no = ((int) $row->cart_no) + 1;
        } else {
            $cart_no = "1";
        }
        $params = array(
            'id_cart' => $cart_no,
            'id_barang' => $post['id_barang'],
            'harga' => $post['harga'],
            'qty' => $post['qty'],
            'total' => $post['harga'] * $post['qty'],
            'id_user' => $this->session->userdata('user_id')
        );

        $this->db->insert('cart', $params);
    }

    function update_data_qty($post)
    {
        $sql = "UPDATE cart SET harga = '$post[harga]',
        qty = qty + '$post[qty]',
        total = '$post[harga]' * qty
        WHERE id_barang = '$post[id_barang]'";
        $this->db->query($sql);
    }

    public function edit_cart($post)
    {
        $params = array(
            'qty' => $post['qty'],
            'total' => $post['total']
        );
        $this->db->where('id_cart', $post['id_cart']);
        $this->db->update('cart', $params);
    }

    public function add_sale($post)
    {
        $params = array(
            'date' => $post['tanggal'],
            'total' => $post['total'],
            'id_user' => $this->session->userdata('user_id')
        );
        $this->db->insert('transaksi', $params);
        $data = $this->db->order_by('no_transaksi', 'desc')->get('transaksi')->row();
        return $data->no_transaksi;
    }

    function add_sale_detail($params)
    {
        $this->db->insert_batch('detail_transaksi', $params);
    }

    public function cart_del($params = null)
    {
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('cart');
    }
}
