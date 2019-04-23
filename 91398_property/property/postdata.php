<?php
    include("koneksi.php");
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $type = $_POST["type"];

    if(($email != '') and ($username != '') and ($password != '') and ($type != '')){

    $sql = "INSERT INTO user_pengguna values('$username','$email','$password','$type');";

    $query = mysqli_query($conn,$sql);
    if ($query){
        echo "<script> alert('Sign Up Berhasil');</script>";
        echo "<script>location.href='index.php'</script>";
    } else {
        echo "<script> alert('Sign Up Gagal');</script>";
        echo "<script>location.href='signup.php'</script>";
    }
    }
    else{
        echo "<script> alert('Ada Data Kosong');</script>";
        echo "<script>location.href='signup.php'</script>";
    }
 
?>