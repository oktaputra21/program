                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                </div>

                <!-- /.container-fluid -->
                <div class="card-body">
                    <?php
                    if ($this->session->userdata('role_id') == 2) { ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="float-right mb-3">
                                <a href="<?= site_url('stock/cetak_pdf_in');  ?>" class="btn btn-success" >
                                    Cetak Laporan
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
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Nama Barang</th>
                                        <th>Ukuran</th>
                                        <th>QTY</>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($row as $data) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data->tanggal ?></td>
                                            <td><?= $data->nama_barang ?></td>
                                            <td><?= $data->ukuran ?></td>
                                            <td class="text-right"><?= $data->qty ?></td>
                                            <td><?= $data->tanggal ?></td>
                                            <td><?= $data->keterangan ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>