<?php 
function readJenisKelamin()
{
    global $conn;

    $q = "SELECT * FROM jenis_kelamin";
    $sql = $conn->query($q);
    $data = [];
    while($row = $sql->fetch_assoc()){

        //tampung di arr $data
        array_push($data, $row);

    }
    return $data;
}
function getJenisKelamin($id)
{
    global $conn;

    $q = "SELECT nama FROM jenis_kelamin WHERE id='$id'";
    $sql = $conn->query($q);
    $data = $sql->fetch_assoc();

    return $data['nama'];
}
