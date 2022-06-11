<!-- ini template -->
<?php require 'layout/header.php';?>      
<?php require 'layout/sidebar.php';?> 
<?php require 'layout/navbar.php';?> 

<!-- MULAI CONTENT -->
<div class="container-fluid">

    <?php if(isset($pesan)): ?>
        <?php 
            if($pesan == "akun berhasil diubah" ){
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

    <!-- Content Row -->
    <div class="row">
    
    <div class="row text-center mt-3">
        <div class="h4">Assalamualaikum, Selamat pagi siang malam</div>
        <div class="h5">
            perkenalkan kami dari kelompok 3, kelas PWEB D yang beranggotakan
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="card h-100" style="width: 18rem;">
            <img src="<?= PATH_IMG; ?>/lili.jpeg" class="card-img-top">
            <div class="card-body">
                <p class="card-text h3">Nur Azlina</p>
                <p class="card-text h5">202410103002</p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100" style="width: 18rem;">
            <img src="<?= PATH_IMG; ?>/marizka.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text h3">Marizka Maulidina</p>
                <p class="card-text h5">202410103009</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100" style="width: 18rem;">
            <img src="<?= PATH_IMG; ?>/ilham.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text h3">Ilham Adikusuma</p>
                <p class="card-text h5">202410103034</p>
            </div>
            </div>
        </div>
    </div>

    </div>
<!-- AKHIR CONTENT -->

<!-- isi kontent dashboad -->
<?php require 'layout/footer.php'?>       
<?php require 'layout/script.php'?>    
<?php require 'layout/close.php'?>    