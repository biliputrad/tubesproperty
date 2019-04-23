<?php
	include('../../koneksi.php');

	$id_gudang=$_GET['id_gudang'];

	$sql = "INSERT INTO data_gudang (data_gudang.id_gudang,data_gudang.id_bahan, data_gudang.jumlah) SELECT d.id_gudang,d.id_bahan ,d.jumlah FROM detil_belibb d join beli_bahanbaku b on (d.id_transaksi=b.id_transaksi) WHERE d.id_gudang='$id_gudang' and b.status='Pending'
		ON DUPLICATE KEY UPDATE data_gudang.jumlah=data_gudang.jumlah+d.jumlah";

	$query1 = mysqli_query($conn,$sql);

	if ($query1){
    	$sql2 = "UPDATE beli_bahanbaku SET status='Received' where id_gudang='$id_gudang'";
    	$query2 = mysqli_query($conn,$sql2);
    	//echo "<script>alert('Detil')</script>";
    		if ($query2){
 				echo "<script>alert('Receiving Berhasil')</script>";
    			echo "<script>location.href='../index.php'</script>";	
    	}
    }else {
    	echo "<script>alert('Receiving Gagal')</script>";
    	//echo "<script>location.href='../index.php'</script>";
}
?>
