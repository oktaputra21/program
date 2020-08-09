<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
    }

    public function index()
    {
        $item = $this->penjualan_m->get()->result();
        $row = $this->penjualan_m->gettt()->result();
        $cart = $this->penjualan_m->get_cart();
        $data = array(
            'title' => 'Penjualan (Sale)',
            'item' => $item,
            'cart' => $cart,
            'row' => $row,
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/penjualan/penjualan_tampil', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_pdf_penjualan()
    {
        $this->load->library('mypdf');
        $data['row'] = $this->penjualan_m->getAllTransaksi();
        // $this->load->view('transaksi/penjualan/laporan_pdf', $data);
        $this->mypdf->generate('transaksi/penjualan/laporan_pdf', $data);
    }

    public function tampil_user_penjualan()
    {
        $transaksi = $this->penjualan_m->getAllTransaksi();
        // $row = $this->penjualan_m->get_detail()->result();
        // dd($transaksi);
        $cart = $this->penjualan_m->get_cart();
        $data = array(
            'title' => 'Penjualan (Sale)',
            'transaksi' => $transaksi,
            'cart' => $cart,
            // 'row' => $row,
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/penjualan/cetak_laporan', $data);
        $this->load->view('templates/footer');
    }

    public function detail_product()
    {
        $id = $this->input->get('no_transaksi');
        $detail_product = $this->penjualan_m->get_detail($id);
        echo json_encode($detail_product); 
        exit();
    }

    public function tambah_penjualan()
    {

        $item = $this->penjualan_m->get()->result();
        $cart = $this->penjualan_m->get_cart();
        $data = array(
            'title' => 'Tambah Penjualan (Sale)',
            'item' => $item,
            'cart' => $cart,
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/penjualan/penjualan_form', $data);
        $this->load->view('templates/footer');
    }

    public function process()
    {
        $data = $this->input->post(null, TRUE);

        if (isset($_POST['add_cart'])) {

            $id_barang = $this->input->post('id_barang');
            $check_cart = $this->penjualan_m->get_cart(['cart.id_barang' => $id_barang])->num_rows();
            if ($check_cart > 0) {
                $this->penjualan_m->update_data_qty($data);
            } else {
                $this->penjualan_m->add_cart($data);
            }

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
        if (isset($_POST['edit_cart'])) {
            $this->penjualan_m->edit_cart($data);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['save'])) {
            $no_transaksi = $this->penjualan_m->add_sale($data);
            $cart = $this->penjualan_m->get_cart()->result();
            $row = [];
            foreach ($cart as $c => $value) {
                array_push($row, array(
                    'no_transaksi' => $no_transaksi,
                    'id_barang' => $value->id_barang,
                    'harga' => $value->harga,
                    'qty' => $value->qty,
                    'total' => $value->total,
                ));
            }
            $this->penjualan_m->add_sale_detail($row);
            $this->penjualan_m->cart_del(['id_user' => $this->session->userdata('user_id')]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }

    public function cart_data()
    {
        $cart = $this->penjualan_m->get_cart();
        $data['cart'] = $cart;
        $this->load->view('transaksi/penjualan/cart_data', $data);
    }

    public function cart_del()
    {
        if (isset($_POST['cancel'])) {
            $this->penjualan_m->cart_del(['id_user' => $this->session->userdata('user_id')]);
        } else {
            $cart_id = $this->input->post('id_cart');
            $this->penjualan_m->cart_del(['id_cart' => $cart_id]);
        }
        if ($this->db->affected_rows() > 0) {
            $params = array("success" => true);
        } else {
            $params = array("success" => false);
        }
        echo json_encode($params);
    }
}
