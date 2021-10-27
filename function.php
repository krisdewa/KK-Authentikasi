<?php
// KONEKSI KE DATABASE
$host       = "localhost";
$user       = "root";
$password   = "";
$database   = "database_authentikasi";
$connect    = mysqli_connect($host, $user, $password, $database);

if(!$connect){
    echo "Database tidak terkoneksi";
}

// UNTUK WAJIB AUTHENTICATION SEBELUM MENGAKSES WEB
function login() {
    if(empty($_SESSION['username'])){
        header('location: auth-login.php');
    }
}

// PROSES LOGIN
if(isset($_POST['login'])) {
    // menangkap data yang dikirim dari form login
    // With Filter 
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var(md5($_POST['password']), FILTER_SANITIZE_STRING);

    // menyeleksi data user dengan username dan password yang sesuai
    $login = mysqli_query($connect,"select * from user where (username = '$username' OR email = '$username') AND password='$password'");

    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($login);

    // cek apakah username dan password di temukan pada database
    if($cek > 0){
        // $cek = mysqli_fetch_assoc($login);
        // mengaktifkan session pada php
        session_start();

        $_SESSION['username'] = $username;
        header("location:index.php");
    }else{
        echo "<script> alert('Email atau password anda salah !!!'); </script>";
        echo "<script> location='auth-login.php'; </script>";
    }
}

?>