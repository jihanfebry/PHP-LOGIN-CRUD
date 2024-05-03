<?php
$host= "localhost";
$user= "root";
$pass= "";
$db= "session";
$koneksi= mysqli_connect($host, $user, $pass, $db);

if(!$koneksi){
    die ("koneksi database gagal: ".mysqli_connect_error());
} 
?>