<?php
    include('../../koneksi.php');
    $id_pesanan = $_GET["id_pesanan"];

    $sql = "UPDATE pemesanan SET pemrosesan='Dibatalkan' where id_pesanan='$id_pesanan'";

    $query1 = mysqli_query($conn,$sql);

    if ($query1){
        echo "<script>alert('update berhasil')</script>";
        echo "<script>location.href='../manage_pembelian.php'</script>";
    }else {
        echo "<script>alert('update gagal')</script>";
        print(mysqli_error($conn));
        // echo "<script>location.href='catalog_property.php'</script>";
}
?>