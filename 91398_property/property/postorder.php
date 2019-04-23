
<?php

    include("koneksi.php");

    $design = $_POST["design"];
    $tipe = $_POST["tipe"];
    $jenis_bayar = $_POST["jenis_bayar"];
    $alamat = $_POST["alamat"];
    $desc = $_POST["deskripsi"];

    $sql = "INSERT INTO pemesanan (design,tipe,jenis_pembayaran,alamat,deskripsi) values('$design','$tipe','$jenis_bayar', '$alamat', '$desc');";

    $query = mysqli_query($conn,$sql);
    if ($query){
        echo "<script> alert('Order Property Berhasil');</script>";
        //echo "<script>location.href='signup.php'</script>";
    } else {
        echo "<script> alert('Order Property Gagal');</script>";
    }

 
?>