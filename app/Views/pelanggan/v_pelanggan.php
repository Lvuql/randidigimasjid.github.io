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
            <h4 class="mt-0 header-tittle text-center">Data Pelanggan</h4>
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
                  <table class="table table-sm table-striped" id="datapelanggan">
                    <thead>
                      <tr role="row">
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 0;
                      foreach ($pelanggan as $val) {
                        $no++; ?>
                        <tr role="row" class="odd">
                          <td><?= $no; ?></td>
                          <td><?= $val['id'] ?></td>
                          <td><?= $val['nama'] ?></td>
                          <td><?= $val['nohp'] ?></td>
                          <td><?= $val['alamat'] ?></td>
                          <td>
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
<form action="/pelanggan/save" method="post">
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
          <h5 class="modal-title" id="exampleModalLabel">Pelanggan</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <label>ID</label>
            <input type="text" class="form-control" name="id">
          </div>
          <div class="col-md-12">
            <label>Nama Pelanggan</label>
            <input type="text" class="form-control" name="nama">
          </div>
          <div class="col-md-12">
            <label>No HP</label>
            <input type="text" class="form-control" name="nohp">
          </div>
          <div class="col-md-12">
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>

<script>

  $(document).ready(function() {
    $('#datapelanggan').DataTable();
  });
</script>
<?= $this->endSection('') ?>