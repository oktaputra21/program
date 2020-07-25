<?php

function is_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);


        // if ($role_id->num_row() == 2) {
        //redirect('auth/blocked');
        //}
    }
}

function dd($params)
{
    var_dump($params);
    die;
}

function rupiah($nominal)
{
    $result = "Rp " . number_format($nominal, 2, ',', '.');
    return $result;
}

function listMonth()
{
    $array = [
        '1' => 'Januari',
        '2' => 'Februari',
        '3' => 'Maret',
        '4' => 'April',
        '5' => 'Mei',
        '6' => 'Juni',
        '7' => 'Juli',
        '8' => 'Agustus',
        '9' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    ];

    return $array;
}

function findMonth($bulan)
{
    $array[1] = 'Januari';
    $array[2] = 'Februari';
    $array[3] = 'Maret';
    $array[4] = 'April';
    $array[5] = 'Mei';
    $array[6] = 'Juni';
    $array[7] = 'Juli';
    $array[8] = 'Agustus';
    $array[9] = 'September';
    $array[10] = 'Oktober';
    $array[11] = 'November';
    $array[12] = 'Desember';

    return $array[$bulan];
}
