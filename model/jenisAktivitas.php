<?php 
function getNamaJenisAktivitasById($id)
{
    global $conn;

    $q = "SELECT nama FROM jenis_aktivitas WHERE id='$id'";
    $sql = $conn->query($q);
    $data = [];
    while($row = $sql->fetch_assoc()){
        //tampung di arr $data
        array_push($data, $row);

    }
    return $data[0]['nama'];
}
function readJenisAktivitasAll()
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
