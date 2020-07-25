                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                </div>

                <!-- /.container-fluid -->
                <div class="card-body">

                    <div class="float-right mb-3">
                        <a href="<?= site_url('stock/stock_out_tampil');  ?>" class="btn btn-warning">
                            Kembali
                        </a>
                    </div>

                    <div>
                        <div class="row">
                            <div class="col-md-4">
                                <form action="<?= site_url('stock/process_out') ?>" method="POST">
                                    <div>
                                        <label>ID Barang :</label>
                                    </div>
                                    <div class="form-group input-group">
                                        <!-- <input type="hidden" name="id_barang" id="id_barang"> -->
                                        <input type="text" name="id_barang" id="id_barang" class="form-control">
                                        <span>
                                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Barang :</label>
                                        <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="" readonly>
                                        <?= form_error('nama_barang', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label>Kategori</label>
                                                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="" readonly>
                                                <?= form_error('nama_barang', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Stock Awal</label>
                                                <input type="text" name="stock" id="stock" class="form-control" value="-" readonly>
                                                <?= form_error('stock', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal :</label>
                                        <input type="date" name="tanggal" id="" class="form-control" value="<?= date('Y-m-d') ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan :</label>
                                        <input type="text" name="keterangan" class="form-control" placeholder="Rusak / Pecah / etc" required>
                                        <?= form_error('stock', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Qty :</label>
                                        <input type="number" name="qty" id="qty" class="form-control" required>
                                        <?= form_error('stock', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <div class=" form-group">
                                        <button type="submit" name="out_add" class="btn btn-success">Simpan</button>
                                        <button type="reset" class="btn btn-dark">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                <div class="modal fade" id="modal-item">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Select Product Item</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body table-responsive">
                                <table class="table table-bordered table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>ID Barang</th>
                                            <th>Kategori</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Stock</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($item as $i => $data) { ?>
                                            <tr>
                                                <td><?= $data->id_barang ?></td>
                                                <td><?= $data->nama_kategori ?></td>
                                                <td><?= $data->nama_barang ?></td>
                                                <td><?= rupiah($data->harga) ?></td>
                                                <td><?= $data->stock ?></td>
                                                <td>
                                                    <button class="btn btn-small btn-info" id="select" data-id="<?= $data->id_barang ?>" data-kategori="<?= $data->nama_kategori ?>" data-nama="<?= $data->nama_barang ?>" data-harga="<?= $data->harga ?>" data-stock="<?= $data->stock ?>">
                                                        <i class="fa fa-check">Select</i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- End of Main Content -->

                <script>
                    $(document).ready(function() {
                        $(document).on('click', '#select', function() {
                            var id_barang = $(this).data('id');
                            var nama_kategori = $(this).data('kategori');
                            var nama_barang = $(this).data('nama');
                            var harga = $(this).data('harga');
                            var qty = $(this).data('stock');
                            $('#id_barang').val(id_barang);
                            $('#nama_kategori').val(nama_kategori);
                            $('#nama_barang').val(nama_barang);
                            $('#harga').val(harga);
                            $('#stock').val(qty);
                            $('#modal-item').modal('hide');
                        })
                    })
                </script>