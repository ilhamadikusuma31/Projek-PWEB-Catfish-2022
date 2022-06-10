<?php
define("HOST", "localhost");
define("USER", "root");
// define("USER", "202410103034");
define("PASS", "");
// define("PASS", "secret");
define("DB", "catfish");
// define("DB", "uas202410103034");
define("BASEURL", "https://localhost/Kuliah/Projek%20Akhir%20Catfish%202022/Projek-PWEB-Catfish-2022");

$conn = mysqli_connect(HOST,USER,PASS,DB);
// $conn = mysqli_connect("localhost","202410103034","secret","uas202410103034");
?>