<?php 

function getNamaKaryawanById($id)
{
    global $conn;

    $q = "SELECT nama_lengkap FROM karyawan WHERE id='$id'";
    $sql = $conn->query($q);
    $data = [];
    while($row = $sql->fetch_assoc()){
        //tampung di arr $data
        array_push($data, $row);

    }
    return $data[0]['nama_lengkap'];
}

function readKaryawan()
{
    global $conn;

    $next = isset($_GET["next"]) ? $_GET["next"] : 2 ;
    $q = "SELECT * FROM karyawan ORDER BY id DESC LIMIT {$next}";
    $sql = $conn->query($q);
    $data = [];
    while($row = $sql->fetch_assoc()){
        array_push($data, $row);
    }
    return $data;
}

function readKaryawanAll()
{
    global $conn;
    $q = "SELECT * FROM karyawan";
    $sql = $conn->query($q);
    $data = [];
    while($row = $sql->fetch_assoc()){
        array_push($data, $row);
    }
    return $data;
}
function readKaryawanFilter($keyword)
{
    global $conn;

    
    $q = "SELECT * FROM karyawan where nama_lengkap LIKE '%$keyword%'
          OR tanggal_lahir LIKE '%$keyword%'
          OR no_telpon LIKE '%$keyword%'
          OR id_jenis_kelamin = '$keyword'
        ";
    
    //filter jenislkelamin
    if(isset($_GET['jk'])){
        $q = "SELECT * FROM karyawan where id_jenis_kelamin = '$keyword'";
    }

    //filter asc
    if(isset($_GET['asc'])){
        $next = isset($_GET["next"]) ? $_GET["next"] : 2 ;
        if($_GET['asc']=='true'){
            $q = "SELECT * FROM karyawan ORDER BY nama_lengkap ASC";

        }
        if($_GET['desc']=='true'){
            $q = "SELECT * FROM karyawan ORDER BY nama_lengkap DESC";
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
        $data=readKaryawan();
    }
        


    return $data;
}



function deleteKaryawan($id){
    global $conn;

    $q = "DELETE FROM karyawan WHERE id = $id";
    $conn->query($q);


    //cek berhasil dihapus atau tidak
    if(mysqli_affected_rows($conn) > 0 ){
        return "Data Berhasil Dihapus";
    }

    else{
        return "Data Gagal Dihapus";
    }


}


function createKaryawan($data){
    global $conn;

    $nama_lengkap  = $data['nama_lengkap'];
    $tanggal_lahir  = $data['tanggal_lahir'];
    $id_jenis_kelamin  = $data['id_jenis_kelamin'];
    $alamat  = $data['alamat'];
    $no_telpon  = $data['no_telpon'];

    $query = "INSERT INTO karyawan VALUES
                (NULL, 
                '$nama_lengkap', 
                '$id_jenis_kelamin', 
                '$tanggal_lahir', 
                '$alamat', 
                '$no_telpon')";

    $conn->query($query);


    //cek berhasil Ditambah atau tidak
    if(mysqli_affected_rows($conn) > 0 ){
        return "Data Berhasil Ditambah";
    }

    else{
        return "Data Gagal Ditambah";
    }

}
function editKaryawan($data){
    global $conn;
 
    $id  = $data['id'];
    $nama_lengkap  = $data['nama_lengkap'];
    $tanggal_lahir  = $data['tanggal_lahir'];
    $id_jenis_kelamin  = $data['id_jenis_kelamin'];
    $alamat  = $data['alamat'];
    $no_telpon  = $data['no_telpon'];

    $query = "UPDATE karyawan SET 
                nama_lengkap = '$nama_lengkap', 
                tanggal_lahir = $tanggal_lahir, 
                id_jenis_kelamin = '$id_jenis_kelamin', 
                alamat = '$alamat', 
                no_telpon = '$no_telpon' WHERE id = '$id'";
                

    $conn->query($query);


    //cek berhasil diedit atau tidak
    if(mysqli_affected_rows($conn) > 0 ){
        return "Data Berhasil Diedit";
    }

    else{
        return "Data Gagal Diedit";
    }

}


// if(isset($_GET['action'])){
//     if($_GET['action']=='read'){
//         readKaryawan();
//     }
//     if($_GET['action']=='create'){
//         createKaryawan($_POST);
//     }
// }


?>