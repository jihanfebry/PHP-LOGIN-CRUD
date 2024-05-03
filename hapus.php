 <?php
 include('koneksi.php');
 $id= $_GET['id'];
 $query= "DELETE FROM crud_student where id= '$id'";
 $result= mysqli_query($koneksi, $query);

 if(!$result){
    die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
} else{
    echo"<script>alert('data berhasil dihapus!');window.location='tampil.php';</script>";
}
 ?>