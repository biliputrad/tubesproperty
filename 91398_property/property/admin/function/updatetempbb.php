<?php
	include('../../koneksi.php');
	$id_bahan=$_POST['id_bahan'];
	$jumlah=$_POST['jumlah'];

	$sql = "UPDATE temp_belibb SET jumlah='$jumlah' where id_bahan='$id_bahan'";

	$query1 = mysqli_query($conn,$sql);

	if ($query1){
    	echo "<script>alert('update berhasil')</script>";
    	echo "<script>location.href='../index.php'</script>";
    }else {
    	echo "<script>alert('update gagal')</script>";
    	echo "<script>location.href='../index.php'</script>";
}
?>