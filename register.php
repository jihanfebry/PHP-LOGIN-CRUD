<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
    <?php include "koneksi.php";?>

    <div class= "container">
    <form method= "post">
        <h1> Registrasi! </h1>
        <hr>
        <label for="">Name</label>
        <input type= "text" name= "Name"><br>

        <label for="">Username</label>
        <input type= "text" name= "Username"><br>

        <label for="">Email</label>
        <input type= "text" name= "Email"><br>

        <label for="">Password</label>
        <input type= "password" name= "Password"><br>

        <button name="Register" type="Submit">Register</button>
        sudah memiliki akun? <a href= "login.php"> Login!</a> 
</form> 
</div>

<?php


if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error()); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name= $_POST ['Name'];
    $username = $_POST['Username'];
    $email= $_POST ['Email']; 
    $password = $_POST['Password'];
    
    $sql = "SELECT * FROM registerlogin WHERE Username = '$username'";
    $result = mysqli_query($koneksi, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username sudah terdaftar!!');window.location = 'register.php';</script>";
    } else {
        $sql = "INSERT INTO `registerlogin`(`Name`, `Username`, `Email`, `Password`) VALUES ('$name','$username','$email','$password')";
        if (mysqli_query($koneksi, $sql)) {
            echo "<script>alert('Pendaftaran Berhasil!!');window.location = 'login.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    
    mysqli_close($conn);
}
?>

<?php

// if (isset($_POST['Register'])){
//     $Name= $_POST ['Name'];
//     $Username= $_POST ['Username'];
//     $Email= $_POST ['Email'];
//     $Password= $_POST ['Password'];

//     $query= $koneksi-> query ("INSERT INTO registerlogin (Name, Username, Email,  Password) VALUE ('$Name', '$Username', '$Email', '$Password') ");
//     if ($query){
//         echo "<script>alert ('Register Berhasil!); Window.location = 'login.php';</script>";
//         header("location: login.php");
//     }else{
//         echo "<script>alert ('Register Gagal!); Window.location = 'register.php';</script>";
//     }
// }
    
   
?>
</body>
</html>