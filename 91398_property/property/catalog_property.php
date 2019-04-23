<?php
	include 'koneksi.php';
  include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Catalog Property</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="property.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
</head>
<body>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a style="color: black; text-shadow: 1px 1px white;"  class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" >Catalog</a>
  </li>
  <li class="nav-item">
    <a style="color: black; text-shadow: 1px 1px white;"  class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Pembelian Saya</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <div class="container">
  <h1 id="title">Catalog</h1>
  <div class="row">
  <?php
    $query = mysqli_query($conn,"SELECT * FROM catalog where status='Available'");
    while ($data = mysqli_fetch_array($query)){
  ?>  
      <div class="col-sm-4">
      <div class="card">
      <?php echo '<img class="img-fluid img-thumbnail" src="data:image/jpeg;base64,'.base64_encode($data['gambar']).'"/>';?>
      <div class="card-body">
        <h5 class="card-title"><?php echo $data['deskripsi']; ?></h5>
        <p class="card-text"><?php echo "Rp.".number_format($data['harga'],2,",","."); ?></p>
        <button class="btn btn-primary" data-toggle = "modal" data-target ="#Modal<?php echo $data['id_catalog']?>">Detail</button>
        <a href="beli.php?id_catalog=<?php echo $data['id_catalog'];?>" onclick="return confirm('Beli?')"><button class="btn btn-success">Beli</button></a>
      </div>
      </div>
    </div>

    <div id="Modal<?php echo $data['id_catalog']; ?>" class="modal fade" role="dialog" style="color:black;">
          <div class="modal-dialog">
            
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Detail</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>  
              </div>
              <div class="modal-body">
                <form method="post" action="">
                  
                  <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?php echo $data['deskripsi'];?>">
                  </div readonly>
                  <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" class="form-control" name="lokasi" id="lokasi" value="<?php echo $data['lokasi'];?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga" value="<?php echo $data['harga'];?>" readonly>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    <?php
      }
    ?>
  </div>
</div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <h1 id="title">Pembelian Saya</h1>

  <div class="container">
    <table class="table table-stripped" style="background-color: white;" >
  <thead>
    <tr>
      <th scope="col">Jenis Property</th>
      <th scope="col">Harga</th>
      <th scope="col">Status Pesanan</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  include 'koneksi.php';
   $user = $_SESSION['idlogin'];
    $query = mysqli_query($conn,"SELECT id_pesanan,deskripsi,harga,catalog.id_catalog,lokasi,pemesanan.jenis_pembayaran,pemesanan.status_bayar,pemesanan.pemrosesan FROM pemesanan join catalog on (pemesanan.id_catalog=catalog.id_catalog) where pemesanan.Id_user='$user'");
    while ($data = mysqli_fetch_array($query)){
  ?>

    <tr scope="row">
      <td><?php echo $data['deskripsi']; ?></td>
      <td><?php echo "Rp.".number_format($data['harga'],2,",","."); ?></td>
      <td><?php echo $data['pemrosesan']; ?></td>
      <td><button class="btn btn-primary" data-toggle = "modal" data-target ="#myModal<?php echo $data['id_catalog']?>">Detail</button></td>
      <td><a href="payment.php?id_pesanan=<?php echo $data['id_pesanan'];?>" onclick="return confirm('Konfirmasi?')"><button class="btn btn-success"
                <?php if ($data['pemrosesan']=='Dibatalkan' ) { 
                  echo 'disabled = disabled'; 
                  } ?>
                  >Konfirmasi Pembayaran</button></a></td>
      <!-- Modal -->
        <div id="myModal<?php echo $data['id_catalog']; ?>" class="modal fade" role="dialog" style="color:black;">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Detail Pembelian</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>  
              </div>
              <div class="modal-body">
                <form method="post" action="">
                  
                  <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?php echo $data['deskripsi'];?>">
                  </div readonly>
                  <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" class="form-control" name="lokasi" id="lokasi" value="<?php echo $data['lokasi'];?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga" value="<?php echo $data['harga'];?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Status Pembayaran</label>
                    <input type="text" class="form-control" name="status_bayar" id="status_bayar" value="<?php echo $data['status_bayar'];?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Status Pembelian</label>
                    <input type="text" class="form-control" name="pemrosesan" id="pemrosesan" value="<?php echo $data['pemrosesan'];?>" readonly>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>
  </div>

  </div>
</div>
	

</body>
</html>