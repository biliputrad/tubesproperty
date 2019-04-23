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

	<a href="#" class="btn btn-outline-secondary btn-sm" role="button" id="back">Back</a>

	<div class="container" style="margin: 80px;"> 
  		<div class="row">
    		<div class="col-lg-4"></div>
    		<div class="col-lg-4 form">
      			<div class="row">
      				<div class="col-lg-4"></div>
      				<div class="col-lg-12 warna"><b>Order</b></div>
    			</div>

      			<form class="ukuranform" action="postorder.php" method="POST">
        			<div class="form-group">
  						<label for="choose">Design :</label>
  						<select class="form-control" name="design">
    						<option value="Rumah">Rumah</option>
    						<option value="Apartment">Apartment</option>
    						<option value="Ruko">Ruko</option>
  						</select>
					</div> 
					<div class="form-group">
  						<label for="choose">Tipe :</label>
  						<select class="form-control" name="tipe">
    						<option value="Tipe 36 (Rumah)">Tipe 36 (Rumah)</option>
    						<option value="Tipe Studio (Apartment)">Tipe Studio (Apartment)</option>
    						<option value="2 Lantai(Ruko)">2 Lantai (Ruko)</option>
  						</select>
					</div> 
					<div class="form-group">
  						<label for="choose">Jenis Pembayaran :</label>
  						<select class="form-control" name="jenis_bayar">
    						<option value="Cash">Cash</option>
    						<option value="Credit">Credit</option>
  						</select>
					</div> 
					<div class="form-group">
          				<label for="alamat">Alamat :</label>
          				<input type="alamat" class="form-control" name="alamat">
        			</div>
        			<div class="form-group">
  						<label for="comment">Deskripsi :</label>
  						<textarea class="form-control" rows="5" name="deskripsi"></textarea>
					</div> 
        			
       	 			<button type="submit" class="btn btn-default" name="agree">Agree</button>
      			</form>

    		</div> 
  		</div>
	</div>

</body>
</html>