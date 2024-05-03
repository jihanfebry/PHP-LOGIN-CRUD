<?php include ('koneksi.php'); 

if (isset($_GET['id'])){
    $id= $_GET['id'];
    $query = "SELECT * FROM crud_student where id= '$id'";
    $result= mysqli_query($koneksi, $query);
    if(!$result){
        die("Query Error :".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }
    $data= mysqli_fetch_assoc($result);

    if(!count($data)){
        echo"<script>alert('data tdak di temukan pada tabel.');window.location='tampil.php';</script>";
    }

} else {
    echo"<script>alert('masukkan ID yang ingin anda edit!');window.location='tampil.php';</script>";
}



?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C R U D</title>
    <style type="text/css">
        *{
            font-family : "Trebuchet MS";
        }

        h1{
            text-transform: uppercase; 
            color: #EA8FEA;
        }

        .base{
            width:400px;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
            background-color: #E3DFFD;
        }

        label{
            margin-top: 10px;
            float: left;
            text-align : left;
            width: 100%;
        }

        input{
            padding; 6px;
            width: 100%;
            box-sizing: border-box;
            background-color: 2px solid #ccc;
            outline-color:  #EA8FEA;
        }

        button{
            background-color: #EA8FEA;
            color: #fff;
            padding: 10px;
            font-size: 12px;
            border:0;
            margin-top: 20px;

        }
        
    </style>
 </head>
 <body>
     <center><h1>Edit Data <?php echo $data['nama']; ?></h1></center>
     <form method= "POST"  action= "edit.php" enctype= "multipart/form-data">
     <section class= "base">
    <div>
        <label>Nama</label>
        <input type= "text" name= "nama" autofocus= "" required="" value="<?php echo $data['nama']; ?>"/>
        <input type= "hidden" name= "id" value="<?php echo $data['id']; ?>"/>
    </div>
    <div>
        <label>Alamat</label>
        <input type= "text" name= "alamat" required="" value="<?php echo $data['alamat']; ?>"/>
    </div>
    <div>
        <label>Sekolah</label>
        <input type= "text" name= "sekolah" required="" value="<?php echo $data['sekolah']; ?>"/>
    </div>
    <div>
        <label>Status</label>
        <input type= "text" name= "status" required="" value="<?php echo $data['status']; ?>"/>
    </div>
    <div>
        <label>Gambar</label>
        <img src= "gambar/<?php echo $data['gambar']; ?>" style="width: 120px; float: left; margin-bottom:5px;">
        <input type= "file" name= "gambar" />
        <i style="float: left; font-size: 11px; color: red;">abaikan jika tidak merubah gambar</i>
    </div>

    <div>
        <button type="submit">Simpan perubahan</button>
    </div>
     </section>
 </form>
 </body> 
 </html> 