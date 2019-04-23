<?php

    include("koneksi.php");

    $id_catalog = $_POST["id_catalog"];
    $jenis_pembayaran = $_POST["jenis_pembayaran"];
    $id_user = $_POST["user"];


    $sql = "INSERT INTO pemesanan (id_catalog,jenis_pembayaran,Id_user,status_bayar,pemrosesan) values ('$id_catalog','$jenis_pembayaran','$id_user','Belum Dikonfirmasi','Menunggu Validasi');";

    $query = mysqli_query($conn,$sql);
    if ($query){
        echo "<script> alert('Order Property Berhasil');</script>";
        echo "<script>location.href='catalog_property.php'</script>";
    } else {
        echo "<script> alert('Order Property Gagal');</script>";
        echo("Error description: " . mysqli_error($conn));
        echo $id_catalog;
        echo $id_user;
    }

 
?>