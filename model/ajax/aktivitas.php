<?php 

require_once "../../connection.php";
require_once "../aktivitas.php";
require_once "../jenisKelamin.php";

// $katakunci = $_GET["katakunci"];
// $next = $_GET["next"];

$data_aktivitas       = readAktivitas();
$data_jenisKelamin   = readJenisKelamin();


if (isset($_GET['keyword'])){
    $data_aktivitas = readAktivitasFilter($_GET['keyword']);
}

if (isset($_GET['asc'])){
    $data_aktivitas = readAktivitasFilter("");
}


?>


<!-- data aktivitas -->
<?php foreach($data_aktivitas as $d): ?>
<div class='col-md-6 mt-3'>
    <div class='card mb-3 h-100' style='max-width: 540px;'>
        <div class='row justify-content-center'>
        <div class='col-md-5'>
            <img src='https://picsum.photos/500/500' class='img-fluid rounded-start mt-2 ms-2'>
        </div>
        <div class='col-md-7'>
            <div class='card-body'>
            <h5 class='card-title h4'><?= $d['nama_lengkap'] ?></h5>
            <div class="row mt-3">
                <div class="col-md-5">
                    No.Telp
                </div>
                <div class="col">
                    <p class='card-text border border-primary rounded-1 p-1'>
                        <?= $d['no_telpon'] ?> 
                    </p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-5">
                    Jenis Kelamin
                </div>
                <?php 
                    $jk = getJenisKelamin($d['id_jenis_kelamin'])
                ?>
                <div class="col">
                    <p class='card-text border border-primary rounded-1 p-1'>
                        <?= $jk ?> 
                    </p>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class='row text-center mt-3'>
        <div class='col'>
            <button type='button' data-toggle="modal" data-target="#EditModal<?= $d['id']; ?>"class='btn btn-info ms-2 mt-1'><i class="bi bi-pencil-square"></i>Info</button>
        </div>
        <div class='col'>
            <button type='button' data-toggle="modal" data-target="#HapusModal<?= $d['id']; ?>" class='btn btn-danger me-2 mt-1'><i class="bi bi-trash3-fill"></i>Hapus</button>
        </div>
    </div>
    </div>
    </div> 
        <!-- Edit Modal-->
        <div class="modal fade" id="EditModal<?= $d['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Ini (<?= $d['nama_lengkap']; ?>)?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form id="tambahaktivitas" action="" method="POST">
                        <input type="hidden" name="id" value="<?= $d['id']; ?>">
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?= $d['nama_lengkap']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="id_jenis_kelamin" value="<?= $jk['nama']; ?>" required>
                                <?php foreach($data_jenisKelamin as $jk): ?>
                                    <option value="<?= $jk['id']; ?>"><?= $jk['nama']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= $d['tanggal_lahir']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $d['alamat']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_telpon" class="form-label">No Telpon</label>
                            <input type="text" class="form-control" name="no_telpon" id="no_telpon" value="<?= $d['no_telpon']; ?>" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" form="tambahaktivitas" name="sbmt-edit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hapus Modal-->
        <div class="modal fade" id="HapusModal<?= $d['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Ini (<?= $d['nama_lengkap']; ?>)?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Pilih <b>SUBMIT</b> Jika Yakin
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <form action="" method="post">
                            <input type="hidden" name="id_aktivitas" value="<?= $d['id']; ?>">
                            <button class="btn btn-primary" type="submit" name="sbmt-hapus" >Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
<!-- data aktivitas -->