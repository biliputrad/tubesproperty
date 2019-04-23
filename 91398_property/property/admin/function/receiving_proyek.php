<?php
	include('../../koneksi.php');

	$id_transaksi=$_GET['id_transaksi'];
    $id_gudang=$_GET['id_gudang'];

	$sql = "INSERT INTO detil_proyek(detil_proyek.id_proyek,detil_proyek.id_bahan, detil_proyek.jumlah,detil_proyek.id_gudang) SELECT r.id_proyek,r.id_bahan,r.jumlah,r.id_gudang FROM receiving_proyek r join bahanbaku_proyek_t b on (r.id_transaksi=b.id_transaksi) WHERE r.id_transaksi='$id_transaksi' and b.status='Pending' 
		ON DUPLICATE KEY UPDATE detil_proyek.jumlah=detil_proyek.jumlah+r.jumlah";

	$query1 = mysqli_query($conn,$sql);
    echo("Error description: " . mysqli_error($conn));

    if ($query1){
        $sql2="UPDATE data_gudang g,detil_proyek p SET g.jumlah=g.jumlah-p.jumlah where g.id_gudang=p.id_gudang and g.id_bahan=p.id_bahan ";
        $query2=mysqli_query($conn,$sql2);
    	if ($query2){
        	$sql3 = "UPDATE bahanbaku_proyek_t SET status='Received' where id_transaksi='$id_transaksi' and id_gudang='$id_gudang'";
        	$query3 = mysqli_query($conn,$sql3);
        	//echo "<script>alert('Detil')</script>";
        		if ($query3){
     				echo "<script>alert('Receiving Berhasil')</script>";
        			echo "<script>location.href='../receiving_p.php'</script>";
        	}
    }else {
    	echo "<script>alert('Receiving Gagal')</script>";
        echo("Error description: " . mysqli_error($conn));
    	//echo "<script>location.href='../index.php'</script>";
}
}
?>
