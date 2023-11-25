
<?= $this->extend('layout/default'); ?>

<?= $this->section('stylesheet'); ?>
   <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
            <div class="card card-primary card-outline">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-8">
                    <h5 class="m-0"><?= $title; ?></h5>
                  </div>
                  <div class="col-sm-4">
                    
                  </div>
                </div>
              </div>
              <div class="flash-data" data-flashdata="<?= session()->getflashdata('info'); ?>"></div>

              <div class="card-body">
                <div class="card-body">
                <table id="myTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th rowspan="2" class="align-middle text-center">No</th>
                      <th rowspan="2" class="align-middle text-center">Pejabat Pemberi Tugas</th>
                      <th colspan="3" class="align-middle text-center">Data Perjalanan Dinas</th>
                      <th colspan="2" class="align-middle text-center">SPT</th>
                      <th rowspan="2" class="align-middle text-center">SPPD</th>
                    </tr>
                    <tr>
                      <th class="align-middle text-center">Uraian Perjalanan</th>
                      <th class="align-middle text-center">Lama Perjalanan</th>
                      <th class="align-middle text-center">Tempat Tujuan</th>
                      <th class="align-middle text-center">Kaban</th>
                      <th class="align-middle text-center">Staf</th>
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
                          <td class="align-middle text-center"> 
                            <?php 
                              $db = \Config\Database::connect();
                              $itemModel = new App\Models\PelaksanaModel;
                              $verif = new App\Models\SptModel;
                              $true = $itemModel->kabanpelaksana($value->spt_id);
                              // dd($true);
                              if (!empty($true) ) : ?>
                            <a href="<?= site_url('pelaksana/sptbupati/'.$value->spt_id); ?>" target="_blank" class="btn btn-warning bg-gradient-sm btn-primary">BUPATI</a>
                            ||
                            <a href="<?= site_url('pelaksana/sptsekda/'.$value->spt_id); ?>" target="_blank" class="btn btn-info bg-gradient-sm btn-primary">SEKDA</a>
                            <?php else : ?>
                              <i>Tidak ada</i>
                            <?php endif ?>
                          </td>
                          <?php if ($value->spt_verif == '0') : ?>
                            <td class="align-middle text-center">
                              <a href="<?= site_url('pelaksana/sptpdf/'.$value->spt_id); ?>" target = "_blank" id="myLink" class="btn btn-icon bg-gradient-sm btn-primary"><i class="fas fa-print"></i></a>
                            </td>
                            <td class="align-middle text-center">
                              <a href="<?= site_url('pelaksana/sppdpdf/'.$value->spt_id); ?>" target = "_blank" id="myLinksppd" class="btn btn-icon bg-gradient-sm btn-success"><i class="fas fa-print"></i></a>
                            </td>
                            <?php else : ?>
                              <td class="align-middle text-center">
                              <a href="<?= site_url('pelaksana/sptpdf/'.$value->spt_id); ?>" target="_blank" id="myLink" class="btn btn-block btn-outline-secondary btn-sm">Disetujui</a>
                            </td>
                            <td class="align-middle text-center">
                              <a href="<?= site_url('pelaksana/sppdpdf/'.$value->spt_id); ?>" target="_blank" class="btn btn-block btn-outline-secondary btn-sm">Disetujui</i></a>
                            </td>
                            <?php endif ?>
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

   
<?= $this->endSection() ?>

<?= $this->section('script') ?>
  <script>
    $(function () {
      $("#myTable").DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      })
    });
  </script>
  <script>
    
  </script>
<?= $this->endSection() ?>