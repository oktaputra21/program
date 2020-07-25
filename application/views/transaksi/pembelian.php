                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                </div>

                <!-- /.container-fluid -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="float-right mb-3">
                                <a href="<?= site_url('penjualan/tambahpenjualan')  ?>" class="btn btn-primary">
                                    Tambah Transaksi
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No Transaksi</th>
                                        <th>ID User</th>
                                        <th>Tanggal</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($row as $data) { ?>
                                        <tr>
                                            <td><?= $data->no_transaksi ?></td>
                                            <td><?= $data->id_user ?></td>
                                            <td><?= $data->date ?></td>
                                            <td><?= $data->total ?></td>
                                            <td class="text-center" width="210px">
                                                <a href="<?= site_url('penjualan/editpenjualan/' . $data->no_transaksi);  ?>" class="btn btn-primary btn-xs">
                                                    <i class="fas fa-fw fa-edit"></i> Edit
                                                </a>
                                                <a href="<?= site_url('penjualan/del/' . $data->no_transaksi) ?>" onclick="return confirm('Hapus data penjualan?')" class="btn btn-danger btn-xs">
                                                    <i class="fas fa-fw fa-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>