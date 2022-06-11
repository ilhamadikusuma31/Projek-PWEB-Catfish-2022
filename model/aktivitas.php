<?php 
function readAktivitas()
{
    global $conn;

    $q = "SELECT * FROM aktivitas";
    $sql = $conn->query($q);
    $data = [];
    while($row = $sql->fetch_assoc()){
        array_push($data, $row);

    }

    return $data;
}

function getAktivitasById($id)
{
    global $conn;

    $q = "SELECT * FROM aktivitas WHERE id ='$id'";
    $sql = $conn->query($q);
    $data = [];
    while($row = $sql->fetch_assoc()){
        array_push($data, $row);
    }
    return $data[0];
}



function deleteAktivitas($id){
    global $conn;

    $q = "DELETE FROM aktivitas WHERE id = $id";
    $conn->query($q);


    //cek berhasil dihapus atau tidak
    if(mysqli_affected_rows($conn) > 0 ){
        return "Data Berhasil Dihapus";
    }

    else{
        return "Data Gagal Dihapus";
    }


}


function createAktivitas($data){
    global $conn;

    $tanggal            = $data['tanggal'];
    $id_jenis_aktivitas = $data['id_jenis_aktivitas'];
    $id_karyawan        = $data['id_karyawan'];
    $id_kolam           = $data['id_kolam'];


    $query = "INSERT INTO aktivitas VALUES
                (NULL, 
                '$tanggal', 
                '$id_jenis_aktivitas', 
                '$id_karyawan', 
                '$id_kolam')";

    $conn->query($query);


    //cek berhasil Ditambah atau tidak
    if(mysqli_affected_rows($conn) > 0 ){
        return "Data Berhasil Ditambah";
    }

    else{
        return "Data Gagal Ditambah";
    }

}
function editAktivitas($data){
    global $conn;
 
    $id                 = $data['id'];
    $tanggal            = $data['tanggal'];
    $id_jenis_aktivitas = $data['id_jenis_aktivitas'];
    $id_karyawan        = $data['id_karyawan'];
    $id_kolam           = $data['id_kolam'];


    $query = "UPDATE aktivitas SET 
                tanggal = '$tanggal', 
                id_jenis_aktivitas = $id_jenis_aktivitas, 
                id_karyawan = '$id_karyawan', 
                id_kolam = '$id_kolam' WHERE id = '$id'";
                

    $conn->query($query);


    //cek berhasil diedit atau tidak
    if(mysqli_affected_rows($conn) > 0 ){
        return "Data Berhasil Diedit";
    }

    else{
        return "Data Gagal Diedit";
    }

}


?>