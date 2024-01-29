<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('isi') ?>

<head>
    <link href="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
</head>

<div class="col-sm-12">
    <div class="page-content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h4 class="mt-0 header-tittle text-center">Data Kas Masuk</h4>
                    </div>
                    <div class="card-body">

                        <div class="col-md-12">
                            <button type="button" class="btn btn-info m-b-10 m-l-10 waves-effect waves-light" data-target="#addModal" data-toggle="modal">
                                <i class="fa fa-plus-circle m-r-5"></i>Tambah Data</button>
                        </div>
                        <br>
                        <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-sm table-striped" id="datapengurus">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Kas Masuk</th>
                                                <th>Jenis Kas</th>
                                                <th>Donatur</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $no = 0;
                                            $total = 0;
                                            foreach ($kasmasuk as $val) {
                                                $no++; ?>
                                                <tr role="row" class="odd">
                                                    <td><?= $no; ?></td>
                                                    <td><?= $val['id_kas_masjid'] ?></td>
                                                    <td><?= $val['tanggal'] ?></td>
                                                    <td><?= $val['ket'] ?></td>
                                                    <td><?= $val['kas_masuk'] ?></td>
                                                    <td><?= $val['jenis_kas'] ?></td>
                                                    <td><?= $val['nama'] ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-sm btn-edit" data-idkas="<?= $val['id_kas_masjid']; ?>" data-tanggal="<?= $val['tanggal'] ?>" data-ket="<?= $val['ket'] ?> " data-kas_masuk="<?= $val['kas_masuk'] ?>" data-jenis_kas="<?= $val['jenis_kas'] ?>" data-iddonatur="<?= $val['iddonaturmasjid'] ?>"  data-nama="<?= $val['nama'] ?>">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" cLass="btn btn-danger btn-sm btn-delete" data-id_kas_masjid="<?= $val['id_kas_masjid']; ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        <tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div> <!--end row-->
    </div>
</div>

<!-- TAMBAH DATA -->
<form action="/kasmasuk/save" method="post">
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4> Periksa Entrian Form Anda<h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                    <button type="button" id="addModal" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                    </button>
        </div>
    <?php endif; ?>
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kas Masuk</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>Tanggal</label>
                        <input type="date" class="form-control " name="tanggal" value="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Donatur</label>
                                    <button type="button" data-toggle="modal" data-target="#modal_kasmasuk" class="btn btn-xs btn-primary">Donatur</button>
                                </div>
                            </div>&nbsp; &nbsp;
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="iddonatur" readonly id="iddonatur" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Donatur</label>
                                    <input type="text" readonly name="nama" id="nama" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>Keterangan</label>
                        <input type="text" class="form-control " name="keterangan">
                    </div>
                    <div class="col-md-12">
                        <label>Kas Masuk</label>
                        <input type="number" class="form-control " name="kasmasuk">
                    </div>
                    <div class="col-md-12">
                        <label>Jenis Kas</label>
                        <select name="jeniskas" id="jeniskas" class="form-control">
                            <option value="Anak Yatim">Anak Yatim</option>
                            <option value="TPQ">TPQ</option>
                            <option value="Sosial">Sosial</option>
                            <option value="Mesjid">Mesjid</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- HAPUS DATA -->
<form action="/kasmasuk/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Yakin Menghapus Data Ini?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- edit modal -->
<form action="/kasmasuk/update" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kas Masuk</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" class="id">
                    <div class="col-md-12">
                        <label>Tanggal</label>
                        <input type="date" class="form-control tanggal" name="tanggal" value="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Donatur</label>
                                    <button type="button" data-toggle="modal" data-target="#modal_kasmasuk" class="btn btn-xs btn-primary">Donatur</button>
                                </div>
                            </div>&nbsp; &nbsp;
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="iddonatur" readonly id="iddonatur" class="form-control iddonatur idd">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Donatur</label>
                                    <input type="text" readonly name="nama" id="nama" class="form-control nama nm">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>Keterangan</label>
                        <input type="text" class="form-control keterangan" name="keterangan">
                    </div>
                    <div class="col-md-12">
                        <label>Kas Masuk</label>
                        <input type="number" class="form-control kasmasuk" name="kasmasuk">
                    </div>

                    <div class="col-md-12">
                        <label>Jenis Kas</label>
                        <select name="jeniskas" id="jeniskas" class="form-control jeniskas">
                            <option value="Anak Yatim">Anak Yatim</option>
                            <option value="TPQ">TPQ</option>
                            <option value="Sosial">Sosial</option>
                            <option value="Mesjid">Mesjid</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>s
        </div>
    </div>
</form>

<div class="modal fade" id="modal_kasmasuk">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Donatur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama Donatur</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0; 
                        foreach ($data_donatur as $d) :
                            $no++; ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?= $d->iddonatur ?></td>
                                <td><?= $d->nama ?></td>
                                <td><?= $d->nohp ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="return pilih_donatur('<?= $d->iddonatur ?>','<?= $d->nama ?>')">
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.btn-edit').on('click', function() {
        const id = $(this).data('idkas');
        const tanggal = $(this).data('tanggal');
        const ket = $(this).data('ket');
        const kasmasuk = $(this).data('kas_masuk');
        const jeniskas = $(this).data('jenis_kas');
        const iddonatur = $(this).data('iddonatur');
        const namaa = $(this).data('nama');


        $('.id').val(id);
        $('.tanggal').val(tanggal);
        $('.keterangan').val(ket);
        $('.kasmasuk').val(kasmasuk);
        $('.jeniskas').val(jeniskas);
        $('.nm').val(namaa);
        $('.idd').val(iddonatur).trigger('change');
        $('#editModal').modal('show');
    });

    $('.btn-delete').on('click', function() {
        const id = $(this).data('id_kas_masjid');
        $('.id').val(id);q
        $('#deleteModal').modal('show');
    });

    $(document).ready(function() {
        $('#datapengurus').DataTable();
    });

    function pilih_donatur(id, nama) {
        $('#iddonatur').val(id);
        $('#nama').val(nama);
        $('.iddonatur').val(id);
        $('.nama').val(nama);
        $('#modal_kasmasuk').modal().hide();
    }
</script>
<?= $this->endSection('') ?>