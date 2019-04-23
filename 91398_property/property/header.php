<?php
session_start(); 
include('koneksi.php');
  if (empty($_SESSION['idlogin'])){
  header("Location: login.php");
}else if ($_SESSION['idlogin']){
  if ($_SESSION['type']!="user"){
    header("Location: login.php");
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
  <nav class="navbar navbar-dark bg-dark">      
      <a class="navbar-brand" href="#">Property123</a>
      <div class="form-inline">
        <a href="" class="btn btn-primary" style="margin-right: 5px;" data-toggle = "modal" data-target ="#myModal2">Akun</a>
      <a href="admin/function/logout.php" class="btn btn-danger">Logout</a>
      </div>
        <div id="myModal2" class="modal fade" role="dialog" style="color:black;">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Pengaturan Akun</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>  
              </div>
              <div class="modal-body">
                <form method="post" action="updateakun.php">
                  <div class="form-group">
                    <label for="text">Username</label>
                    <input type="text" class="form-control" name="uname" id="uname" value="<?php echo $username ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="nama_mekanik">Password</label>
                    <input type="password" class="form-control" name="passwd" id="passwd" value="<?php echo $password ?>" >
                  </div>
                  <button type="submit" class="btn btn-primary" name="update">Ganti Password</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="../function/deleteuser.php?username=<?php echo $data['username'];?>" onclick="return confirm('Are You Sure?')"><button class="btn btn-danger">Deactive Account</button></a>
              </div>
            </div>
          </div>
  
  </nav>
</head>
<body>

</body>
</html>