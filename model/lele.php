<?php 
function readLele()
{
    global $conn;

    $next = isset($_GET["next"]) ? $_GET["next"] : 4 ;
    $q = "SELECT * FROM lele ORDER BY id DESC LIMIT 0,{$next}";
    $sql = $conn->query($q);
    $data = [];
    while($row = $sql->fetch_assoc()){
        array_push($data, $row);

    }

    return $data;
}
function readLeleAll()
{
    global $conn;

    $q = "SELECT * FROM lele";
    $sql = $conn->query($q);
    $data = [];
    while($row = $sql->fetch_assoc()){
        array_push($data, $row);

    }

    return $data;
}
function readLeleFilter($keyword)
{
    global $conn;

    
    $q = "SELECT * FROM lele where nama LIKE '%$keyword%'";
    
    //filter asc
    if(isset($_GET['asc'])){
        $next = isset($_GET["next"]) ? $_GET["next"] : 2 ;
        if($_GET['asc']=='true'){
            $q = "SELECT * FROM lele ORDER BY nama ASC";

        }
        if($_GET['desc']=='true'){
            $q = "SELECT * FROM lele ORDER BY nama DESC";
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
        $data=readLele();
    }
        


    return $data;
}



function deleteLele($id){
    global $conn;

    $q = "DELETE FROM lele WHERE id = $id";
    $conn->query($q);


    //cek berhasil dihapus atau tidak
    if(mysqli_affected_rows($conn) > 0 ){
        return "Data Berhasil Dihapus";
    }

    else{
        return "Data Gagal Dihapus";
    }


}


function createLele($data){
    global $conn;

    $nama  = $data['nama'];
    $query = "INSERT INTO lele VALUES(NULL,'$nama')";
    $conn->query($query);


    //cek berhasil Ditambah atau tidak
    if(mysqli_affected_rows($conn) > 0 ){
        return "Data Berhasil Ditambah";
    }

    else{
        return "Data Gagal Ditambah";
    }

}
function editLele($data){
    global $conn;
 
    $id  = $data['id'];
    $nama  = $data['nama'];
    $query = "UPDATE lele SET nama = '$nama' WHERE id = '$id'";
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