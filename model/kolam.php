<?php 
function getNamaKolamById($id)
{
    global $conn;

    $q = "SELECT nama FROM kolam WHERE id='$id'";
    $sql = $conn->query($q);
    $data = [];
    while($row = $sql->fetch_assoc()){
        //tampung di arr $data
        array_push($data, $row);

    }
    return $data[0]['nama'];
}

function readKolam()
{
    global $conn;

    $next = isset($_GET["next"]) ? $_GET["next"] : 4 ;
    $q = "SELECT * FROM kolam ORDER BY id DESC LIMIT 0,{$next}";
    $sql = $conn->query($q);
    $data = [];
    while($row = $sql->fetch_assoc()){
        array_push($data, $row);

    }

    return $data;
}
function readKolamAll()
{
    global $conn;
    $q = "SELECT * FROM kolam";
    $sql = $conn->query($q);
    $data = [];
    while($row = $sql->fetch_assoc()){
        array_push($data, $row);

    }

    return $data;
}
function readKolamFilter($keyword)
{
    global $conn;

    
    $q = "SELECT * FROM kolam where nama LIKE '%$keyword%'";
    
    //filter asc
    if(isset($_GET['asc'])){
        $next = isset($_GET["next"]) ? $_GET["next"] : 2 ;
        if($_GET['asc']=='true'){
            $q = "SELECT * FROM kolam ORDER BY nama ASC";

        }
        if($_GET['desc']=='true'){
            $q = "SELECT * FROM kolam ORDER BY nama DESC";
        }
    }


    try {
        $sql = $conn->query($q);
        
        $data = [];
        while($row = $sql->fetch_assoc()){
            array_push($data, $row);
        }
      }
      
    //catch exception
    catch(Exception $e) {
        $data=readKolam();
    }
        


    return $data;
}



function deleteKolam($id){
    global $conn;

    $q = "DELETE FROM kolam WHERE id = $id";
    $conn->query($q);


    //cek berhasil dihapus atau tidak
    if(mysqli_affected_rows($conn) > 0 ){
        return "Data Berhasil Dihapus";
    }

    else{
        return "Data Gagal Dihapus";
    }


}


function createKolam($data){
    global $conn;

    $nama  = $data['nama'];
    $nama  = $data['nama'];
    $jumlah_lele  = $data['jumlah_lele'];
    $id_lele  = $data['id_lele'];
    $query = "INSERT INTO kolam VALUES(NULL,'$nama','$jumlah_lele','$id_lele')";
    $conn->query($query);


    //cek berhasil Ditambah atau tidak
    if(mysqli_affected_rows($conn) > 0 ){
        return "Data Berhasil Ditambah";
    }

    else{
        return "Data Gagal Ditambah";
    }

}
function editKolam($data){
    global $conn;
 
    $id  = $data['id'];
    $nama  = $data['nama'];
    $jumlah_lele  = $data['jumlah_lele'];
    $id_lele  = $data['id_lele'];
    $query = "UPDATE kolam SET nama = '$nama', jumlah = '$jumlah_lele', id_lele = '$id' WHERE id = '$id'";
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