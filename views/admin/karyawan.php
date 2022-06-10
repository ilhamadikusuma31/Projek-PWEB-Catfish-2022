
<?php require 'layout/header.php';?>      
<?php require 'layout/sidebar.php';?> 
<?php require 'layout/navbar.php';?> 

<?php 
//controller

$pesan;
require '../../model/karyawan.php';
require '../../model/jenisKelamin.php';
$data_karyawan = readKaryawan();
$data_jenisKelamin = readJenisKelamin();


if(isset($_POST["sbmt-tambah"])){
    $pesan = createKaryawan($_POST);
}

if(isset($_POST["sbmt-hapus"])){
    $id = $_POST['id_karyawan'];
    $pesan = deleteKaryawan($id);
}

if(isset($_POST["sbmt-edit"])){
    $pesan = editKaryawan($_POST);
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
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    
    <!-- tombol tambah, refresh, filter -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3">
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#tambahModal" role="button"><i class="bi bi-plus-circle me-1"></i></a>
                <a class="btn btn-success" id="btn-refresh" role="button"><i class="bi bi-arrow-clockwise"></i></a>
                <a class="btn btn-warning" id="btn-asc" role="button"><i class='bi bi-arrow-up-circle'></i></a>
                <a class="btn btn-warning" id="btn-desc" role="button"><i class='bi bi-arrow-down-circle'></i></a>
            </div>
            <div class="col-md-3">
                <select name="kotakFilterJenisKelamin" id="kotakFilterJenisKelamin" class="form-select form-select-sm" aria-label="Default select example">
                    <option value=""> Jenis Kelamin </option>
                    <?php foreach($data_jenisKelamin as $jk): ?>
                        <option value="<?= $jk['id']; ?>"> <?= $jk['nama']; ?> </option>
                    <?php endforeach ?>
                </select>
                </div> 
            <div class="col">
                <div class="row">
                    <input class="form-control me-2" placeholder="ketik kata kunci" aria-label="Search" id="kotakpencarian">
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row ms-1 me-1" id="dinamisData">
    <!-- data karyawan -->
      </div>
      <!-- /.container-fluid -->

      <div class="row mt-5 ms-1 me-1">
      <div class="col d-grid">
          <button class="btn btn-primary" type="button" id="btn-loadMore"><i class="bi bi-arrow-down-circle-fill me-1"></i>Muat Lagi</button>
      </div>


    <!--Tambah Modal-->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mau Nambah Karyawan?</h5>
                    <button class="tombolCancelModal btn" class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form id="formTambah" action="" method="POST">
                    <div class="mb-3">
                      <label for="nama_lengkap"class="form-label">Nama Lengkap</label>
                      <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" autocomplete="off"  required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="id_jenis_kelamin"class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="id_jenis_kelamin" name="id_jenis_kelamin" value='' required>
                          <option value="-" selected>-</option>
                          <?php foreach($data_jenisKelamin as $jk): ?>
                            <option value="<?= $jk['id']; ?>"><?= $jk['nama']; ?></option>
                          <?php endforeach?> 
                        </select>
                    </div>
                    <div class="mb-3">
                      <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                      <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                      <label for="alamat" class="form-label">Alamat</label>
                      <input type="text" class="form-control" name="alamat" id="alamat" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                      <label for="no_telpon" class="form-label">No Telpon</label>
                      <input type="number" class="form-control" name="no_telpon" id="no_telpon" autocomplete="off" required>
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
<script>
    let page = 4;
    $(document).ready(function () {

    $('#btn-refresh').on('click', function () {
        $('#dinamisData').load('../../model/ajax/karyawan.php')
    })

    $('#btn-asc').on('click', function () {
        $('#dinamisData').load('../../model/ajax/karyawan.php?asc=true&desc=false');
    })
    $('#btn-desc').on('click', function () {
        $('#dinamisData').load('../../model/ajax/karyawan.php?asc=false&desc=true');
    })

    $('#btn-loadMore').on('click', function () {
        $('#dinamisData').load('../../model/ajax/karyawan.php?next='+page)
        page += 2;
    }).trigger('click');

    $('#kotakpencarian').on('keydown', function () {
        $('#dinamisData').load('../../model/ajax/karyawan.php?keyword=' + $('#kotakpencarian').val());
    });

    $('#kotakFilterJenisKelamin').on('change', function () {
        $('#dinamisData').load('../../model/ajax/karyawan.php?jk=true&keyword=' + $('#kotakFilterJenisKelamin').val());
    });


});
</script>
<?php require 'layout/close.php'?>       