<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
    }

    public function index()
    {
        $data['title'] = 'Satuan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['row'] = $this->satuan_m->get()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('databarang/satuan', $data);
        $this->load->view('templates/footer');
    }

    public function tambahsatuan()
    {

        $satuan = new stdClass();
        $satuan->id_satuan = null;
        $satuan->nama_satuan = null;
        $data = array(
            'page' => 'tambah',
            'row' => $satuan,
            'title' => 'Tambah Satuan',
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        );


        //$this->load->library('form_validation');
        // $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
        //$this->form_validation->set_rules('qty', 'QTY', 'required|trim');
        //$this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        // $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('databarang/tambahsatuan', $data);
            $this->load->view('templates/footer');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->satuan_m->tambah($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
                alert('Data berhasil disimpan!');
                window.location='" . site_url('satuan') . "';
                </script>";
            }
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['tambah'])) {
            $this->satuan_m->tambah($post);
        }
        if ($this->db->affected_rows() > 0) {
            echo "<script>
                alert('Data berhasil disimpan!');
                window.location='" . site_url('satuan') . "';
                </script>";
        }
    }


    public function editsatuan($id_satuan)
    {
        $data['title'] = 'Edit Data Satuan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $query = $this->satuan_m->get($id_satuan)->row();
            if ($query) {
                $data['row'] = $query;
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('databarang/editsatuan', $data);
                $this->load->view('templates/footer');
            } else {
                echo "<script>
                alert('Data tidak ditemukan!');
                window.location='" . site_url('satuan') . "';
                </script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->satuan_m->editsatuan($post);
            if ($this->db->affected_rows($id_satuan) > 0) {
                echo "<script>
                alert('Data berhasil disimpan!');
                window.location='" . site_url('satuan') . "';
                </script>";
            }
        }
    }

    // public function hapus($id)
    // {
    //     $this->kategori_m->hapus($id);

    //     // if ($this->db->affected_rows($kategori_id) > 0) {
    //     //     echo "<script>
    //     //     alert('Data berhasil dihapus!');
    //     //     window.location='" . site_url('kategori') . "';
    //     //     </script>";
    //     // }
    // }
}
