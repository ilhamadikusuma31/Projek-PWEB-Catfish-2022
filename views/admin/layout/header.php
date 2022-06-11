<?php 


//ngambil variabel path untuk assets: css, js, img dll dan path
require_once 'constant.php';

require_once '../../model/admin.php';


session_start();
//kalo sesi admin tidak ada, di redirect ke halaman login
if(!isset($_SESSION["admin_login"])){
    header("location: ../login.php");
    exit;  
}

$pesan_admin;
if(isset($_POST['sbmt-ganti-pw'])){
    $pesan_admin = updateAdmin($_POST);

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

    <title>Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?=PATH_VENDOR; ?>/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


        <!-- Custom styles for this template-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="<?=PATH_CSS; ?>/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?=PATH_CSS; ?>/admin.css" rel="stylesheet">
    <link href="<?=PATH_CSS; ?>/style.css" rel="stylesheet">

    <link rel="icon" href="<?=PATH_IMG; ?>/catfish.jpg" class="rounded-5">

</head>