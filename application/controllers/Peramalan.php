<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peramalan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
    }

    public function index()
    {
        $data['title'] = 'Peramalan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['row'] = $this->peramalan_m->getdata()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peramalan/peramalan_data', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_pdf_peramalan()
    {
        $this->load->library('mypdf');
        $data['row'] = $this->peramalan_m->getdata()->result();
        // $this->load->view('transaksi/stock_in/laporan_pdf', $data);
        $this->mypdf->generate('peramalan/laporan_pdf', $data);
    }

    public function tampil_user_pdf()
    {
        $data['title'] = 'Peramalan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['row'] = $this->peramalan_m->getdata()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peramalan/cetak_laporan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_peramalan()
    {
        $data['listBarang'] = $this->user_m->get()->result();
        $data['title'] = 'Peramalan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        if ($_GET) {
            $barangId = $_GET['barangId'];
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $arrayJml = [];
            $x = 3;

            for ($i = 0; $i < 6; $i++) {
                $bulan--;
                if ($bulan == 0) {
                    $bulan = 6;
                    $tahun--;
                }

                $arrayJml[$i][0] = findMonth($bulan) . ' ' . $tahun;

                if (strlen($bulan) == 1) {
                    $bulan = '0' . $bulan;
                }

                $tgl = $tahun . '-' . $bulan;
                $detail = $this->penjualan_m->getDetailSale($barangId, $tgl);
                $jml = 0;
                foreach ($detail as $row) {
                    $jml += $row->qty;
                }

                if ($x == 0) {
                    $x = -1;
                }

                $arrayJml[$i][1] = $jml;
                $arrayJml[$i][2] = $x;
                $arrayJml[$i][3] = $jml * $x;
                $arrayJml[$i][4] = $x * $x;
                $x--;
            }

            // hitung a
            $a = 0;
            for ($i = 0; $i < 6; $i++) {
                $a += $arrayJml[$i][1];
            }
            $data['y'] = $a;
            $a = $a / 6;

            // hitung b
            $b = 0;
            $xy = 0;
            $x2 = 0;
            for ($i = 0; $i < 6; $i++) {
                $xy += $arrayJml[$i][3];
            }
            for ($i = 0; $i < 6; $i++) {
                $x2 += $arrayJml[$i][4];
            }
            $b = $xy / $x2;
            $hasil = round($a + ($b * 4));

            // kriim data
            $data['perhitungan'] = $arrayJml;
            $data['a'] = $a;
            $data['xy'] = $xy;
            $data['x2'] = $x2;
            $data['hasil'] = $hasil;
            $data['barang'] = $this->user_m->get($barangId)->row();
            $data['mad'] = $this->mad($arrayJml, $barangId, $hasil);

            $mad = $this->mad($arrayJml, $barangId, $hasil);
            $peramalan = $this->peramalan_m->get($barangId, findMonth($_GET['bulan']), $_GET['tahun']);
            if (empty($peramalan)) {
                $this->peramalan_m->store($barangId, findMonth($_GET['bulan']), $_GET['tahun'], $hasil, $mad);
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peramalan/tambah_peramalan', $data);
        $this->load->view('templates/footer');
    }

    public function mad($arrayJml, $barangId, $hasil)
    {
        $nilaiAktual = 0;
        $jmlNilaiAktual = 0;
        for ($i = 5; $i >= 0; $i--) {
            $tglArray = explode(' ', $arrayJml[$i][0]);
            $bulan = $tglArray[0];
            $tahun = $tglArray[1];

            $peramalan = $this->peramalan_m->get($barangId, $bulan, $tahun);
            if (!empty($peramalan)) {
                $hasil = $peramalan->hasil;
            }

            $nilaiAktual = $arrayJml[$i][1] - $hasil;
            $nilaiAktual = abs($nilaiAktual);
            $jmlNilaiAktual += $nilaiAktual;
        }

        return $jmlNilaiAktual / 6;
    }

    public function del($id)
    {
        $this->peramalan_m->del($id);
        if ($this->db->affected_rows() > 0) {
        }
        redirect('peramalan');
    }
}
