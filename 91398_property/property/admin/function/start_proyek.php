<?php
	include('../../koneksi.php');

	$id_proyek=$_POST['id_proyek'];
    $id_transaksi=$_POST['id_transaksi'];
	$id_arsitek=$_POST['Id_arsitek'];
    $id_tenagakerja=$_POST['Id_tenagakerja'];
    $id_property=$_POST['id_property'];
    $id_gudang=$_POST['id_gudang'];

	$sql = "INSERT INTO proyek VALUES ('$id_proyek','$id_tenagakerja','$id_property','$id_arsitek','$id_gudang','On Progress')";

	$query1 = mysqli_query($conn,$sql);

	if ($query1){
    	$sql2 = "UPDATE temp_proyek SET id_proyek='$id_proyek',id_gudang='$id_gudang' where id_proyek=''";
    	$query2 = mysqli_query($conn,$sql2);
        if ($query2){
            $sql6 = "INSERT INTO bahanbaku_proyek_t VALUES ('$id_transaksi','$id_proyek','$id_gudang','Pending')";
            $query6 = mysqli_query($conn,$sql6);
        		if ($query6){
        			$sql3 = "INSERT INTO receiving_proyek (id_transaksi,id_proyek, id_bahan, jumlah,id_gudang) SELECT '$id_transaksi',id_proyek, id_bahan , jumlah,id_gudang FROM temp_proyek";
        			$query3 = mysqli_query($conn,$sql3);
                    echo("Error description: " . mysqli_error($conn));
        			//echo "<script>alert('Master')</script>";
        				if ($query3) {
        					$sql4 = "DELETE from temp_proyek";
        					$query4 = mysqli_query($conn,$sql4);
        						if ($query4){
        							echo "<script>alert('Start Proyek Berhasil')</script>";
        							echo "<script>location.href='../manage_proyek.php'</script>";
        						}
        					
        				}
        		}
        }
    }else {
    	echo "<script>alert('Start Proyek Gagal')</script>";
        echo("Error description: " . mysqli_error($conn));
    	//echo "<script>location.href='../manage_proyek.php'</script>";
}
?>
