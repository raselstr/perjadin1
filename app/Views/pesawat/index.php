
<?= $this->extend('layout/default'); ?>

<?= $this->section('stylesheet'); ?>
   <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

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
      </div>
      <div class="col">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <div class="row">
              <h5 class="card-title"><?= $title; ?></h5>
            </div>
          </div>
          <div class="card-body">
            <div class="card-body">
              <table id="myTable1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="align-middle text-center">No</th>
                    <th class="align-middle text-center">Input SPJ</th>
                    <th class="align-middle text-center">Nomor SPT</th>
                    <th class="align-middle text-center">Nama Pegawai <br> NIP</th>
                    <th class="align-middle text-center">Uraian</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($spjpesawat['result'] as $key => $value) : ?>
                      <tr>
                        <td class="align-middle text-center"><?= $no++ ?></td>
                        <td class="align-middle text-center">
                          <div class="d-grid gap-2">
                            <button type="button" name="spj" id="spj" data-id="<?= $value->spjpesawat_id; ?>" data-idpelaksana="<?= $value->pelaksana_id; ?>" data-namapegawai="<?= $value->pegawai_nama; ?>" data-nospt="<?= $value->spt_nomor; ?>"class="btn btn-primary"  data-toggle="modal" data-target="#pesawatspj"><i class="fas fa-hand-point-right"></i></button>
                          </div>
                        </td>
                        <td class="align-middle"><?= $value->spt_nomor ?></td>
                        <td class="align-middle"><?= $value->pegawai_nama ?><br><?= $value->pegawai_nip ?></td>
                        <td class="align-middle"><?= $value->spt_uraian ?></td>
                      </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
    <div class="modal fade" id="pesawatspj" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">SPJ PESAWAT</h5>
          </div>
          
          <form action="<?= site_url("spjpesawat/create"); ?>" method="post" enctype="multipart/form-data" id="formpesawat">
          <?= csrf_field(); ?>
            <div class="modal-body">
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="hotel_id" name="hotel_id" value="" >
                    <input type="text" class="form-control" id="hotel_pelaksanaid" name="hotel_pelaksanaid" >
                    <input type="text" class="form-control" id="hotel_verif" name="hotel_verif" value="1" >
                    <input type="text" class="form-control" id="hotel_fotolama" name="hotel_fotolama" >
                    <input type="text" class="form-control" id="hotel_billlama" name="hotel_billlama" >
                  </div>
                </div>
                <div class="form-group row">
                  <label for="hotel_nospt" class="col-sm-4 col-form-label">Nomor SPT</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="hotel_nospt" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="hotel_namapegawai" class="col-sm-4 col-form-label">Nama Pegawai</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="hotel_namapegawai" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="spjpesawat_jenis" class="col-sm-4 col-form-label">Jenis Pesawat</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="spjpesawat_jenis" name="spjpesawat_jenis">
                    <div class="invalid-feedback errorspjpesawat_jenis"></div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="hotel_nokamar" class="col-sm-4 col-form-label">Nomor Kamar Hotel</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" id="hotel_nokamar" name="hotel_nokamar">
                    <div class="invalid-feedback errorhotel_nokamar"></div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="hotel_typekamar" class="col-sm-4 col-form-label">Type Kamar</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="hotel_typekamar" name="hotel_typekamar">
                    <div class="invalid-feedback errorhotel_typekamar"></div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="hotel_checkin" class="col-sm-4 col-form-label">Tanggal Checkin</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" name="hotel_checkin" id="hotel_checkin">
                    <div class="invalid-feedback errorhotel_checkin"></div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="hotel_checkout" class="col-sm-4 col-form-label">Tanggal Checkout</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" name="hotel_checkout" id="hotel_checkout">
                    <div class="invalid-feedback errorhotel_checkout"></div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="hotel_permlm" class="col-sm-4 col-form-label">Harga per Malam</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" id="hotel_permlm" name="hotel_permlm">
                    <div class="invalid-feedback errorhotel_permlm"></div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="hotel_totalharga" class="col-sm-4 col-form-label">Total Harga</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" id="hotel_totalharga" name="hotel_totalharga">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputFile" class="col-sm-4 col-form-label">Foto Hotel</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <input class="custom-file-input" type="file" name="hotel_foto" id="foto">
                      <label class="custom-file-label" for="custom-file-label" id="nama-foto">Pilih Foto</label>
                      <div class="invalid-feedback errorhotel_foto"></div>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputFile" class="col-sm-4 col-form-label">Scan PDF Bill Hotel</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                        <input class="custom-file-input" type="file" name="hotel_bill" id="scan">
                        <label class="custom-file-label" for="custom-file-label" id="nama-scan">Pilih Scan Bill PDF</label>
                        <div class="invalid-feedback errorhotel_bill"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-secondary batalhotel" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary simpanhotel">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
  <script>
    $(function () {
      $("#myTable1").DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": false,
        "autoWidth": false,
        "responsive": true,
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
      })
    });
  </script>
  <!-- <script>
    $(document).ready(function(){
      
       $('[data-target="#modalfoto"]').on('click', function(e) {
        e.preventDefault();
          var namafoto = $(this).data('filehotel');
          var imageUrl = "<?= base_url('image/hotel/') ?>" + namafoto
          $('#idmodalfoto').text(namafoto);
          // console.log(namafoto);
          var linkhotel = $('<img>').attr({
            'src': imageUrl,
            'alt': 'Deskripsi Gambar',
            'width': '100%',
            'height': '400'
          });

        $('#tampilfoto').html(linkhotel);
       });

       $('.tutupmodal').on('click', function(){
        location.reload();
       });
    });
  </script> -->
  <!-- <script>
    $(document).ready(function(){
      
       $('[data-target="#modalbill"]').on('click', function(e) {
        e.preventDefault();
          var namabill = $(this).data('filebill');
          var imageUrl = "<?= base_url('image/hotelbill/') ?>" + namabill
          $('#idmodalbill').text(namabill);
          // console.log(namafoto);
          var linkbill = $('<iframe>').attr({
            'src': imageUrl,
            'title': 'Deskripsi bill',
            'width': '100%',
            'height': '600',
            'style' : 'border:none;'
          });

        $('#tampilbill').html(linkbill);
       });

       $('.tutupmodal').on('click', function(){
        location.reload();
       });
    });
  </script> -->
  <script>
    $(document).ready(function(){
      $('[data-target="#pesawatspj"]').click(function() {
        var hotelid = $(this).data('id');
        var idpelaksana = $(this).data('idpelaksana');
        var namapegawai = $(this).data('namapegawai');
        var nospt = $(this).data('nospt');

        $('#hotel_id').val(hotelid);
        $('#hotel_pelaksanaid').val(idpelaksana);
        $('#hotel_namapegawai').val(namapegawai);
        $('#hotel_nospt').val(nospt);

        if (hotelid !== null) {
          $.ajax({
            type: "get",
            url: "<?= site_url('spjhotel/edit/'); ?>" + hotelid,
            // data: "data",
            dataType: "json",
            success: function (response) {
              console.log(response);
              $('#hotel_id').val(response.hotel_id);
              $('#hotel_fotolama').val(response.hotel_foto);
              $('#hotel_nama').val(response.hotel_nama);
              $('#hotel_nokamar').val(response.hotel_nokamar);
              $('#hotel_typekamar').val(response.hotel_typekamar);
              $('#hotel_checkin').val(response.hotel_checkin);
              $('#hotel_checkout').val(response.hotel_checkout);
              $('#hotel_permlm').val(response.hotel_permlm);
              $('#hotel_totalharga').val(response.hotel_totalharga);
              $('#nama-foto').text(response.hotel_foto);
              $('#nama-scan').text(response.hotel_bill);
              $('#hotel_billlama').val(response.hotel_bill);
              
              // Menampilkan nama file foto dan scan dengan ekstensinya
              // var namaFoto = response.hotel_foto.split('.').slice(0, -1).join('.');
              // var ekstensiFoto = response.hotel_foto.split('.').pop();
              // var namaScan = response.hotel_bill.split('.').slice(0, -1).join('.');
              // var ekstensiScan = response.hotel_bill.split('.').pop();

              // $('#nama-foto').text(namaFoto + '.' + ekstensiFoto);
              // $('#nama-scan').text(namaScan + '.' + ekstensiScan);
              $('#hotelspj').show();
            } 
          });
        } else {
          $('#hotel_nama').val('');
          $('#hotel_nokamar').val('');
          $('#hotel_typekamar').val('');
          $('#hotel_checkin').val('');
          $('#hotel_checkout').val('');
          $('#hotel_permlm').val('');
          $('#hotel_totalharga').val('');
          $('#nama-foto').text('');
          $('#nama-scan').text('');
          $('#hotelspj').show();
        }
      });

      $('#foto').on('change', function() {
          // Mengambil nama file yang dipilih
          var fileName = $(this).val().split('\\').pop();
          
          // Menampilkan nama file di console (opsional)
          console.log('Nama file:', fileName);

          // Melakukan apa pun yang Anda inginkan dengan nama file tersebut
          // Contohnya, menampilkan nama file di elemen dengan ID 'nama-foto'
          $('#nama-foto').text(fileName);
      });

      $('#scan').on('change', function() {
          // Mengambil nama file yang dipilih
          var fileName = $(this).val().split('\\').pop();
          
          // Menampilkan nama file di console (opsional)
          console.log('Nama file:', fileName);

          // Melakukan apa pun yang Anda inginkan dengan nama file tersebut
          // Contohnya, menampilkan nama file di elemen dengan ID 'nama-foto'
          $('#nama-scan').text(fileName);
      });
      

      $('#formpesawat').submit(function(e){
        e.preventDefault();
        var data = new FormData(this);
        // console.log(data);
  
        $.ajax({
          type: "post",
          url: $(this).attr('action'),
          data: data,
          processData: false,
          contentType: false,
          beforeSend:function(){
                $('.simpanhotel').attr('disabled', 'disabled');
                $('.simpanhotel').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function(){
                $('.simpanhotel').removeAttr('disabled');
                $('.simpanhotel').html('Simpan');
            },
          success: function (response) {
            console.log(response);
            if(response.error) {
              if(response.message.hotel_nama){
                      $('#hotel_nama').addClass('is-invalid');
                      $('.errorhotel_nama').html(response.message.hotel_nama);
                  } else {
                      $('#hotel_nama').removeClass('is-invalid');
                      $('.errorhotel_nama').html('');
                  }
              if(response.message.hotel_nokamar){
                      $('#hotel_nokamar').addClass('is-invalid');
                      $('.errorhotel_nokamar').html(response.message.hotel_nokamar);
                  } else {
                      $('#hotel_nokamar').removeClass('is-invalid');
                      $('.errorhotel_nokamar').html('');
                  }
              if(response.message.hotel_typekamar){
                      $('#hotel_typekamar').addClass('is-invalid');
                      $('.errorhotel_typekamar').html(response.message.hotel_typekamar);
                  } else {
                      $('#hotel_typekamar').removeClass('is-invalid');
                      $('.errorhotel_typekamar').html('');
                  }
              if(response.message.hotel_checkin){
                      $('#hotel_checkin').addClass('is-invalid');
                      $('.errorhotel_checkin').html(response.message.hotel_checkin);
                  } else {
                      $('#hotel_checkin').removeClass('is-invalid');
                      $('.errorhotel_checkin').html('');
                  }
              if(response.message.hotel_checkout){
                      $('#hotel_checkout').addClass('is-invalid');
                      $('.errorhotel_checkout').html(response.message.hotel_checkout);
                  } else {
                      $('#hotel_checkout').removeClass('is-invalid');
                      $('.errorhotel_checkout').html('');
                  }
              if(response.message.hotel_permlm){
                      $('#hotel_permlm').addClass('is-invalid');
                      $('.errorhotel_permlm').html(response.message.hotel_permlm);
                  } else {
                      $('#hotel_hargapermlm').removeClass('is-invalid');
                      $('.errorhotel_hargapermlm').html('');
                  }
              if(response.message.hotel_foto){
                      $('#foto').addClass('is-invalid');
                      $('.errorhotel_foto').html(response.message.hotel_foto);
                  } else {
                      $('#foto').removeClass('is-invalid');
                      $('.errorhotel_foto').html('');
                  }
              if(response.message.hotel_bill){
                      $('#scan').addClass('is-invalid');
                      $('.errorhotel_bill').html(response.message.hotel_bill);
                  } else {
                      $('#hotel_bill').removeClass('is-invalid');
                      $('.errorhotel_bill').html('');
                  }
            } else {
              console.log(response);
              Swal.fire({
                position: "center",
                icon: "success",
                title: response.message,
                showConfirmButton: false,
                timer: 2000
              }).then(function(){
                $('#hotelspj').hide('2000');
                location.reload();

              });
            } 
          },
          error: function(xhr, status, error) {
              // Tangani kesalahan jika terjadi
              console.error();
          }
        });
      });

      $('.batalhotel').on('click', function () {
        location.reload(); 
      });
    });

  </script>
<?= $this->endSection() ?>