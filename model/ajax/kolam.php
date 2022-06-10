<?php 

require_once "../../connection.php";
require_once "../kolam.php";
require_once "../jenisKelamin.php";


$data_kolam           = readKolam();
$data_jenisKelamin   = readJenisKelamin();


if (isset($_GET['keyword'])){
    $data_kolam = readKolamFilter($_GET['keyword']);
}

if (isset($_GET['asc'])){
    $data_kolam = readKolamFilter("");
}


?>


<!-- data kolam -->
<?php foreach($data_kolam as $d): ?>
<div class='col-md-4 mt-3'>
    <div class='card mb-3 h-100' style='max-width: 540px;'>
        <div class='row justify-content-center'>
        <div class='col-md-5'>
            <img src='https://picsum.photos/500/500' class='img-fluid rounded-start mt-2 ms-2'>
        </div>
        <div class='col-md-7'>
            <div class='card-body'>
            <h5 class='card-title h4'><?= $d['nama'] ?></h5>
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
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Ini (<?= $d['nama']; ?>)?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form id="tambahKolam" action="" method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $d['id']; ?>">
                        <label for="nama"class="form-label">Nama Kolam</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $d['nama']; ?>" autocomplete="off"  required>
                        </div>
                        <div class="mb-3">
                        <label for="jumlah_lele"class="form-label">Jumlahlele</label>
                        <input type="number" min="0" class="form-control" name="jumlah_lele" id="jumlah_lele" value="<?= $d['jumlah']; ?>" autocomplete="off"  required>
                        </div>
                        <div class="mb-3">
                        <label for="id_lele" class="form-label">Lele</label>
                        <select class="form-select" id="id_lele" name="id_lele" required>
                            <option value="-" selected>-</option>
                            <?php foreach($data_lele as $d): ?>
                                <option value="<?= $d['id']; ?>"><?= $d['nama']; ?></option>
                            <?php endforeach?> 
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" form="tambahKolam" name="sbmt-edit" class="btn btn-primary">Submit</button>
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
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Ini (<?= $d['nama']; ?>)?</h5>
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
                            <input type="hidden" name="id_kolam" value="<?= $d['id']; ?>">
                            <button class="btn btn-primary" type="submit" name="sbmt-hapus" >Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
<!-- data kolam -->