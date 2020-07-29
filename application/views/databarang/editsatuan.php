                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                </div>

                <!-- /.container-fluid -->
                <div class="card-body">


                    <div class="float-right mb-3">
                        <a href="<?= site_url('satuan');  ?>" class="btn btn-warning">
                            Kembali
                        </a>
                    </div>

                    <div>
                        <div class="row">
                            <div class="col-md-4">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label>Nama Satuan :</label>
                                        <input type="hidden" name="id_satuan" value="<?= $row->id_satuan ?>">
                                        <input type="text" name="nama_satuan" class="form-control" value="<?= $row->nama_satuan ?>">
                                        <?= form_error('nama_satuan', '<small class="text-danger pl-3">', '</small>') ?>
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