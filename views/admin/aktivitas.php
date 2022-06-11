
<?php require 'layout/header.php';?>      
<?php require 'layout/sidebar.php';?> 
<?php require 'layout/navbar.php';?> 

<?php 
//controller

$pesan;
require '../../model/aktivitas.php';

require '../../model/jenisAktivitas.php';
require '../../model/karyawan.php';
require '../../model/kolam.php';

$data_aktivitas = readAktivitas();



if(isset($_POST["sbmt-tambah"])){
    $pesan = createAktivitas($_POST);
}

if(isset($_POST["sbmt-hapus"])){
    $id = $_POST['id_aktivitas'];
    $pesan = deleteAktivitas($id);
}

if(isset($_POST["sbmt-edit"])){
    $pesan = editAktivitas($_POST);
}
?>

<!-- MULAI CONTENT -->
<div class="container-fluid">

    <?php if(isset($pesan)): ?>
        <?php 
            if($pesan == "Data Berhasil Ditambah" or $pesan == "Data Berhasil Dihapus" or $pesan == "Data Berhasil Diedit"){
                $warna = 'alert-success';
            }
            else{
                $warna = 'alert-danger';
                
            }
            
        ?>
        <div class="alert <?= $warna; ?> alert-dismissible fade show" role="alert">
            <div class="h6"><?= $pesan; ?></div>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Aktivitas</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

</div>
  <!-- tombol tambah, refresh, filter -->
  <div class="container mt-3">
        <div class="row">
            <div class="col-md-3">
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#tambahModal" role="button"><i class="bi bi-plus-circle me-1"></i></a>
                <a class="btn btn-success" id="btn-refresh" role="button"><i class="bi bi-arrow-clockwise"></i></a>

            </div>
        </div>
    </div>
    <!-- Content Row -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <div class="row m-3" id="dinamisData">

    </div>

    <!-- /.container-fluid -->

    <!--Tambah Modal-->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mau Nambah Aktivitas?</h5>
                    <button class="tombolCancelModal btn" class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form id="formTambah" action="" method="POST">
                    <div class="mb-3">
                      <label for="tanggal"class="form-label">Tanggal</label>
                      <input type="date" class="form-control" name="tanggal" id="nama_lengkap" autocomplete="off"  required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="id_jenis_aktivitas"class="form-label">Jenis</label>
                        <select class="form-select" id="id_jenis_aktivitas" name="id_jenis_aktivitas" value='' required>
                          <option value="-" selected>-</option>
                          <?php $nama_jenis_all = readJenisAktivitasAll() ?>
                          <?php foreach($nama_jenis_all as $d): ?>
                            <option value="<?= $d['id']; ?>"><?= $d['nama']; ?></option>
                          <?php endforeach?> 
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_karyawan"class="form-label">Karyawan</label>
                        <select class="form-select" id="id_karyawan" name="id_karyawan" value='' required>
                          <option value="-" selected>-</option>
                          <?php $nama_karyawan_all = readKaryawanAll() ?>
                          <?php foreach($nama_karyawan_all as $d): ?>
                            <option value="<?= $d['id']; ?>"><?= $d['nama_lengkap']; ?></option>
                          <?php endforeach?> 
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_kolam"class="form-label">Kolam</label>
                        <select class="form-select" id="id_kolam" name="id_kolam" value='' required>
                          <option value="-" selected>-</option>
                          <?php $nama_kolam_all = readKolamAll() ?>
                          <?php foreach($nama_kolam_all as $d): ?>
                            <option value="<?= $d['id']; ?>"><?= $d['nama']; ?></option>
                          <?php endforeach?> 
                        </select>
                    </div>
                    
                  </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <!-- <button id="tombolTambahModal" form="formTambah" class="btn btn-primary" data-backdrop="false" data-dismiss="modal" name="sbmt" onclick="return confirm('Apakah Anda yakin ingin menambah barang ini?')">Submit</button> -->
                    <a id="tombolTambahModal" class="btn btn-primary" href="#" data-toggle="modal" data-target="#konfirmTambahModal" role="button">Tambah</a>
                </div>
            </div>
        </div>
    </div>

    <!-- confirm tambah modal -->
    <div class="modal fade" id="konfirmTambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">yakin ingin menambahkan ini?</h5>
                    <button class="close tombolCancelModal btn" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">pilih "konfirm" jika kamu yakin</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button id="tombolKonfirmTambahModal" form="formTambah"  name="sbmt-tambah" class="btn btn-primary" href="#">konfirm</button>
                </div>
            </div>
        </div>
    </div>


<?php require 'layout/footer.php'?>       
<?php require 'layout/script.php'?>  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.9/css/dataTables.responsive.css"></script>
<script>
$(document).ready( function () {
    $('#tabelAktivitas').DataTable();
} );
$('#tabelAktivitas').DataTable( {
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate
            }
        }
    } );
</script>
<script>
    let page = 4;
    $(document).ready(function () {

    $('#btn-refresh').on('click', function () {
        $('#dinamisData').load('../../model/ajax/aktivitas.php')
    }).trigger('click');

    $('#btn-asc').on('click', function () {
        $('#dinamisData').load('../../model/ajax/aktivitas.php?asc=true&desc=false');
    })
    $('#btn-desc').on('click', function () {
        $('#dinamisData').load('../../model/ajax/aktivitas.php?asc=false&desc=true');
    })

});
</script>
<?php require 'layout/close.php'?>       