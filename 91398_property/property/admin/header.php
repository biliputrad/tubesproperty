<?php
session_start(); 
include('../koneksi.php');
  if (empty($_SESSION['idlogin'])){
  header("Location: ../login.php");
}else if ($_SESSION['idlogin']){
  if ($_SESSION['type']!="admin"){
    header("Location: ../login.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <?php
 $user = $_SESSION['idlogin'];

  $sql =  "SELECT * FROM user_pengguna where Id_user='$user'";
    $query = mysqli_query($conn,$sql);
    if ($data = mysqli_fetch_array($query)){
      $username = $data['Id_user'];
      $password = $data['Password_user'];
      $email =  $data['email'];
    }
  ?>
      <div id="myModal2" class="modal fade" role="dialog" style="color:black;">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Ganti Password</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>  
              </div>
              <div class="modal-body">
                <form method="post" action="../updateakun.php">
                  <div class="form-group">
                    <label for="text">Username</label>
                    <input type="text" class="form-control" name="uname" id="uname" value="<?php echo $username ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="nama_mekanik">Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="<?php echo $password ?>" >
                  </div>
                  <button type="submit" class="btn btn-primary">Ganti Password</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="function/deleteuser.php?username=<?php echo $data['Id_user'];?>" onclick="return confirm('Are You Sure?')"><button class="btn btn-danger">Deactive Account</button></a>
              </div>
            </div>
          </div>
        </div>



</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Property Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a style="width: 100px;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gudang
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php">Beli Bahan Baku</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="data_bahanbaku.php">Receiving Bahan Baku</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="gudang.php">Stock Gudang</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a style="width: 100px;"class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Proyek
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="manage_proyek.php">Manage Proyek</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="receiving_p.php">Receiving Proyek</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="data_proyek.php">Data Proyek</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a style="width: 200px;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Manage Penjualan
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="manage_pembelian.php">Manage Pembelian</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="manage_catalog.php">Manage Catalog</a>
        </div>
      </li>
    </ul>
     <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="" class="btnS btn btn-primary" style="margin-right: 5px;" data-toggle = "modal" data-target ="#myModal2">Akun<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a href="function/logout.php" class="btnS btn btn-danger">Logout<span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
  </div>
</nav>
  <br>
  <br>
</body>
</html>