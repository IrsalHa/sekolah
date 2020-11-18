<?php 
error_reporting(E_ALL);
error_reporting(E_ALL);
ini_set('display_errors', '1');

include 'config/database.php';

$id=$_GET['id'];
$siswa = mysqli_query($konek,"select * from siswa where id=$id");

 while($data = mysqli_fetch_array($siswa)){
  $nama = $data['namaSiswa'];
  $nis = $data['nis'];
  $sekolah = $data['sekolah'];
  $foto = $data['foto'];
}

      
    

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<div class="container">

  <div class="card mt-5">
    <div class="card-header">
      <h3 class="d-inline-block p-0 m-0">Data Siswa</h3>
      <div class="float-right">
        <a href="index.php" type="button" class="btn btn-dark btn-sm text-light">
          Back
        </a>
      </div>
  </div>
  <div class="card-body">
  <?php 
    if(isset($_POST['Submit'])) {
        $id = $_POST['id'];
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $sekolah = $_POST['sekolah'];
        $foto = 'foto1.jpg';
        $result = mysqli_query($konek, "UPDATE siswa SET nis='$nis',namaSiswa='$nama',sekolah='$sekolah',foto='$foto' WHERE id=$id");     
        if(!$result){
          echo '<div class="alert alert-danger mt-4" role="alert">Data gagal di update</div>';
        }else{
          header("Refresh:0; url=index.php?sukses=update");
        }
    }
  ?>
  <form action="edit.php" method="post">
  <div class="form-group">
    <label>Nis</label>
    <input type="text" name="nis"  value="<?php echo $nis ?>" class="form-control">
 </div>
  <div class="form-group">
    <label>Nama</label>
    <input type="text" name="nama" value="<?php echo $nama ?>" class="form-control">
  </div>
<div class="form-group">
    <label>Sekolah</label>
    <input type="text" name="sekolah"  value="<?php echo $sekolah ?>" class="form-control">
</div>
<div class="form-group">
    <label>Foto</label>
    <br>
    <img src="<?php echo $foto?>" width="100px">
    <input type="file" name="foto"  name="fileToUpload" id="fileToUpload">
</div>
<input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
<button type="submit" name="Submit" class="btn btn-primary">Save changes</button>
</form>
  </div>
</div>

