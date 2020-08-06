<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
    }


    // public function cetak_pdf_inn()
    // {
    //     $this->load->library('dompdf_gen');

    //     $data['stock'] = $this->stock_m->get_stock_in('stock')->result();

    //     $this->load->view('transaksi/stock_in/laporan_pdf', $data);

    //     $paper_size = 'A4';
    //     $orientation = 'potrait';
    //     $html = $this->output->get_output();
    //     $this->dompdf->set_paper($paper_size, $orientation);

    //     $this->dompdf->load_html($html);
    //     $this->dompdf->render();
    //     $this->dompdf->stream("laporan_stock_in.pdf", array('Attachment' => 0));
    // }

    public function cetak_pdf_in()
    {
        $this->load->library('mypdf');
		$data['stock'] = $this->stock_m->get_stock_in('stock')->result();
        // $this->load->view('transaksi/stock_in/laporan_pdf', $data);
		$this->mypdf->generate('transaksi/stock_in/laporan_pdf', $data);
    }

    public function cetak_pdf_out()
    {
        $this->load->library('mypdf');
        $data['stock'] = $this->stock_m->get_stock_out('stock')->result();
        // $this->load->view('transaksi/stock_in/laporan_pdf', $data);
        $this->mypdf->generate('transaksi/stock_out/laporan_pdf', $data);
    }

    public function tampil_user_in()
    {
        $row = $this->stock_m->get_stock_in()->result();
        $data = array(
            'title' => 'Stock In / Barang Masuk',
            'row' => $row,
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/stock_in/cetak_laporan', $data);
        $this->load->view('templates/footer');
    }

    public function tampil_user_out()
    {
        $row = $this->stock_m->get_stock_out()->result();
        $data = array(
            'title' => 'Stock Out / Barang Keluar',
            'row' => $row,
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/stock_out/cetak_laporan', $data);
        $this->load->view('templates/footer');
    }

    public function stock_in_tampil()
    {

        $row = $this->stock_m->get_stock_in()->result();
        $data = array(
            'title' => 'Stock In / Barang Masuk',
            'row' => $row,
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/stock_in/stock_in_data', $data);
        $this->load->view('templates/footer');
    }

    public function stock_out_tampil()
    {

        $row = $this->stock_m->get_stock_out()->result();
        $data = array(
            'title' => 'Stock Out / Barang Keluar',
            'row' => $row,
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/stock_out/stock_out_data', $data);
        $this->load->view('templates/footer');
    }

    public function stock_in_tambah()
    {
        $item = $this->user_m->get()->result();
        $data = array(
            'title' => 'Stock In / Barang Masuk',
            'item' => $item,
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/stock_in/stock_in_tambah', $data);
        $this->load->view('templates/footer');
    }

    public function stock_out_tambah()
    {
        $item = $this->user_m->get()->result();
        $data = array(
            'title' => 'Stock Out / Barang Keluar',
            'item' => $item,
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/stock_out/stock_out_tambah', $data);
        $this->load->view('templates/footer');
    }

    public function stock_in_hapus()
    {

        $id_stock = $this->uri->segment(3);
        $id_barang = $this->uri->segment(4);

        $qty = $this->stock_m->get($id_stock)->row()->qty;
        $data = [
            'qty' => $qty,
            'id_barang' => $id_barang
        ];

        $this->user_m->update_stock_out($data);
        $this->stock_m->hapus($id_stock);

        if ($this->db->affected_rows() > 0) {
            echo "<script>
            alert('Data Stock-In berhasil dihapus!');
            window.location='" . site_url('stock/stock_in_tampil') . "';
            </script>";
        }
    }

    public function stock_out_hapus()
    {

        $id_stock = $this->uri->segment(3);
        $id_barang = $this->uri->segment(4);

        $qty = $this->stock_m->get($id_stock)->row()->qty;
        $data = [
            'qty' => $qty,
            'id_barang' => $id_barang
        ];

        $this->user_m->update_stock_in_out($data);
        $this->stock_m->hapus($id_stock);

        if ($this->db->affected_rows() > 0) {
            echo "<script>
            alert('Data Stock-Out berhasil dihapus!');
            window.location='" . site_url('stock/stock_out_tampil') . "';
            </script>";
        }
    }

    public function process()
    {
        if (isset($_POST['in_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_in($post);
            $this->user_m->update_stock_in($post);

            if ($this->db->affected_rows() > 0) {
                echo "<script>
                alert('Data Stock-In berhasil disimpan!');
                window.location='" . site_url('stock/stock_in_tampil') . "';
                </script>";
            }
        }
    }

    public function process_out()
    {
        if (isset($_POST['out_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_out($post);
            $this->user_m->update_stock_out_in($post);

            if ($this->db->affected_rows() > 0) {
                echo "<script>
                alert('Data Stock-Out berhasil disimpan!');
                window.location='" . site_url('stock/stock_out_tampil') . "';
                </script>";
            }
        }
    }
}
