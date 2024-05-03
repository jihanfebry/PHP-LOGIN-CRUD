<?php include('koneksi.php');

    $id= $_POST['id'];
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

            $query = "UPDATE crud_student SET nama ='$nama', alamat= '$alamat', sekolah='$sekolah', status= '$status',    gambar= '$nama_gambar_baru' WHERE id = '$id'";
            $result= mysqli_query ($koneksi, $query);

            
            if(!$result){
                die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
            } else{
                echo"<script>alert('data berhasil di ubah!');window.location='tampil.php';</script>";
            }


        } else {
            echo" <script>alert('ekstensi gambar hanya bisa jpg dan png!');window.location='edit_data.php';</script>"
            ;
        }

         }else{
          
            $query= "UPDATE crud_student SET nama ='$nama', alamat= '$alamat', sekolah='$sekolah', status= '$status'";
            $query= "WHERE id = '$id'";
            $result= mysqli_query ($koneksi, $query);

            
            if(!$result){
                die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
            } else{
                echo"<script>alert('data berhasil di ubah!');window.location='tampil.php';</script>";
            }
        
        }
?>