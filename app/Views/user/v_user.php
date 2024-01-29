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
            <h4 class="mt-0 header-tittle text-center">Data User</h4>
          </div>
          <div class="card-body">

            <div class="col-md-12">
              <button type="button" class="btn btn-sm btn-primary" data-target="#addModal" data-toggle="modal">Tambah Data</button>
            </div>
            <br>
            <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
              <div class="row">
                <div class="col-sm-12">
                  <table class="table table-sm table-striped" id="datauser">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 0;
                      foreach ($user as $val) {
                        if ($val['level'] == '1') {
                          $role = 'Admin';
                        } else if ($val['level'] == '2') {
                          $role = 'Donatur';
                        } else if ($val['level'] == '3') {
                          $role = 'Bendahara';
                        }
                        $no++; ?>
                        <tr role="row" class="odd">
                          <td><?= $no; ?></td>
                          <td><?= $val['id_user'] ?></td>
                          <td><?= $val['nama_user'] ?></td>
                          <td><?= $val['email'] ?></td>
                          <td><?= $role ?></td>
                          <td style="display: flex; gap: 4px">

                            <button type="button" class="btn btn-info btn-sm btn-edit" data-id_user="<?= $val['id_user']; ?>" data-nama="<?= $val['nama_user'] ?>" data-email="<?= $val['email'] ?> " data-password="<?= $val['password'] ?>" data-level="<?= $val['level'] ?>">
                              <i class="fa fa-tags"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm btn-delete" data-id_user="<?= $val['id_user']; ?>">
                              <i class="fa fa-trash"></i>
                            </button>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
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
<form action="/user/save" method="post">
  <?php if (!empty(session()->getFlashdata('error'))) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <h5> Periksa Entrian Form Anda<h5>
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
          <h5 class="modal-title" id="exampleModalLabel">User</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <label>ID</label>
            <input type="text" class="form-control" name="id">
          </div>
          <div class="col-md-12">
            <label>Nama User</label>
            <input type="text" class="form-control" name="namauser">
          </div>
          <div class="col-md-12">
            <label>email</label>
            <input type="text" class="form-control" name="email">
          </div>
          <div class="col-md-12">
            <label>password</label>
            <input type="password" class="form-control" name="password">
          </div>
          <div class="col-md-12">
            <label>Level</label>
            <select name="level" id="level" class="form-control">
              <option value="">Pilih Hak Akses</option>
              <option value="1">Admin</option>
              <option value="2">Donatur</option>
              <option value="3">Bendahara</option>
            </select>
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
<!-- HAPUS DATA -->
<form action="/user/delete" method="post">
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Apakah Yakin Menghapus Data Ini?</p>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id" class="id">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Yes</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- edit modal -->
<form action="/user/update" method="post">
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">User</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <label>ID</label>
            <input type="text" class="form-control id" name="id">
          </div>
          <div class="col-md-12">
            <label>Nama User</label>
            <input type="text" class="form-control namauser" name="namauser">
          </div>
          <div class="col-md-12">
            <label>email</label>
            <input type="text" class="form-control email" name="email">
          </div>
          <div class="col-md-12">
            <label>password</label>
            <input type="text" class="form-control password" name="password">
          </div>
          <div class="col-md-12">
            <label>Level</label>
            <input type="text" class="form-control level" name="level">
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
    const id = $(this).data('id_user');
    const namauser = $(this).data('nama');
    const email = $(this).data('email');
    const password = $(this).data('password');
    const level = $(this).data('level');

    $('.id').val(id);
    $('.namauser').val(namauser);
    $('.email').val(email);
    $('.password').val(password);
    $('.level').val(level).trigger('change');
    $('#editModal').modal('show');

  });
  $('.btn-delete').on('click', function() {
    const id = $(this).data('id_user');
    $('.id').val(id);
    $('#deleteModal').modal('show');
  });
  $(document).ready(function() {
    $('#datauser').DataTable();
  });
</script>
<?= $this->endSection('') ?>