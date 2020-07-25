<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <//i class="fas fa-laugh-wink">
            <//i> <!-- Ganti ikon -->
        </div>
        <div class="sidebar-brand-text mx-3">UD. Putra Dewata Ayu</div>
    </a>


    <!-- Nav Item - Dashboard -->
    <?php
    if ($this->session->userdata('role_id') == 1) { ?>


        <li class="nav-item . <?= $this->uri->segment(1) == 'admin' ? "active" : '' ?>">
            <a class="nav-link" href="<?= base_url('admin') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBarang" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-dollar-sign"></i>
                <span>Data Barang</span>
            </a>
            <div id="collapseBarang" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('databarang') ?>">Produk</a>
                    <a class="collapse-item" href="<?= base_url('kategori') ?>">Kategori</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaksi" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-dollar-sign"></i>
                <span>Transaksi</span>
            </a>
            <div id="collapseTransaksi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('stock/stock_in_tampil') ?>">Stock In</a>
                    <a class="collapse-item" href="<?= base_url('stock/stock_out_tampil') ?>">Stock Out</a>
                    <a class="collapse-item" href="<?= base_url('penjualan') ?>">Penjualan</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">


        <li class="nav-item . <?= $this->uri->segment(1) == 'peramalan' ? "active" : '' ?>">
            <a class="nav-link" href="<?= base_url('peramalan') ?>">
                <i class="fas fa-fw fa-forward"></i>
                <span>Peramalan</span></a>
        </li>

        <hr class="sidebar-divider">

    <?php } ?>

    <?php
    if ($this->session->userdata('role_id') == 2) { ?>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Laporan</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('peramalan')?>">Laporan Peramalan</a>
                    <a class="collapse-item" href="<?= base_url('penjualan') ?>">Laporan Penjualan</a>
                    <a class="collapse-item" href="<?= base_url('stock/stock_in_tampil') ?>">Laporan Stock In</a>
                    <a class="collapse-item" href="<?= base_url('stock/stock_out_tampil') ?>">Laporan Stock Out</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">
    <?php } ?>
    <!-- Divider -->

    <li class="nav-item . <?= $this->uri->segment(1) == 'profile' && $this->uri->segment(2) == '' ? "active" : '' ?>">
        <a class="nav-link" href="<?= base_url('profile') ?>">
            <!-- inget ubah href -->
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item . <?= $this->uri->segment(1) == 'profile' && $this->uri->segment(2) == 'editprofile' ? "active" : '' ?>">
        <a class="nav-link" href="<?= base_url('profile/editprofile') ?>">
            <!-- inget ubah href -->
            <i class="fas fa-fw fa-edit"></i>
            <span>Edit Profile</span></a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <!-- inget ubah href -->
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->