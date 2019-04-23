<?php
include('../../koneksi.php');

	$id_bahan = $_GET["id_bahan"];
    $sql = "DELETE FROM temp_belibb WHERE id_bahan = '$id_bahan'";
    $query = mysqli_query($conn,$sql);
    
    if ($query){
    	echo "<script>alert('delete berhasil')</script>";
    	echo "<script>location.href='../index.php'</script>";
    }else {
    	echo "<script>alert('delete gagal')</script>";
    	echo "<script>location.href='../index.php'</script>";
    }


?>