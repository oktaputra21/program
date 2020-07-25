<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
</div>

<div class="card-body">
    <?php
    if ($this->session->userdata('role_id') == 1) { ?>
    <div class="row">
        <div class="col-12">
            <div class="float-right mb-3">
                <a href="<?= site_url('penjualan/tambah_penjualan'); ?>" class="btn btn-primary">
                    Tambah Data
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
                        <th>Total</>
                        <th>User</th>
                        <th class="text-center">Action</>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row as $data) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data->date ?></td>
                            <td><?= rupiah($data->total) ?></td>
                            <td><?= $data->nama ?></td>

                            <?php
                            if ($this->session->userdata('role_id') == 1) { ?>
                            <td>
                                <div class="table-data-feature">
                                    <button id="detail" class="item view_detail btn btn-primary" data-toggle="modal" data-target="#modal-detail" relid="<?php echo $data->no_transaksi;?>" title="Detail">
                                        <i class="fa fa-eye"></i> Detail
                                    </button>
                                </div>
                            </td>
                            <?php } ?>

                            <?php
                            if ($this->session->userdata('role_id') == 2) { ?>
                            <td class="text-center" width="150px">
                                <a href="#" type="submit" class="btn btn-success btn-xs">
                                    <i class="fas fa-fw fa-download"></i> Cetak
                                </a>
                            </td>
                            <?php } ?>
                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true" id="show_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Detail Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless" cellspacing="0" style="margin-right: 100px" width="100%">
                    <thead>
                        <tr>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>QTY</th>
                        <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="table-dynamic">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {

        $('.view_detail').click(function(){
            
            var no_transaksi = $(this).attr('relid'); //get the attribute value
            $('#table-dynamic').empty();
            $.ajax({
                url : "<?php echo base_url(); ?>penjualan/detail_product",
                data:{no_transaksi : no_transaksi},
                method:'GET',
                dataType:'json',
                success:function(response) {
                    console.log(response);
                    $.each(response, function(){
                        $('#table-dynamic').append(`
                            <tr>
                            <td>`+this.nama_barang+`</td>
                            <td>`+this.harga+`</td>
                            <td>`+this.qty+`</td>
                            <td>`+this.total_detail+`</td>
                            </tr>
                        `);
                    });
                    $('#show_modal').modal({backdrop: 'static', keyboard: true, show: true});
                }
            });
        });
        });
</script>