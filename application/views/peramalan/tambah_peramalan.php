<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Peramalan</h1>
</div>
<div class="row justify-content-center">
    <div class="col-md-11">
        <div class="card">
            <div class="card-body">
                <form action="" method="GET">
                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <select name="barangId" id="" class="form-control" required>
                            <option value="">Select</option>
                            <?php foreach ($listBarang as $row) : ?>
                                <option value="<?= $row->id_barang ?>" <?= ($_GET) ? ($_GET['barangId'] == $row->id_barang) ? 'selected' : '' : '' ?>><?= $row->id_barang . ' - ' . $row->nama_barang ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="">Bulan</label>
                            <select name="bulan" id="bulan" class="form-control">
                                <option value="">Select</option>
                                <?php foreach (listMonth() as $a => $b) : ?>
                                    <option value="<?= $a ?>" <?= ($_GET) ? ($_GET['bulan'] == $a) ? 'selected' : '' : '' ?>><?= $b ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Tahun</label>
                            <input type="number" name="tahun" class="form-control" value="<?= ($_GET) ? $_GET['tahun'] : '' ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Uji Peramalan</button>
                    <a href="<?= site_url('peramalan/tambah_peramalan') ?>">
                    </a>
                </form>

                <?php $no = 1;
                if ($_GET) : ?>
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Periode</th>
                                <th>Populasi (Y)</th>
                                <th>X</th>
                                <th>XY</th>
                                <th>X2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 5; $i >= 0; $i--) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $perhitungan[$i][0] ?></td>
                                    <td><?= $perhitungan[$i][1] ?></td>
                                    <td><?= $perhitungan[$i][2] ?></td>
                                    <td><?= $perhitungan[$i][3] ?></td>
                                    <td><?= $perhitungan[$i][4] ?></td>
                                </tr>
                            <?php endfor ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><?= $y ?></td>
                                <td></td>
                                <td><?= $xy ?></td>
                                <td><?= $x2 ?></td>
                            </tr>
                        </tfoot>
                    </table>

                    <hr>
                    <h4>Hasil</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Periode</th>
                                <th>Nama Barang</th>
                                <th>Result</th>
                                <th>MAD</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><?= findMonth($_GET['bulan']) . ' ' . $_GET['tahun'] ?></td>
                                <td><?= $barang->nama_barang ?></td>
                                <td><?= $hasil ?></td>
                                <td>Hasil : <?= $mad ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php endif ?>
            </div>
        </div>
        </div>
    </div>
</div>


<!-- <script src="<?= base_url() ?>/assets/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

    })
</script> -->