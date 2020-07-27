<!DOCTYPE html>
<html><head>
	<title>LAPORAN STOCK IN</title>
</head><body>
	<table class="table table-bordered">
		<tr>
			<th>#</th>
            <th>Nama Barang</th>
            <th>QTYY</>
            <th>Tanggal</th>
            <th>Keterangan</th>
		</tr>

		<?php $no = 1;
	    foreach ($data as $data); { ?>
        	<tr>
            	<td><?= $no++ ?></td>
                <td><?= $data->nama_barang ?></>
                <td><?= $data->qty ?></td>
                <td><?= $data->tanggal ?></td>
                <td><?= $data->keterangan ?></td>
            </tr>
            <?php } ?>
	</table>

</body></html>