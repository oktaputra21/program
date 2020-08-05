<?php $no = 1;
if ($cart->num_rows() > 0) {
    foreach ($cart->result() as $c => $data) { ?>
        <tr>
            <td><?= $no++ ?>.</td>
            <td><?= $data->nama_barang ?></td>
            <td><?= $data->ukuran ?></td>
            <td class="text-right"><?= $data->harga_cart ?></td>
            <td class="text-right"><?= $data->qty ?></td>
            <td id="total_cart" class="text-right"><?= $data->total ?></td>
            <td class="text-center">
                <button id="update_cart" data-toggle="modal" data-target="#modal-item-edit" data-cartid="<?= $data->id_cart ?>" data-item="<?= $data->id_barang ?>" data-barang="<?= $data->nama_barang ?>" data-harga="<?= $data->harga_cart ?>" data-qty="<?= $data->qty ?>" data-total="<?= $data->total ?>" class="btn btn-primary">
                    <i class="fa fa-pencil"></i> Update
                </button>
                <button id="del_cart" data-cartid="<?= $data->id_cart ?>" class="btn btn-xs btn-danger">
                    <i class="fa fa-trash"></i> Hapus
                </button>
            </td>
        </tr>
<?php
    }
} else {
    echo '<tr>
    <td colspan="8" class="text-center>Tidak ada item</td>
    </tr>';
} ?>