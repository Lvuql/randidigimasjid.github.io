<?= $this->extend('layout/main') ?>
<?= $this->section('menu') ?>

<li>
    <a href="<?= site_url('layout') ?>" class="waves-effect">
        <i class="mdi mdi-airplay"></i>
        <span> Beranda <span class="badge badge-pill badge-primary float-right"></span>
    </a>
</li> 

<?php if (session()->get('level') == 1) { ?>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i><span>QUIZ</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">
            <li><a href="<?= site_url('pelanggan') ?>">Pelanggan</a></li>
            <li><a href="<?= site_url('tarif') ?>">Tarif</a></li>
            <li><a href="<?= site_url('transaksi') ?>">Transaksi</a></li>
        </ul>
    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i><span>Master</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">
            <li><a href="<?= site_url('pengurus') ?>">Pengurus</a></li>
            <li><a href="<?= site_url('user') ?>">User</a></li>
            <li><a href="<?= site_url('donatur') ?>">Donatur</a></li>
            <li><a href="<?= site_url('agenda') ?>">Agenda</a></li>
        </ul>
    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i><span>Transaksi</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">
            <li><a href="<?= site_url('kasmasuk') ?>">Kas Masuk</a></li>
            <li><a href="<?= site_url('kaskeluar/anakyatim') ?>">Kas Keluar Anak Yatim</a></li>
            <li><a href="<?= site_url('kaskeluar/tpq') ?>">Kas Keluar TPQ</a></li>
            <li><a href="<?= site_url('kaskeluar/sosial') ?>">Kas Keluar Sosial</a></li>
            <li><a href="<?= site_url('kaskeluar/mesjid') ?>">Kas Keluar Masjid</a></li>
        </ul>
    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i><span>Laporan</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">
            <li><a href="<?= site_url('kasmasuk/laporankasmasuk') ?>">Laporan Kas Masuk</a></li>
            <li><a href="<?= site_url('kasmasuk/laporanperperiode') ?>">Laporan Periode</a></li>
            <li><a href="<?= site_url('kasmasuk/laporanperperiodeperjeniskas') ?>">Laporan Per Jenis</a></li>
        </ul>
    </li>
    <li>
        <a href="<?= site_url('login/logout') ?>" class="waves-effect"><i class="fa fa-sign-out"></i><span>Logout<span class="badge badge-pill badge-primary float-right"></span>
    </li>
<?php } ?>
<?php if (session()->get('level') == 2) { ?>
    <li class="has_sub">
        <a href="<?= site_url('layout/') ?>" class="waves-effect">
            <i class="mdi mdi-airplay"></i>
            <span> Hai  
                <?=
                $u = (session()->get('username'));
                ?>
                <br><br>
                <img src="<?php echo base_url() . '/gambar/' . $u . '.jpg' ?>" height="160" width="150" alt="">
            </span>
        </a>
    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i><span>Laporan</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">
            <li><a href="<?= site_url('kasmasuk/laporankasmasuk') ?>">Laporan Kas Masuk</a></li>
            <li><a href="<?= site_url('kasmasuk/laporanperperiode') ?>">Laporan Periode</a></li>
            <li><a href="<?= site_url('kasmasuk/laporanperperiodeperjeniskas') ?>">Laporan Per Jenis</a></li>
        </ul>
    </li>
    <li>
        <a href="<?= site_url('login/logout') ?>" class="waves-effect"><i class="fa fa-sign-out"></i><span>Logout<span class="badge badge-pill badge-primary float-right"></span>
    </li>
<?php } ?>
<?php if (session()->get('level') == 3) { ?>
    <li class="has_sub">
        <a href="<?= site_url('layout/') ?>" class="waves-effect">
            <i class="mdi mdi-airplay"></i>
            <span> Hai
                <?=
                $u = (session()->get('username'));
                ?>
                <br><br>
                <img src="<?php echo base_url() . '/gambar/' . $u . '.jpg' ?>" height="160" width="150" alt="">
            </span>
        </a>
    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i><span>Transaksi</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">
            <li><a href="<?= site_url('kasmasuk') ?>">Kas Masuk</a></li>
            <li><a href="<?= site_url('kaskeluar/anakyatim') ?>">Kas Keluar Anak Yatim</a></li>
            <li><a href="<?= site_url('kaskeluar/tpq') ?>">Kas Keluar TPQ</a></li>
            <li><a href="<?= site_url('kaskeluar/sosial') ?>">Kas Keluar Sosial</a></li>
            <li><a href="<?= site_url('kaskeluar/mesjid') ?>">Kas Keluar Masjid</a></li>
        </ul>
    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i><span>Laporan</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">
            <li><a href="<?= site_url('kasmasuk/laporankasmasuk') ?>">Laporan Kas Masuk</a></li>
            <li><a href="<?= site_url('kasmasuk/laporanperperiode') ?>">Laporan Periode</a></li>
            <li><a href="<?= site_url('kasmasuk/laporanperperiodeperjeniskas') ?>">Laporan Per Jenis</a></li>
        </ul>
    </li>
    <li>
        <a href="<?= site_url('login/logout') ?>" class="waves-effect"><i class="fa fa-sign-out"></i><span>Logout<span class="badge badge-pill badge-primary float-right"></span>
    </li>
<?php } ?>
<?= $this->endSection('') ?>