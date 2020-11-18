<?php 
include '../config/database.php';
      if(isset($_GET['delete'])){
        $id = $_GET['delete'];
      
        $delete = mysqli_query($konek, "DELETE FROM siswa where id = $id");
        if(!$delete){
          echo '<div class="alert alert-danger mt-4" role="alert">Data gagal di hapus</div>';
        }else{
          header("Refresh:0; url=../index.php?sukses=delete");
        }
      }
?>
