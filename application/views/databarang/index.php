                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                </div>

                <!-- /.container-fluid -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="float-right mb-3">
                                <a href="<?= site_url('databarang/tambahbarang');  ?>" class="btn btn-primary">
                                    Tambah Data
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
                                        <th>Kategori</th>
                                        <th>Nama Barang</th>
                                        <th>Stock</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($row as $data) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data->nama_kategori ?></td>
                                            <td><?= $data->nama_barang ?></td>
                                            <td><?= $data->stock ?></td>
                                            <td><?= rupiah($data->harga) ?></td>
                                            <td class="text-center" width="210px">
                                                <form action="<?= site_url('databarang/hapus') ?>" method="POST">
                                                    <a href="<?= site_url('databarang/editbarang/' . $data->id_barang);  ?>" class="btn btn-primary btn-xs">
                                                        <i class="fas fa-fw fa-edit"></i> Edit
                                                    </a>
                                                    <input type="hidden" name="id_barang" value="<?= $data->id_barang ?>">
                                                    <button onclick="return confirm('Hapus barang?')" type="submit" class="btn btn-danger btn-xs">
                                                        <i class="fas fa-fw fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>