                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                </div>

                <!-- /.container-fluid -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="float-right mb-3">
                                <a href="<?= site_url('satuan/tambahsatuan');  ?>" class="btn btn-primary">
                                    Tambah Satuan
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Satuan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($row as $data) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data->nama_satuan ?></td>
                                            <td class="text-center" width="210px">
                                                <a href="<?= site_url('satuan/editsatuan/' . $data->id_satuan);  ?>" class="btn btn-primary btn-xs">
                                                    <i class="fas fa-fw fa-edit"></i> Edit
                                                </a>
                                                <!-- <a href="<?= site_url('sat/hapus/' . $data->kategori_id);  ?>" class="btn btn-danger btn-xs"><i class="fas fa-fw fa-trash"></i> Hapus</a> -->
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>