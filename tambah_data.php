 <?php include ('koneksi.php'); ?>
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
            background-color: #E3DFFD;
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
            background-color:#F7F1E5;
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
     <center><h1>Tambah Data</h1></center>
     <form method= "POST"  action= "tambah.php" enctype= "multipart/form-data">
     <section class= "base">
    <div>
        <label>Nama</label>
        <input type= "text" name= "nama" autofocus= "" required=""/>
    </div>
    <div>
        <label>Alamat</label>
        <input type= "text" name= "alamat" required=""/>
    </div>
    <div>
        <label>Sekolah</label>
        <input type= "text" name= "sekolah" required=""/>
    </div>
    <div>
        <label>Status</label>
        <input type= "text" name= "status" required=""/>
    </div>
    <div>
        <label>Gambar</label>
        <input type= "file" name= "gambar" required=""/>
    </div>

    <duv>
        <button type="submit">Simpan</button>
    </div>
     </section>
 </form>
 </body> 
 </html>