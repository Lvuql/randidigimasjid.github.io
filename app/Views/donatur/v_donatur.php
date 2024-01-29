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
                        <h4 class="mt-0 header-tittle text-center">Data Donatur</h4>
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
                                    <table class="table table-sm table-striped" id="datadonatur">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>ID Donatur</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>NoHP</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($donatur as $val) {
                                                $no++; ?>
                                                <tr role="row" class="odd">
                                                    <td><?= $no; ?></td>
                                                    <td><?= $val['iddonatur'] ?></td>
                                                    <td><?= $val['nama'] ?></td>
                                                    <td><?= $val['alamat'] ?></td>
                                                    <td><?= $val['nohp'] ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-sm btn-edit" data-iddonatur="<?= $val['iddonatur']; ?>" data-nama="<?= $val['nama']; ?>" data-alamat="<?= $val['alamat']; ?>" data-nohp="<?= $val['nohp']; ?>">
                                                            <i class="fa fa-edit"></i>
                                                        </button>

                                                        <button type="button" cLass="btn btn-danger btn-sm btn-delete" data-iddonatur="<?= $val['iddonatur']; ?>">
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
<form action="/donatur/save" method="post">
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
                    <h5 class="modal-title" id="exampleModalLabel">Donatur</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>ID Donatur</label>
                        <input type="text" class="form-control" name="id">
                    </div>
                    <div class="col-md-12">
                        <label>Nama Donatur</label>
                        <input type="text" class="form-control" name="namadonatur">
                    </div>
                    <div class="col-md-12">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat">
                    </div>
                    <div class="col-md-12">
                        <label>No HP</label>
                        <input type="text" class="form-control" name="nohp">
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
<form action="/donatur/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Donatur</h5>
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
<form action="/donatur/update" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Edit Data Donatur</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>ID</label>
                        <input type="text" class="form-control id" name="id">
                    </div>
                    <div class="col-md-12">
                        <label>Nama Donatur</label>
                        <input type="text" class="form-control namadonatur" name="namadonatur">
                    </div>
                    <div class="col-md-12">
                        <label>Alamat</label>
                        <input type="text" class="form-control alamat" name="alamat">
                    </div>
                    <div class="col-md-12">
                        <label>No HP</label>
                        <input type="text" class="form-control nohp" name="nohp">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $('.btn-edit').on('click', function() {
        const id = $(this).data('iddonatur');
        const namadonatur = $(this).data('nama');
        const alamat = $(this).data('alamat');
        const nohp = $(this).data('nohp');

        $('.id').val(id);
        $('.namadonatur').val(namadonatur);
        $('.alamat').val(alamat);
        $('.nohp').val(nohp).trigger('change');
        $('#editModal').modal('show');

    });

    $('.btn-delete').on('click', function() {
        const id = $(this).data('iddonatur');
        $('.id').val(id);
        $('#deleteModal').modal('show');
    });

    $(document).ready(function() {
        $('#datadonatur').DataTable();
    });
</script>
<?= $this->endSection('') ?>