<?php
	include('koneksi.php');
	$username=$_POST['uname'];
	$password=$_POST['passwd'];

	$sql = "UPDATE user_pengguna SET Password_user='$password' where Id_user='$username'";

	$query1 = mysqli_query($conn,$sql);

	if ($query1){
    	echo "<script>alert('update berhasil')</script>";
    	echo "<script>location.href='catalog_property.php'</script>";
    }else {
    	echo "<script>alert('update gagal')</script>";
    	print(mysqli_error($conn));
    	echo "<script>location.href='catalog_property.php'</script>";
}
?>