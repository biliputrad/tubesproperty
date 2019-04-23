<?php
include('../../koneksi.php');

	$id_bahan = $_GET["id_bahan"];
    $sql = "DELETE FROM temp_proyek WHERE id_bahan = '$id_bahan'";
    $query = mysqli_query($conn,$sql);
    
    if ($query){
    	echo "<script>alert('delete berhasil')</script>";
    	echo "<script>location.href='../manage_proyek.php'</script>";
    }else {
    	echo "<script>alert('delete gagal')</script>";
    	echo "<script>location.href='../manage_proyek.php'</script>";
    }


?>