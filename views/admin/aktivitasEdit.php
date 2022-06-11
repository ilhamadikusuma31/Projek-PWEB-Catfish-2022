<?php $id = $_GET['id']; ?>
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

$d = getAktivitasById($id);

if(isset($_POST["sbmt-edit"])){
    $pesan = editAktivitas($_POST);
    // header('Location :aktivitas.php');
    // exit;
}
?>


<!-- Edit Modal-->
<div class="container">
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
    <div class="row">
        <form id="editAktivitas" action="" method="post">
            <input type="hidden" name="id" value="<?= $d['id']; ?>">
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= $d['tanggal']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="id_jenis_aktivitas" class="form-label">Jenis Aktivitas</label>
                <select class="form-select" name="id_jenis_aktivitas" id="id_jenis_aktivitas" required>
                    <?php $data_jenisAktivitas = readJenisAktivitasAll() ?>
                    <?php foreach($data_jenisAktivitas as $d): ?>
                        <option value="<?= $d['id']; ?>"><?= $d['nama']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_karyawan" class="form-label">Karyawan</label>
                <select class="form-select" name="id_karyawan" id="id_karyawan" required>
                    <?php $data = readKaryawanAll() ?>
                    <?php foreach($data as $d): ?>
                        <option value="<?= $d['id']; ?>"><?= $d['nama_lengkap']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_kolam" class="form-label">Kolam</label>
                <select class="form-select" name="id_kolam" id="id_kolam" required>
                    <?php $data = readKolamAll() ?>
                    <?php foreach($data as $d): ?>
                        <option value="<?= $d['id']; ?>"><?= $d['nama']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <a class="btn btn-secondary" href="aktivitas.php" >Kembali</a>
            <button type="submit" form="editAktivitas" name="sbmt-edit" class="btn btn-primary">Submit</button>
        </div>
    </div>
            
<?php require 'layout/footer.php'?>       
<?php require 'layout/script.php'?>  
<?php require 'layout/close.php'?>    