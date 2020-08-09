<!DOCTYPE html>
<html><head>
	<title>LAPORAN PENJUALAN</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/print-style.css') ?>">
</head>
<body>
    <section class="header">
        <!-- <div class="logo"><img src="assets/img/logo-min.svg" style="position: absolute; width: 65px; height: auto;" alt=""></div> -->
        <div class="title">
            <h1>UD. PUTRA DEWATA AYU</h1>
            <span>Jalan Raya Tojan, Pering, Kec. Blahbatuh, Kab. Gianyar, Bali</span>
        </div>
    </section>
    <div class="container">
        <section class="content">
            <h1 style="text-align: center">Laporan Penjualan</h1>
            <table class="table1">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Transaksi</th>
                    <th>Nama Barang</th>
                    <th>Ukuran</th>
                    <th>QTY</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach($row as $data) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data->no_transaksi ?></td>
                    <td><?= $data->nama_barang ?></td>
                    <td><?= $data->ukuran ?></td>
                    <td><?= $data->qty ?></td>
                    <td><?= $data->date ?></td>
                    <td><?= $data->total ?></td>
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
            <!-- <div class="pengesahan2">
                <p class="lokasi-tgl">Gianyar, <?= date("Y-m-d") ?></p>
                <p class="ttd_nama2">Ketua Sekaa Teruna</p>
                <p class="nama2">I Kadek Bigiantara Putra</p>
            </div> -->
        </div>
    </div>
</body>
</html>