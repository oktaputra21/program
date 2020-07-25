<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
</div>

<div class="card-body">
    <form action="" method="GET">
        <div class="form-group">
            <label for="">ID Barang</label>
            <select name="barangId" id="" class="form-control" required>
                <option value="">Pilih</option>
                <?php foreach ($sukuCadang->result() as $sc) : ?>
                    <option value="<?= $sc->id_barang ?>"><?= $sc->nama_barang ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="form-group">
            <label for="">Periode</label>
            <div class="row">
                <div class="col-md-4">
                    <select name="bulan" id="" class="form-control" required>
                        <option value="">Pilih</option>
                        <?php foreach (listMonth() as $m => $v) : ?>
                            <option value="<?= $m ?>"><?= $v ?></option>
                        <?php endforeach ?>
                    </select>
                    <small>Bulan</small>
                </div>
                <div class="col-md-4">
                    <input type="number" name="tahun" class="form-control">
                    <small>Tahun</small>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Uji Peramalan</button>
    </form>
</div>
</div>
</div>
</div>


<script src="<?= base_url() ?>/assets/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

    })
</script>