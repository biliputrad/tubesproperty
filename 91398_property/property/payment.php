<?php
    include("koneksi.php");
    $id_pesanan = $_GET["id_pesanan"];

    $sql = "UPDATE PEMESANAN SET status_bayar = 'Selesai' WHERE id_pesanan='$id_pesanan'";

    $query = mysqli_query($conn,$sql);
    if ($query){
        echo "<script> alert('pembayaran Berhasil');</script>";
        echo "<script>location.href='catalog_property.php'</script>";
    } else {
        echo "<script> alert('pembayaran Gagal');</script>";
        echo("Error description: " . mysqli_error($conn));
    }

 
?>