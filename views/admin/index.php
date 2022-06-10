<!-- ini perantara antara dasboard dengan login -->
<?php 

session_start();

//kalo sesi admin tidak ada, di redirect ke halaman login
if(!isset($_SESSION["admin_login"])){
    header("location: login.php");
    exit;  
}
else{
    header("location: dashboard.php");
    exit;
}


?>

