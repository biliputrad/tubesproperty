<?php
	include '../../koneksi.php';

	$id_bahan = $_POST["id_bahan"];
	$jumlah = $_POST["jumlah"];

	$check = "select id_bahan from temp_proyek where id_bahan=$id_bahan";
	$csql = mysqli_query($conn,$check);
	$count = mysqli_num_rows($csql);
	if ($count==1){
		echo "<script>alert('Data Sudah Ada, Silahkan Update Jumlah')</script>";
		echo "<script>location.href='../manage_proyek.php'</script>";
	}
	else{
	$sql="insert into temp_proyek (id_bahan,jumlah) values ('$id_bahan','$jumlah')";
	$query = mysqli_query($conn,$sql);
	if ($query) {
    	echo "<script>location.href='../manage_proyek.php'</script>";
    }else {
    	echo "<script>alert('insert gagal')</script>";
    	echo "<script>location.href='../manage_proyek.php'</script>";
	}
}
?>