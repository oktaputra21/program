<!DOCTYPE html>
<html><head>
	<title>LAPORAN STOCK IN</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/print-style.css') ?>">
</head>
<body>
    <section class="header">
        <div class="logo"><img src="assets/img/logo-min.svg" style="position: absolute; width: 65px; height: auto;" alt=""></div>
        <div class="title">
            <h1>SEKAA TERUNA TERUNI YOWANA TAPA YOGA</h1>
            <span>Jalan Gelogor Carik, Pemogan, Kec. Denpasar Sel., Kota Denpasar, Bali 80221</span>
        </div>
    </section>
    <div class="container">
        <section class="content">
            <p class="text-center">Form Absensi Kegiatan</p>
            <table class="table1">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>QTY</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach($stock as $data) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data->nama_barang ?></td>
                    <td><?= $data->qty ?></td>
                    <td><?= $data->tanggal ?></td>
                    <td><?= $data->keterangan ?></td>
                </tr>
                <?php } ?>               
                </tbody>
            </table>
        </section>
        <div class="box">
            <div class="pengesahan1">
                <p class="ttd_nama1"></p>
                <p class="nama1"></p>
            </div>
            <div class="pengesahan2">
                <p class="lokasi-tgl">Denpasar, <?= date("Y-m-d") ?></p>
                <p class="ttd_nama2">Ketua Sekaa Teruna</p>
                <p class="nama2">I Kadek Bigiantara Putra</p>
            </div>
        </div>
    </div>
</body>
</html>