<?php 
	include("../../koneksi.php");
	$id_pekerja = $_POST["id_pekerja"];
	$nama_pekerja = $_POST["nama_pekerja"];
	$gaji = $_POST["gaji"];
	$jumlah_pekerja=$_POST['jumlah_pekerja'];


	$sql= "INSERT INTO tenagakerja VALUES ('$id_pekerja','$nama_pekerja','$gaji','$jumlah_pekerja')";
	$query = mysqli_query($conn,$sql);

	if ($query) {
		echo "<script>alert('insert berhasil')</script>";
    	echo "<script>location.href='../manage_proyek.php'</script>";
    }else {
    	echo "<script>alert('insert gagal')</script>";
    	echo "<script>location.href='../manage_proyek.php'</script>";
}
?>