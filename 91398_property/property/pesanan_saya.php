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
  
  <div class="row">
  <?php
    $query = mysqli_query($conn,"SELECT * FROM catalog where status='Available'");
    while ($data = mysqli_fetch_array($query)){
  ?>  
      <div class="col-sm-4">
      <div class="card">
      <img class="card-img-top" src="..." alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title"><?php echo $data['deskripsi']; ?></h5>
        <p class="card-text"><?php echo "Rp.".number_format($data['harga'],2,",","."); ?></p>
        <button class="btn btn-primary" data-toggle = "modal" data-target ="#Modal<?php echo $data['id_catalog']?>">Detail</button>
        <a href="beli.php?id_catalog=<?php echo $data['id_catalog'];?>" onclick="return confirm('Beli?')"><button class="btn btn-danger">Beli</button></a>
      </div>
      </div>
    </div>
    
    <?php
      }
    ?>
	</div>

</body>
</html>