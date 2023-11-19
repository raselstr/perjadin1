<?= $this->extend('layout/default'); ?>

<?= $this->section('stylesheet'); ?>
   <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- Theme style -->
<?= $this->endSection(); ?>

<?= $this->section('scriptplugin'); ?>
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <!-- SweetAlert2 -->
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="plugins/toastr/toastr.min.js"></script>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <?= $this->include('layout/contenheader'); ?>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
                  <?= $this->include('layout/infobox'); ?>
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col">
            <div class="card card-secondary">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-8">
                    <h5 class="m-0"><?= $title; ?></h5>
                    <div class="flash-data" data-flashdata="<?= session()->getflashdata('info'); ?>"></div>
                  </div>
                  <div class="col-sm-4">
                    <!-- <button type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#modal-default">
                      Tambah Data Pegawai
                    </button> -->
                  </div>
                </div>
              </div>
              

              <div class="card-body">
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th rowspan="2" class="align-middle text-center">No</th>
                      <th rowspan="2" class="align-middle text-center">Pejabat Pemberi Tugas</th>
                      <th colspan="3" class="align-middle text-center">Data Perjalanan Dinas</th>
                      <th rowspan="2" class="align-middle text-center">Transportasi yang digunakan</th>
                      <th rowspan="2" class="align-middle text-center">No. SPT <br> SPD</th>
                      <th rowspan="2" class="align-middle text-center">Tanggal</th>
                      <th rowspan="2" class="align-middle text-center">Status</th>
                    </tr>
                    <tr>
                      <th class="align-middle text-center">Uraian Perjalanan</th>
                      <th class="align-middle text-center">Lama Perjalanan</th>
                      <th class="align-middle text-center">Tempat Tujuan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      foreach ($spt as $key => $value) { ?>
                        <tr>
                          <td class="align-middle text-center"><?= $no++ ?></td>
                          <td class="align-middle"><?= $value->spt_pjb_tugas ?></td>
                          <td class="align-middle"><?= $value->spt_uraian ?></td>
                          <td class="align-middle text-center"><?= $value->spt_lama ?></td>
                          <td class="align-middle"><?= $value->lokasiperjadin_nama ?></td>
                          <td class="align-middle"><?= $value->spt_transport ?></td>
                          <td class="align-middle text-center"><?= $value->spt_nomor ?><br><?= $value->sppd_nomor ?></td>
                          <td class="align-middle text-center"><?= $value->spt_tgl ?></td>
                          <td class="align-middle text-center">
                            <?php if ($value->spt_verif == '1') : ?>
                              <button type="button" class="btn btn-block btn-outline-success" disabled>Disetujui</button>
                            <?php else : ?>
                              <button type="button" class="btn btn-block btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter">Belum Disetujui</button>
                            <?php endif ?>
                          </td>
                        </tr>
                      <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  </div>
    <!-- /.content -->

   <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Nomor dan Tanggal Surat Perintah Tugas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <div id="errorContainer">
                        <?php 
                        $errors = session()->getFlashdata('validation');
                        if (!empty($errors)) : ?>
                            <!-- Display validation errors -->
                            <?php foreach ($errors as $error) : ?>
                                <p><?= esc($error) ?></p>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                        
        <form id= "myForm" action="<?= site_url('spt/update/'.$value->spt_id) ?>" method="post">
        <?php csrf_field() ?>
        <div class="modal-body">
          <div class="form-group">
            <!-- <label for="exampleInputBorder">id</code></label> -->
            <input type="text" name="spt_id" value="<?= $value->spt_id ?>" hidden>
            <input type="text" name="spt_verif" value="1" hidden>
          </div>
          <div class="form-group">
            <label for="exampleInputBorder">Nomor Surat Perintah Tugas</code></label>
            <input type="text" class="form-control form-control-border" name="spt_nomor" placeholder="Input Nomor SPT">
            <div class="invalid-feedback">
              <?= isset($errors['spt_nomor']) ? $errors['spt_nomor'] : null ; ?>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputBorder">Nomor Surat Perjalanan Dinas</code></label>
            <input type="text" class="form-control form-control-border" name="sppd_nomor" placeholder="Input Nomor SPT">
          </div>
          <div class="form-group">
            <label for="exampleInputBorder">Tanggal Surat Perintah Tugas</code></label>
            <input type="date" class="form-control form-control-border" name="spt_tgl" placeholder="Masukkan Tanggal SPT">
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
        
      </div>
    </div>
  </div>
<!-- endModal -->


<?= $this->endSection() ?>

<?= $this->section('script') ?>
  <script>

    $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  </script>
<script>
    $(document).ready(function() {
        $('#myForm').submit(function(e) {
            e.preventDefault();

            var nomorSurat = $('#spt_nomor');
            // var tanggalMulai = $('#tanggal_mulai');
            // var tanggalSelesai = $('#tanggal_selesai');
            var errorContainer = $('#errorContainer');
            errorContainer.empty(); // Clear previous error messages

            // ... your validation logic ...

            // If there are validation errors
            if (errorContainer.length > 0) {
                var errorMessage = "<ul>";
                for (var i = 0; i < errors.length; i++) {
                    errorMessage += "<li>" + errors[i] + "</li>";
                }
                errorMessage += "</ul>";
                errorContainer.html(errorMessage);

                // Open modal if there are errors
                $('#exampleModalCenter').addClass('show'); // Add 'show' class to prevent modal from closing
                $('#exampleModalCenter').modal('show'); // Show modal
            } else {
                // Submit the form if validation passes
                this.submit();
            }
        });

        $('#exampleModalCenter').on('hide.bs.modal', function (e) {
            if (!$(this).hasClass('show')) {
                return e.preventDefault();
            }
        });
    });
</script>

<?= $this->endSection() ?>