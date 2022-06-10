<?php



// function readAdmin()
// {
//     global $conn;
//     $q = "SELECT * FROM admin";

//     $sql = $conn->query($q);
//     $data = [];
//     while($row = $sql->fetch_assoc()){
//         array_push($data, $row);

//     }
//     return $data;
// }


function updateAdmin($data){
    global $conn ;

    // $id = $data['admin_id'];
    $username = $data['uname'];
    $password = $data['pass1'];
    $password2 = $data['pass2'];

    if($password!= $password2){
        return "password tidak sesuai";
    }

    $username = stripslashes($username);  //biar gada backslash
    $username = strtolower($username);    
    $password = mysqli_real_escape_string($conn, $password); //memungkinkan pw berisi kutip
    $password2 = mysqli_real_escape_string($conn, $password2);
    //enkripsi password
    $password = password_hash($password,PASSWORD_DEFAULT);

    //tambahkan akun admin ke db
    //menyiapkan query
    $q = "UPDATE admin SET 
                username = '$username', 
                password = '$password'
                WHERE username ='$username'";

    $conn->query($q);

    //cek berhasil 
    if(mysqli_affected_rows($conn) > 0){
        return 'akun berhasil diubah';
    }
    else{
        return 'akun gagal diubah';
    }
    // return mysqli_affected_rows($conn);

}

    
function registration($data){
    global $conn;
    $username = $data["uname"];
    $username = stripslashes($username);  //biar gada backslash
    $username = strtolower($username);    
    $password = mysqli_real_escape_string($conn, $data["pass"]); //memungkinkan pw berisi kutip
    $password2 = mysqli_real_escape_string($conn, $data["pass2"]);

    $q     = "SELECT username FROM admin WHERE username = '$username'";
    $hasil = $conn->query($q);

    //cek uname sudah ada atau belum
    if (mysqli_fetch_assoc($hasil)){
        return 'username sudah ada';
    }

    //cek jika pw1 tidak sama dengan pw2
    if ($password != $password2){
        return 'password tidak sesuai';
    }

    //enkripsi password
    $password = password_hash($password,PASSWORD_DEFAULT);

    //tambahkan akun admin ke db
    $q = "INSERT INTO admin VALUES('','$username','$password')";
    $hasil = $conn->query($q);


    //cek berhasil 
    if(mysqli_affected_rows($conn) > 0){
        return 'akun berhasil ditambahkan';
    }
    else{
        return 'akun gagal ditambahkan';
    }


}

?>