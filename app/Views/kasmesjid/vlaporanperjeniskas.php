<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('isi') ?>
<div class="row">
    <div class="card col-sm-12">
        <div class="card-header">
            <h3 class="card-title">Laporan kas Masuk</h3>
        </div>
        <div class="card-body">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <form method="POST" action="<?php echo site_url('kasmasuk/cetaklaporanperperiodejeniskas') ?>">
                        <table>
                            <tr>
                                <div class="col-md">
                                    <div class="card card-solid">
                                        <div class="card-header" style="background-color: #ffc107">
                                            <div class="card-title text-center">
                                                <h5>Laporan Perjenis</h5>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group form-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input type="date" name="tanggal_awal" id="datepicker" class="form-control" placeholder="Pilih Tanggal Awal">
                                            </div>
                                            <div class="input-group form-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input type="date" name="tanggal_akhir" id="datepicker2" class="form-control" placeholder="Pilih Tanggal Awal">
                                            </div>
                                            <div class="input-group form-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <select name="jenis_kas" id="jenis_kas" class="form-control">
                                                    <option value="Anak Yatim">Anak Yatim</option>
                                                    <option value="TPQ">TPQ</option>
                                                    <option value="Sosial">Sosial</option>
                                                    <option value="Mesjid">Mesjid</option>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="col-xs">
                                                <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-print">Cetak</i></button>
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