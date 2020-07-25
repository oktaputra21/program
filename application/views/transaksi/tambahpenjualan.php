                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                </div>

                <!-- /.container-fluid -->
                <div class="card-body">


                    <div class="float-right mb-3">
                        <a href="<?= site_url('penjualan');  ?>" class="btn btn-warning">
                            Kembali
                        </a>
                    </div>

                    <div>
                        <div class="row">
                            <div class="col-md-4">
                                <form action="<?= ('process') ?>" method="POST">
                                    <div class="form-group">
                                        <label>User :</label>
                                        <select name="userss" class="form-control">
                                            <option value="">- Pilih -</option>
                                            <?php foreach ($a->result() as $key => $data) { ?>
                                                <option value="<?= $data->id ?>"><?= $data->nama ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class=" form-group">
                                        <label>Tanggal :</label>
                                        <input type="date" name="date" class="form-control" value="<?= set_value('date') ?>" required>
                                        <?= form_error('date', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Total :</label>
                                        <input type="text" name="total" class="form-control" value="<?= set_value('total') ?>" required>
                                        <?= form_error('total', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <div class=" form-group">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                        <button type="reset" class="btn btn-dark">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                </div>

                <!-- End of Main Content -->