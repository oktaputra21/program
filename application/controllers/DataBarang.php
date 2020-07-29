<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataBarang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
    }

    public function index()
    {
        $data['title'] = 'Data Barang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['row'] = $this->user_m->get()->result();
        // $data['row'] = $this->kategori_m->get()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('databarang/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambahbarang()
    {

        $databarang = new stdClass();
        $databarang->id_barang = null;
        $databarang->nama_barang = null;
        $databarang->harga = null;

        $kategori = $this->kategori_m->get();
        $satuan = $this->satuan_m->get();

        $data = array(
            'page' => 'tambah',
            'row' => $databarang,
            'title' => 'Tambah Data Barang',
            'kategori' => $kategori,
            'satuan' => $satuan,
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        );


        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('qty', 'QTY', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('databarang/tambahbarang', $data);
            $this->load->view('templates/footer');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->user_m->tambah($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
                alert('Data berhasil disimpan!');
                window.location='" . site_url('databarang') . "';
                </script>";
            }
        }
    }

    public function process()
    {
        // var_dump($this->input->post());
        // die();
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['tambah'])) {
            $this->user_m->tambah($post);
        }
        if ($this->db->affected_rows() > 0) {
            echo "<script>
                alert('Data berhasil disimpan!');
                window.location='" . site_url('databarang') . "';
                </script>";
        }
    }


    public function editbarang($id_barang)
    {
        $databarang = new stdClass();
        $databarang->id_barang = null;
        $databarang->nama_barang = null;
        $databarang->harga = null;

        $kategori = $this->kategori_m->get();
        $satuan = $this->satuan_m->get();

        $data = array(
            'page' => 'editbarang',
            'row' => $databarang,
            'title' => 'Edit Data Barang',
            'kategori' => $kategori,
            'satuan' => $satuan,
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        );


        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'required|trim');

        if ($this->form_validation->run() == false) {
            $query = $this->user_m->get($id_barang)->row();
            if ($query) {
                $data['row'] = $query;
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('databarang/editbarang', $data);
                $this->load->view('templates/footer');
            } else {
                echo "<script>
                alert('Data tidak ditemukan!');
                window.location='" . site_url('databarang') . "';
                </script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->user_m->editbarang($post);
            if ($this->db->affected_rows($id_barang) > 0) {
                echo "<script>
                alert('Data berhasil disimpan!');
                window.location='" . site_url('databarang') . "';
                </script>";
            }
        }
    }

    public function hapus()
    {
        $id_barang = $this->input->post('id_barang');
        $this->user_m->hapus($id_barang);

        if ($this->db->affected_rows($id_barang) > 0) {
            echo "<script>
            alert('Data berhasil dihapus!');
            window.location='" . site_url('databarang') . "';
            </script>";
        }
    }
}
