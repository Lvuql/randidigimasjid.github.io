<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('isi') ?>

<div class="row">
    <div class="card col-sm-12">
        <div class="card-header">
            <h3 class="card-title">Laporan Kas Masuk</h3>

        </div>
        <div class="card-body">
            <div class="row, no-gutters">
                <div class="col-md-5">
                    <form method="POST" action="<?php echo site_url('kasmasuk/cetaklaporanperperiode') ?>">
                        <table>
                            <tr>
                                <div class="col-md">
                                    <div class="card card-solid">
                                        <div class="card-header" style="background-color: #ffc107">
                                            <div class="card-title text-center">
                                                <h5>Laporan Kas Perperiode</h5>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group form-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input type="date" name="tanggal_awal" id="datepicker" class="form-control" placeholder="pilih tanggal awal">
                                            </div>
                                            <div class="input-group form-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input type="date" name="tanggal_akhir" id="datepicker2" class="form-control" placeholder="pilih tanggal akhir">
                                            </div>
                                            <br>
                                            <div class="col-xs">
                                                <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-print"></i> Cetak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('') ?>