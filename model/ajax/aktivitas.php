<?php 

require_once "../../connection.php";
require_once "../aktivitas.php";




require_once '../jenisAktivitas.php';
require_once '../karyawan.php';
require_once '../kolam.php';

$data_aktivitas = readAktivitas();


?>

<!-- data aktivitas -->
<table class="table table-striped" id="tabelAktivitas">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Jenis</th>
            <th scope="col">Karyawan</th>
            <th scope="col">Kolam</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $angka = 1;
        ?>
        <?php foreach($data_aktivitas as $d): ?>
        <?php 
        //dapetin nama karyawan
        $nama_karyawan = getNamaKaryawanById($d['id_karyawan']);
        //dapetin nama kolam
        $nama_kolam = getNamaKolamById($d['id_kolam']);
        //dapetin nama jenis aktivitas
        $nama_jenis_aktivitas = getNamaJenisAktivitasById($d['id_jenis_aktivitas']);    
        ?>
        <tr>
            <th scope="row"><?= $angka++ ?></th>
            <td><?= $d['tanggal']; ?></td>
            <td><?= $nama_jenis_aktivitas; ?></td>
            <td><?= $nama_karyawan ?></td>
            <td><?= $nama_kolam ?></td>
            <td>
                <a class="btn btn-warning" type='button' href="AktivitasEdit.php?id=<?= $d['id']; ?>"><i class="bi bi-pencil-square"></i></a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
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

