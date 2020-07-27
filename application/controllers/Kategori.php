<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
    }

    public function index()
    {
        $data['title'] = 'Kategori';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['row'] = $this->kategori_m->get()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('databarang/kategori', $data);
        $this->load->view('templates/footer');
    }

    public function tambahkategori()
    {

        $kategori = new stdClass();
        $kategori->kategori_id = null;
        $kategori->nama_kategori = null;
        $data = array(
            'page' => 'tambah',
            'row' => $kategori,
            'title' => 'Tambah Kategori',
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
            $this->load->view('databarang/tambahkategori', $data);
            $this->load->view('templates/footer');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->kategori_m->tambah($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
                alert('Data berhasil disimpan!');
                window.location='" . site_url('kategori') . "';
                </script>";
            }
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['tambah'])) {
            $this->kategori_m->tambah($post);
        }
        if ($this->db->affected_rows() > 0) {
            echo "<script>
                alert('Data berhasil disimpan!');
                window.location='" . site_url('kategori') . "';
                </script>";
        }
    }


    public function editkategori($kategori_id)
    {
        $data['title'] = 'Edit Data Kategori';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $query = $this->kategori_m->get($kategori_id)->row();
            if ($query) {
                $data['row'] = $query;
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('databarang/editkategori', $data);
                $this->load->view('templates/footer');
            } else {
                echo "<script>
                alert('Data tidak ditemukan!');
                window.location='" . site_url('kategori') . "';
                </script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->kategori_m->editkategori($post);
            if ($this->db->affected_rows($kategori_id) > 0) {
                echo "<script>
                alert('Data berhasil disimpan!');
                window.location='" . site_url('kategori') . "';
                </script>";
            }
        }
    }

    public function hapus($id)
    {
        $this->kategori_m->hapus($id);

        // if ($this->db->affected_rows($kategori_id) > 0) {
        //     echo "<script>
        //     alert('Data berhasil dihapus!');
        //     window.location='" . site_url('kategori') . "';
        //     </script>";
        // }
    }
}
