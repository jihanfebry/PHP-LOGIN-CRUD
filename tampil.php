<?php 
session_start();

if( !isset($_SESSION["Username"])){
    header("location: login.php");
    exit;
}
include ('koneksi.php'); 



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <title>C R U D</title>
    <style type= "text/css" >
        *{
            font-family : "Trebuchet MS";
            background-color: #fff;
        }

        h1{
            text-transform: uppercase;
            color: #EA8FEA;
        }

        table{
            border: 1px solid #E5D1FA;
            border-collapse : collapse;
            border-spacing : 0;
            width: 70%;
            margin : 10px auto 10px auto;
        }

        table thead th{
            background-color: #E5D1FA;
            border: 1px solid #ECF2FF;
            color : #AD7BE9;
            padding: 10px;
            text-align : left;
            text-shadow : 1px 1px 1px #fff;
        }

        table tbody td{
            border: 1px solid #ECF2FF;
            color: #333;
            padding : 10px;
        }

        a{
            background-color: #BFACE2;
            color: #fff;
            padding: 10px;
            font-size:12px;
            text-decoration: none;

        }

        button{
            border: none; 
            outline: none; 
            padding: 8px;
            width: 80px; 
            color:#fff;
            font-size: 16px;
            cursor:pointer;
            margin-top: 20px;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
            background-color: #BFACE2;
        }

    </style>




</head>
<body>
    <center> <h1> DATA DIRI </h1> </center>
    <center><a href="tambah_data.php">+ &nbsp; Tambah Data</a></center>
    <br>
    <table> 
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Sekolah</th>
                <th>Status</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query= "SELECT * FROM crud_student ORDER BY id ASC";
                $result= mysqli_query($koneksi, $query);

                if(!$result){
                    die("Query Error : ". mysqli_errno($koneksi)."-".mysqli_error($koenski));
                }
                $no=1;

                while($row = mysqli_fetch_assoc ($result)){
            ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['alamat']; ?></td>
                <td><?php echo $row['sekolah']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><img style= "width:120px;" src= "gambar/<?php echo $row['gambar']; ?>"></td>  
                <td>
                    <a href="edit_data.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="hapus.php?id=<?php echo $row['id']; ?>" 
                    onclick="return confirm ('anda yakin ingin hapus data ini?')"  >Hapus</a>
                </td>
              </tr>

            <?php
            $no++;
                }
                ?>
 
        </tbody>
    </table>


        <br>

    
    <center>
    <form action="logout.php" method="post">
    <button type="submit" value="Log Out">Log Out</a>

    </center>


    <!-- <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        session_unset();
        session_destroy();

        // header ("Location:login.php"); 
    }
    ?>  -->


</body>
</html>