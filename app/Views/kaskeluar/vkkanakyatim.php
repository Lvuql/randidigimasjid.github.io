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
                        <h4 class="mt-0 header-tittle text-center">Data Kas Keluar Anak Yatim</h4>
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
                                                <th>Kas Keluar</th>
                                                <th>Agenda</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $no = 0;
                                            $total = 0;
                                            foreach ($kaskeluar as $val) {
                                                $no++; ?>
                                                <tr role="row" class="odd">
                                                    <td><?= $no; ?></td>
                                                    <td><?= $val['id_kas_masjid'] ?></td>
                                                    <td><?= $val['tanggal'] ?></td>
                                                    <td><?= $val['ket'] ?></td>
                                                    <td><?= $val['kas_keluar'] ?></td>
                                                    <td><?= $val['nama_agenda'] ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-sm btn-edit" data-idkegiatan="<?= $val['id_kas_masjid']; ?>" data-tanggal="<?= $val['tanggal'] ?>" data-ket="<?= $val['ket'] ?> " data-kas_keluar="<?= $val['kas_keluar'] ?>" data-idagenda="<?= $val['id_agenda'] ?>" data-nama="<?= $val['nama_agenda'] ?>">
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
<form action="/kaskeluar/save" method="post">
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
                    <h5 class="modal-title" id="exampleModalLabel">Kas Keluar Anak Yatim</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 mb-2">
                        <?php
                        $totalmasuk = 0;
                        foreach ($anakyatim as $val) {
                            $totalmasuk += $val['totalmasuk'];
                        }
 
                        $totalkeluar = 0;
                        foreach ($anakyatimk as $val) {
                            $totalkeluar += $val['totalkeluar'];
                        }

                        $sisaKas = $totalmasuk - $totalkeluar;
                        ?>

                        <div class="row">
                            <label for="" class="col-md-5">Sisa Kas : <?= $sisaKas ?? 0; ?></label>
                            <input type="hidden" name="sisakas" id="sisakas" value="<?= $sisaKas ?? 0; ?>">
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Tanggal</label>
                        <input type="date" class="form-control " name="tanggal" value="<?= date('Y-m-d') ?>">
                    </div>

                    <div class="col-md-12 mb-2">
                        <label>Keterangan</label>
                        <input type="text" class="form-control " name="keterangan">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Jumlah</label>
                        <input type="number" class="form-control " name="kaskeluar">
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>agenda</label>
                                    <button type="button" data-toggle="modal" data-target="#modal_kkanakyatim" class="btn btn-xs btn-primary">Agenda</button>
                                </div>
                            </div>&nbsp; &nbsp;
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="idagenda" readonly id="idagenda" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kegiatan</label>
                                    <input type="text" readonly name="nama" id="nama" class="form-control">
                                </div>
                            </div>
                        </div>
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
<form action="/kaskeluar/delete" method="post">
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
<!-- EDIT MODAL -->
<form action="/kaskeluar/update" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kas Keluar Anak Yatim</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" class="id">
                    <div class="col-md-12 mb-2">
                        <?php
                        $totalmasuk = 0;
                        foreach ($anakyatim as $val) {
                            $totalmasuk += $val['totalmasuk'];
                        }
 
                        $totalkeluar = 0;
                        foreach ($anakyatimk as $val) {
                            $totalkeluar += $val['totalkeluar'];
                        }

                        $sisaKas = $totalmasuk - $totalkeluar;
                        ?>

                        <div class="row">
                            <label for="" class="col-md-5">Sisa Kas : <?= $sisaKas ?? 0; ?></label>
                            <input type="hidden" name="sisakas" id="sisakas" value="<?= $sisaKas ?? 0; ?>">
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Tanggal</label>
                        <input type="date" class="form-control tanggal" name="tanggal" value="<?= date('Y-m-d') ?>">
                    </div>

                    <div class="col-md-12 mb-2">
                        <label>Keterangan</label>
                        <input type="text" class="form-control keterangan" name="keterangan">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Jumlah</label>
                        <input type="number" class="form-control kaskeluar" name="kaskeluar">
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>agenda</label>
                                    <button type="button" data-toggle="modal" data-target="#modal_kkanakyatim" class="btn btn-xs btn-primary">Agenda</button>
                                </div>
                            </div>&nbsp; &nbsp;
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="idagenda" readonly id="idagenda" class="form-control idagenda">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kegiatan</label>
                                    <input type="text" readonly name="nama" id="nama" class="form-control nama">
                                </div>
                            </div>
                        </div>
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

<div class="modal fade" id="modal_kkanakyatim">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Kegiatan</h4>
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
                            <th>Nama Kegiatan</th>
                            <th>tanggal</th>
                            <th>jam</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data_anakyatim as $d) :
                            $no++; ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?= $d->id_agenda ?></td>
                                <td><?= $d->nama_agenda ?></td>
                                <td><?= $d->tanggal ?></td>
                                <td><?= $d->jam ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="return pilih_agenda('<?= $d->id_agenda ?>','<?= $d->nama_agenda ?>')">
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
        const id = $(this).data('idkegiatan');
        const tanggal = $(this).data('tanggal');
        const ket = $(this).data('ket');
        const kaskeluar = $(this).data('kas_keluar');
        const idagenda = $(this).data('idagenda');
        const namaa = $(this).data('nama');


        $('.id').val(id);
        $('.tanggal').val(tanggal);
        $('.keterangan').val(ket);
        $('.kaskeluar').val(kaskeluar);
        $('.nama').val(namaa);
        $('.idagenda').val(idagenda).trigger('change');
        $('#editModal').modal('show');
    });

    $('.btn-delete').on('click', function() {
        const id = $(this).data('id_kas_masjid');
        $('.id').val(id);
        $('#deleteModal').modal('show');
    });

    $(document).ready(function() {
        $('#datapengurus').DataTable();
    });

    function pilih_agenda(id, nama) {
        $('#idagenda').val(id);
        $('#nama').val(nama);
        $('.idagenda').val(id);
        $('.nama').val(nama);
        $('#modal_kkanakyatim').modal().hide();
    }
</script>
<?= $this->endSection('') ?>