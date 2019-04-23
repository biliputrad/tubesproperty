<?php
	include('../../koneksi.php');

	$id_transaksi=$_POST['id_transaksi'];
	$id_gudang=$_POST['id_gudang'];


	$sql = "INSERT INTO beli_bahanbaku VALUES ('$id_transaksi','$id_gudang','Pending')";

	$query1 = mysqli_query($conn,$sql);

	if ($query1){
    	$sql2 = "UPDATE temp_belibb SET id_transaksi='$id_transaksi',id_gudang='$id_gudang' where id_transaksi=''";
    	$query2 = mysqli_query($conn,$sql2);
    	//echo "<script>alert('Detil')</script>";
    		if ($query2){
    			$sql3 = "INSERT INTO detil_belibb (id_transaksi, id_bahan, jumlah,id_gudang) SELECT id_transaksi, id_bahan , jumlah,id_gudang FROM temp_belibb";
    			$query3 = mysqli_query($conn,$sql3);
    			//echo "<script>alert('Master')</script>";
    				if ($query3) {
    					$sql4 = "DELETE from temp_belibb";
    					$query4 = mysqli_query($conn,$sql4);
    						if ($query4){
    							echo "<script>alert('Pembelian Berhasil')</script>";
    							echo "<script>location.href='../index.php'</script>";
    						}
    					
    				}
    		}
    }else {
    	echo "<script>alert('Pembelian Gagal')</script>";
    	//echo "<script>location.href='../index.php'</script>";
}
?>

