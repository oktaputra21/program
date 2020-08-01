<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
</div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card" style="margin-left: 10px">
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top" width="30%">
                                <label>Tanggal</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" id="tanggal" value="<?= date('Y-m-d') ?>" class="form-control">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label>ID Barang</label>
                            </td>
                            <td>
                                <div class="form-group input-group">
                                    <input type="hidden" id="harga">
                                    <input type="hidden" id="stock">
                                    <input type="text" id="id_barang" class="form-control" autofocus>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-item">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label>QTY</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="qty" value="1" min="1" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <button id="add_cart" class="btn btn-primary">
                                        <i class="fa fa-cart-plus btn-small"></i> Tambah
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card" style="margin-left: 10px">
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top" width="30%">
                                <label for="total">Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="to_tal" name="total" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Barang</>
                                <th>Harga</th>
                                <th class="text-center">QTY</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="cart_table">
                            <?php $this->view('transaksi/penjualan/cart_data') ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-left: 500px">
        <div class="col-lg-12">
            <div class="form-group">
                <button id="save" class="btn btn-primary">Save</button>
                <button id="cancel" class="btn btn-warning btn-flat">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- end div id content -->

<!-- Modal Add Cart -->
<div class="modal fade" id="modal-item">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>ID Barang</th>
                            <th>Kategori</th>
                            <th>Nama Barang</th>
                            <th>Ukuran</th>
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
                                <td><?= $data->ukuran ?></td>
                                <td class="text-right"><?= rupiah($data->harga) ?></td>
                                <td><?= $data->stock ?></td>
                                <td>
                                    <button class="btn btn-small btn-info" id="select" data-id="<?= $data->id_barang ?>" data-harga="<?= $data->harga ?>" data-stock="<?= $data->stock ?>">
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
</div>


<!-- Modal Edit Cart -->
<div class="modal fade" id="modal-item-edit">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Produk Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="cartid_item">
                    <label>Nama Barang</label>
                    <div class="form-group">
                        <input type="text" id="nama_item" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" id="harga_item" min="0" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>QTY</label>
                    <input type="number" id="qty_item" min="1" class="form-control">
                </div>
                <div class="form-group">
                    <label>Total</label>
                    <input type="number" id="total_item" class="form-control" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-right">
                    <button type="button" id="edit_cart" class="btn btn-success">
                        <i class="fa fa-paper-plane"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
	
    $(document).on('click', '#select', function() {
        $('#id_barang').val($(this).data('id'));
        $('#harga').val($(this).data('harga'));
        $('#stock').val($(this).data('stock'));
        $('#modal-item').modal('hide');
    })


    $(document).on('click', '#add_cart', function() {
        var id_barang = $('#id_barang').val()
        var harga = $('#harga').val()
        var stock = $('#stock').val()
        var qty = $('#qty').val()
        if (id_barang == '') {
            alert('Produk belum dipilih!')
            $('#id_barang').focus()
        } else if (stock < qty) {
            alert('Stock tidak mencukupi!')
            $('#id_barang').val('')
            $('#id_barang').focus()
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('penjualan/process') ?>',
                data: {
                    'add_cart': true,
                    'id_barang': id_barang,
                    'harga': harga,
                    'qty': qty
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('penjualan/cart_data') ?>', function() {
                            calculate()
                        })
                        $('#id_barang').val('')
                        $('#qty').val(1)
                        $('#id_barang').focus()
                    } else {
                        alert('Gagal tambah item cart')
                    }
                }
            })
        }
    })

    $(document).on('click', '#del_cart', function() {
        if (confirm('Yakin hapus data?')) {
            var id_cart = $(this).data('cartid')
            $.ajax({
                type: 'POST',
                url: '<?= site_url('penjualan/cart_del') ?>',
                dataType: 'json',
                data: {
                    'id_cart': id_cart
                },
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('penjualan/cart_data') ?>', function() {})
                        calculate()
                    } else {
                        alert('Gagal hapus item cart!')
                    }
                }
            })
        }
    })

    $(document).on('click', '#update_cart', function() {
        $('#cartid_item').val($(this).data('cartid'));
        $('#nama_item').val($(this).data('barang'));
        $('#harga_item').val($(this).data('harga'));
        $('#qty_item').val($(this).data('qty'));
        $('#total_item').val($(this).data('total'));
    })

    function hitung_edit_modal() {
        var harga = $('#harga_item').val()
        var qty = $('#qty_item').val()

        total = harga * qty
        $('#total_item').val(total)
    }
    $(document).on('keyup mouseup', '#qty_item', function() {
        hitung_edit_modal()
    })


    $(document).on('click', '#edit_cart', function() {
        var id_cart = $('#cartid_item').val()
        var qty = $('#qty_item').val()
        var total = $('#total_item').val()
        if (qty == '' || qty < 1) {
            alert('QTY tidak boleh kosong!')
            $('#qty_item').focus()
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('penjualan/process') ?>',
                data: {
                    'edit_cart': true,
                    'id_cart': id_cart,
                    'qty': qty,
                    'total': total
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('penjualan/cart_data') ?>', function() {
                            calculate()
                        })
                        alert('Berhasil update cart!')
                        $('#modal-item-edit').modal('hide');
                    } else {
                        alert('Gagal update item cart!')
                    }
                }
            })
        }
    })

    function calculate() {
        var total = 0;

        $('#cart_table tr').each(function() {
            total += parseInt($(this).find('#total_cart').text())
        })
        isNaN(total) ? $('#to_tal').val(0) : $('#to_tal').val(total)
    }

    $(document).ready(function() {
        calculate()
    })

    // save
    $(document).on('click', '#save', function() {
        var tanggal = $('#tanggal').val()
        var total = $('#to_tal').val()
        if (total < 1) {
            alert('Belum ada produk yg dipilih!')
            $('#id_barang').focus()
        } else {
            if (confirm('Simpan data?')) {
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('penjualan/process') ?>',
                    data: {
                        'save': true,
                        'tanggal': tanggal,
                        'total': total
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.success) {
                            alert('Simpan transaksi berhasil!');
                        } else {
                            alert('Simpan transaksi gagal!');
                        }
                        location.href = '<?= site_url('penjualan') ?>'
                    }
                })
            }
        }
    })

    $(document).on('click', '#cancel', function() {
        if (confirm('Apakah anda yakin?')) {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('penjualan/cart_del') ?>',
                dataType: 'json',
                data: {
                    'cancel': true
                },
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('penjualan/cart_data') ?>', function() {
                            calculate()
                        })
                    }
                }
            })
            $('#id_barang').val('')
            $('#id_barang').focus()
        }
    })
</script>
