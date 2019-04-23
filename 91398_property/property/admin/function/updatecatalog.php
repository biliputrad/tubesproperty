<?php
    include('../../koneksi.php');
    $id_catalog = $_POST["id_catalog"];
    $deskripsi = $_POST["deskripsi"];
    $harga = $_POST["harga"];

    $sql = "UPDATE catalog SET deskripsi='$deskripsi',harga='$harga' where id_catalog='$id_catalog'";

    $query1 = mysqli_query($conn,$sql);

    if ($query1){
        echo "<script>alert('update berhasil')</script>";
        echo "<script>location.href='../manage_catalog.php'</script>";
    }else {
        echo "<script>alert('update gagal')</script>";
        print(mysqli_error($conn));
        // echo "<script>location.href='catalog_property.php'</script>";
}
?>