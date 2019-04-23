<?php 
	include("../../koneksi.php");
	$id_arsitek = $_POST["id_arsitek"];
	$nama_arsitek = $_POST["nama_arsitek"];
	$gaji=$_POST['gaji'];

	$sql= "INSERT INTO arsitek VALUES ('$id_arsitek','$nama_arsitek','$gaji')";
	$query = mysqli_query($conn,$sql);

	if ($query) {
		echo "<script>alert('insert berhasil')</script>";
    	echo "<script>location.href='../manage_proyek.php'</script>";
    }else {
    	echo "<script>alert('insert gagal')</script>";
    	echo "<script>location.href='../manage_proyek.php'</script>";
}
?>