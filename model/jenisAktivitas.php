<?php 
function readJenisKelamin()
{
    global $conn;

    $q = "SELECT * FROM jenis_aktivitas";
    $sql = $conn->query($q);
    $data = [];
    while($row = $sql->fetch_assoc()){

        //tampung di arr $data
        array_push($data, $row);

    }
    return $data;
}
