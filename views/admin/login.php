<?php 

//ngambil variabel path untuk assets: css, js, img dll dan path
require_once 'constant.php';



session_start(); // agar bisa mengset sesi
//cek cookie: //kami == uname, kaze == id 
if (isset($_COOKIE['kaze']) and isset(($_COOKIE['kami']))){
    $kami= $_COOKIE['kami'];
    $kaze = $_COOKIE['kaze'];

    //ambil uname berdasarkan kaze == id
    $hasil = mysqli_query($conn, "SELECT username FROM admin WHERE admin_id = '$kaze'");
    $row = mysqli_fetch_assoc($hasil);

    //apakah cocok cookie uname dengan uname yang ada di db  
    if($kami=== hash("sha256",$row["username"])){
        $_SESSION['admin_login'] = true;
        
    }
}

//kalo sesi admin sudah ada, di redirect ke halaman index
if(isset($_SESSION["admin_login"])){
    header("location: dashboard.php");
    exit;
}



if(isset($_POST['sbmt'])){
    $uname = $_POST['username'];
    $pw = $_POST['password'];

    $q = "SELECT * FROM admin WHERE username = '$uname'";
    $hasil = $conn->query($q);

    //cek username
    if(mysqli_num_rows($hasil) === 1){

        //cek password
        $row = mysqli_fetch_assoc($hasil);
        if(password_verify($pw, $row['password'])){
            
            //set session 
            $_SESSION['admin_login'] = true;

            //cek remember me
            if(isset($_POST['ingatSaya'])){
                //buat cookie nya, setcookie(key, value, berapaLama) => $_COOKIE['key'] =  value 
                // setcookie('admin_login','True',time()+3600); //ini kurang aman karena langung set cookie
                // kaze == id, kami == uname
                setcookie('kaze',$row['admin_id'],time()+60);
                setcookie('kami',hash("sha256",$row['username']),time()+60);
                
            }
            $_SESSION['nama_admin'] = $row['username'];
            header("location: dashboard.php");
            exit;
        }
    }

    $error = true;

}




?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= PATH_VENDOR; ?>/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="<?= PATH_CSS; ?>/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="<?=PATH_IMG; ?>/catfish.jpg" class="rounded-5">

</head>

<body class="">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <div class="h6">Username atau Password salah</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row"> 
                            <div class="col-lg-6 d-none d-lg-block"> <img src="<?= PATH_IMG; ?>/catfish.jpg" width="100%"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" id ="username" placeholder="Enter Username..." autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id ="password" placeholder="Password" autocomplete="off" required>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="ingatSaya" id ="ingatSaya">
                                                <label class="custom-control-label" for="ingatSaya">Remember
                                                    Me</label>
                                            </div>
                                        </div>

                                        <div class="form-group text-center d-grid">
                                            <button class='btn btn-primary' type="submit" name="sbmt">Login</button>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="registrasi.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= PATH_VENDOR; ?>/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= PATH_JS; ?>/sb-admin-2.min.js"></script>

</body>

</html>
</body>
</html>