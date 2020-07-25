                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                </div>

                <!-- /.container-fluid -->
                <div class="card-body">


                    <div class="float-right mb-3">
                        <a href="<?= site_url('kategori');  ?>" class="btn btn-warning">
                            Kembali
                        </a>
                    </div>

                    <div>
                        <div class="row">
                            <div class="col-md-4">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label>Nama Kategori :</label>
                                        <input type="hidden" name="kategori_id" value="<?= $row->kategori_id ?>">
                                        <input type="text" name="nama_kategori" class="form-control" value="<?= $row->nama_kategori ?>">
                                        <?= form_error('nama_kategori', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <div class=" form-group">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                </div>