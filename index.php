<?php 

session_start();

//kalo sesi admin tidak ada, di redirect ke halaman login
if(!isset($_SESSION["admin_login"])){
    header("location: views/admin/");
    exit;  
}
else{
    header("location: views/admin/registrasi.php");
    exit;
}

?>