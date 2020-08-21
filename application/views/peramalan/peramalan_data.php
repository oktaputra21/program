<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
</div>



<div class="card-body">
    <?php
    if ($this->session->userdata('role_id') == 1) { ?>
    <div class="row">
        <div class="col-12">
            <div class="float-right mb-3">
                <a href="<?= site_url('peramalan/tambah_peramalan');  ?>" class="btn btn-primary">
                    Tambah Data
                </a>
            </div>
        </div>
    </div>
    <?php } ?>

    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Ukuran</th>
                        <th>Bulan</>
                        <th>Tahun</th>
                        <th>Hasil</th>
                        <th>MAD</th>
                        <th class="text-center">Action</>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row as $data) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data->nama_barang ?></td>
                            <td><?= $data->ukuran ?></td>
                            <td><?= $data->bulan ?></td>
                            <td class="text-right"><?= $data->tahun ?></td>
                            <td class="text-right"><?= $data->hasil ?></td>
                            <td class="text-right"><?= $data->mad ?></td>

                            <?php
                            if ($this->session->userdata('role_id') == 1) { ?>
                            <td class="text-center" width="150px">
                                <a href="<?= site_url('peramalan/del/' . $data->id_peramalan) ?>" onclick="return confirm('Hapus data peramalan?')" type="submit" class="btn btn-danger btn-xs">
                                    <i class="fas fa-fw fa-trash"></i> Hapus
                                </a>
                            </td>
                            <?php } ?>

                            <!-- <?php
                            if ($this->session->userdata('role_id') == 2) { ?>
                            <td class="text-center" width="150px">
                                <a href="#" type="submit" class="btn btn-success btn-xs">
                                    <i class="fas fa-fw fa-download"></i> Cetak
                                </a>
                            </td>
                            <?php } ?> -->

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



    
</div>