<?php 
    $konek = mysqli_connect("localhost","root",'',"tugas");
    if(!$konek){
           echo mysqli_connect_error();
    }
?>