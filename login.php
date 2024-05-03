
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <?php 
    session_start();
    if( isset($_SESSION["Username"])){
        header("location: tampil.php");
        exit;
    }
    include "koneksi.php";
    ?>
    <div class= "container">
    <form method="post">
        <h1> L O G I N </h1>
        <hr>
        <p> login disini! <p>
        <label for="">Username</label>
        <input type="text" name = "Username" placeholder="Username"><br>

        <label for="">Password</label>
        <input type="password" name = "Password" placeholder="Password"><br>

        <button name = "login" type ="submit">Login</button>
        Belum memiliki akun ? <a href = "register.php">Register!</a>
    </form>
    </div>

    <?php

    if(isset($_POST['login'])) {
        $uname = $_POST['Username'];
        $pwd = $_POST['Password'];

        $qry = $koneksi-> query("SELECT * FROM registerlogin WHERE Username ='$uname' AND Password = '$pwd'");
        $result = mysqli_num_rows($qry);

        if($result == 1) {
            $data = $qry-> fetch_assoc();

            $_SESSION['Username'] = $data;
            echo "<script>alert('login Berhasil!');window.location = 'tampil.php';</script>";
        }

        else {
            echo "<script>alert('login Gagal!');window.location = 'login.php';</script>";

        }

    }
    ?>
</body>
</html>
