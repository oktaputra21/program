                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                </div>

                <!-- /.container-fluid -->
                <div class="card-body">


                    <div class="float-right mb-3">
                        <a href="<?= site_url('databarang');  ?>" class="btn btn-warning">
                            Kembali
                        </a>
                    </div>

                    <div>
                        <div class="row">
                            <div class="col-md-4">
                                <form action="<?= site_url('databarang/process') ?>" method="POST">
                                    <div class="form-group">
                                        <label>Kategori :</label>
                                        <select name="kategori" class="form-control">
                                            <option value="">- Pilih -</option>
                                            <?php foreach ($kategori->result() as $key => $data) { ?>
                                                <option value="<?= $data->kategori_id ?>"><?= $data->nama_kategori ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Barang :</label>
                                        <input type="text" name="nama_barang" class="form-control" value="<?= $row->nama_barang ?>" required>
                                        <?= form_error('nama_barang', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Satuan :</label>
                                        <select name="satuan" class="form-control">
                                            <option value="">- Pilih -</option>
                                            <?php foreach ($satuan->result() as $key => $data) { ?>
                                                <option value="<?= $data->id_satuan ?>"><?= $data->nama_satuan ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Ukuran :</label>
                                        <input type="text" name="ukuran" class="form-control" value="<?= $row->nama_barang ?>" required>
                                        <?= form_error('ukuran', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>

                                    <div class=" form-group">
                                        <label>Harga :</label>
                                        <input type="text" name="harga" class="form-control" value="<?= $row->harga ?>">
                                        <?= form_error('harga', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <div class=" form-group">
                                        <button type="submit" name="<?= $page ?>" class="btn btn-success">Simpan</button>
                                        <button type="reset" class="btn btn-dark">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                </div>

                <!-- End of Main Content -->