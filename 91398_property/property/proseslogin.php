<?php 
    session_start();

    include ("koneksi.php");
    if (isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user_pengguna WHERE Id_user='$username' AND Password_user='$password'; ";

        $query = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($query);
        $data = mysqli_fetch_array($query);
         if ($count>=1){
            if ($data['type']=="user") {
                $_SESSION['idlogin']=$username;
                $_SESSION['type']="user";
                echo "<script>alert('berhasil login')</script>";
                header('location: catalog_property.php');
            } 
            else if ($data['type']=="admin"){
                $_SESSION['idlogin']=$username;
                $_SESSION['type']="admin";
                echo "<script>alert('berhasil login')</script>";
                header('location: admin/index.php');
        }
        }else {
            echo "<script>alert('login gagal')</script>";
            header('location: login.php');
        }
    
    }
?>