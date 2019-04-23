<?php 
	include("../../koneksi.php");
	$id_catalog = $_POST["id_catalog"];
	$alamat = $_POST["alamat_gudang"];
	$deskripsi = $_POST["desc"];
	$harga=$_POST['harga_jual'];
	$id_proyek = $_POST["id_proyek"];

	$file = $_FILES['image']['tmp_name'];
	// if(!isset($file)){
	// 	echo 'Pilih file gambar';
	// }
	// else{
	// 	$image 		= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	// 	$image_name	= addslashes($_FILES['image']['name']);
	// 	$image_size	= getimagesize($_FILES['image']['tmp_name']);
 
	// 	if($image_size == false){
	// 		echo 'File yang anda pilih tidak gambar';
	// 	}else{
	// 		$sql = "INSERT INTO foto_catalog VALUES('$id_catalog', '$image_name', '$image')";
	// 		$query = mysqli_query($conn,$sql);
	// 		if(!$query){
	// 			echo 'Gagal upload gambar';
	// 			echo("Error description: " . mysqli_error($conn));
	// 		}else{
	// 			//ambil id terakhir insert
	// 			$lastid = mysqli_insert_id();
 
	// 			echo 'Gambar berhasil di upload.<p>Gambar anda:</p><img src="get.php?id='.$lastid.'">';
	// 		}
	// 	}
	// }
	$image 		= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name	= addslashes($_FILES['image']['name']);
	$image_size	= getimagesize($_FILES['image']['tmp_name']);
	if($image_size == false){
			echo 'File yang anda pilih tidak gambar';
	}
	else{
	$sql= "INSERT INTO catalog VALUES ('$id_catalog','$deskripsi','$alamat','$harga','$id_proyek','Available','$image_name','$image')";
	$query = mysqli_query($conn,$sql);

	if ($query) {
		echo "<script>alert('insert berhasil')</script>";
    	//echo "<script>location.href='../data_proyek.php'</script>";
    }
    else {
    	echo "<script>alert('insert gagal')</script>";
    	//echo "<script>location.href='../data_proyek.php'</script>";
    	 echo("Error description: " . mysqli_error($conn));
		}
	}

?>