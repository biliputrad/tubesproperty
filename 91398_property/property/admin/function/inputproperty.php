<?php 
	include("../../koneksi.php");
	$id_property = $_POST["id_property"];
	$nama_property = $_POST["nama_property"];
	$deskripsi = $_POST["deskripsi"];
	$harga=$_POST['harga'];


	$sql= "INSERT INTO property VALUES ('$id_property','$nama_property','$deskripsi','$harga')";
	$query = mysqli_query($conn,$sql);

	if ($query) {
		echo "<script>alert('insert berhasil')</script>";
    	echo "<script>location.href='../manage_proyek.php'</script>";
    }else {
    	echo "<script>alert('insert gagal')</script>";
    	//echo "<script>location.href='../manage_proyek.php'</script>";
}
?>