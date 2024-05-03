<?php
    include('koneksi.php');

    $nama= $_POST['nama'];
    $alamat= $_POST['alamat'];
    $sekolah= $_POST['sekolah'];
    $status= $_POST['status'];
    $gambar= $_FILES['gambar']['name'];

    if($gambar != ""){
        $ekstensi_diperbolehkan = array ('png', 'jpg');
        $x= explode ('.', $gambar);
        $ekstensi = strtolower(end($x));
        $file_tmp= $_FILES ['gambar']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru= $angka_acak.'-'.$gambar;

        if(in_array($ekstensi, $ekstensi_diperbolehkan)== true){    
            move_uploaded_file($file_tmp, 'gambar/'. $nama_gambar_baru);

            $query= "INSERT INTO crud_student (nama, alamat, sekolah, status, gambar) VALUES ('$nama', '$alamat', '$sekolah', '$status', '$nama_gambar_baru')";
            $result= mysqli_query ($koneksi, $query);

            
            if(!$result){
                die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
            } else{
                echo"<script>alert('data berhasil di tambahkan!');window.location='tampil.php';</script>";
            }


        } else {
            echo" <script>alert('ekstensi gambar hanya bisa jpg dan png!');window.location='tambah_data.php';</script>"
            ;
        }

         }else{
          
            $query= "INSERT INTO crud_student (nama, alamat, sekolah, status) VALUES ('$nama', '$alamat', '$sekolah', '$status')";
            $result= mysqli_query ($koneksi, $query);

            
            if(!$result){
                die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
            } 
            else{
                echo"<script>alert('data berhasil di tambahkan!');window.location='tampil.php';</script>";
            }
            echo" <script>alert('silahkan upload gambar!');window.location='tambah_data.php';</script>";
        }
?>