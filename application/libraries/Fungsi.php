<?php

class Fungsi
{
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }

    public function count_user()
    {
        $this->ci->load->model('pengguna_m');
        return $this->ci->pengguna_m->get()->num_rows();
    }
    public function count_item()
    {
        $this->ci->load->model('user_m');
        return $this->ci->user_m->get()->num_rows();
    }
    public function count_peramalan()
    {
        $this->ci->load->model('peramalan_m');
        return $this->ci->peramalan_m->getdata()->num_rows();
    }
    public function count_penjualan()
    {
        $this->ci->load->model('penjualan_m');
        return $this->ci->penjualan_m->gettt()->num_rows();
    }
}
