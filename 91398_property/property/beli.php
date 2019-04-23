<?php
  include 'koneksi.php';
  include 'header.php'
?>
<!DOCTYPE html>
<html>
<head>
	<title>Order Property</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="property.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
<?php
  $id_catalog=$_GET['id_catalog'];

  $query = mysqli_query($conn,"SELECT deskripsi,lokasi,harga from catalog where id_catalog='$id_catalog'");
  while ($data = mysqli_fetch_array($query)){
?>
	<a href="catalog_property.php" class="btn btn-outline-secondary btn-sm" role="button" id="back">Back</a>

	<div class="container"> 
  		<div class="row">
        <div class="col"> 

        </div>
    		<div class="col form">
          
          <form method="post" action="prosespembelian.php">
            <div class="row">
              <div class="col-lg-4"></div>
              <div class="col-lg-12 warna"><b>Order</b></div>
          </div>
          <div class="form-group">
              <label for="choose">ID Catalog </label>
              <input type="text" class="form-control" name="id_catalog" value="<?php echo $id_catalog;?>" readonly>
              </select>
          </div>
          <div class="form-group">
              <label for="choose">Deskripsi </label>
              <input type="text" class="form-control" name="deskripsi" value="<?php echo $data['deskripsi']." - ".$data['lokasi'];?>" readonly>
              </select>
          </div>
          <div class="form-group">
              <label for="choose">Harga </label>
              <input type="text" class="form-control" name="harga" value="<?php echo "Rp.".number_format($data['harga'],2,",",".");?>" readonly>
              </select>
          </div>   
          <div class="form-group">
              <label for="choose">Jenis Pembayaran :</label>
              <select class="form-control" name="jenis_pembayaran">
                <option value="Cash">Cash</option>
                <option value="Credit">Credit</option>
              </select>
          </div> 
          <div class="form-group">
              <input type="hidden" class="form-control" name="user" value="<?php echo $_SESSION['idlogin']; ?>" readonly>
              </select>
          </div>   
              <button type="submit" class="btn btn-default" name="agree" style="margin-bottom: 5%;">Agree</button>
            </form>
    		</div> 
         <div class="col">
            
          </div>
  		
	</div>
<?php
  }
?>
</body>
</html>