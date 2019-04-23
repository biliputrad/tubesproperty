<?php
include 'header.php';
include '../koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Beli Bahan Baku</title>
</head>
<body>
	<div class="container">
  <h1>Pembelian Bahan Baku</h1>
  <div class="row">
    <div class="col">
      <form method="post" action="function/finish_bahanbaku.php">
      <div class="form-group">
	    <label for="jumlah">ID Transaksi</label>
	    <input class="form-control" type="text" name="id_transaksi">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlSelect1">Gudang</label>
	    <select class="form-control" name="id_gudang">
                      <?php
                      $sql = "SELECT * from gudang";
                      $query = mysqli_query($conn,$sql);
                      while ($data = mysqli_fetch_array($query)){
                      ?>
                      <option value="<?php echo $data['id_gudang'];?>"><?php echo $data['alamat_gudang']?></option>
                      <?php
                      }
                      ?>
                    </select>
	  </div>
	  <button type="submit">Beli Bahan</button>
	</form>
    <table class="table">
	  <thead>
	    <tr>
	      <th scope="col">Id Bahan</th>
	      <th scope="col">Nama Bahan</th>
	      <th scope="col">Jumlah </th>
	    </tr>
	  </thead>
	  <tbody>
  <?php
    $query = mysqli_query($conn,"SELECT bahanbaku.id_bahan,nama_bahan,jumlah from temp_belibb join bahanbaku on (temp_belibb.id_bahan=bahanbaku.id_bahan)");
    while ($data = mysqli_fetch_array($query)){
  ?>  
    <tr scope="row">
      <td><?php echo $data['id_bahan'];?></td>
      <td><?php echo $data['nama_bahan']; ?></td>
      <td><?php echo $data['jumlah']; ?></td>
      <td><button class="btn btn-primary" data-toggle = "modal" data-target ="#myModal<?php echo $data['id_bahan']?>">Edit Data</button></td>
      <!-- Modal -->
        <div id="myModal<?php echo $data['id_bahan']; ?>" class="modal fade" role="dialog" style="color:black;">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit Jumlah Bahan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>  
              </div>
              <div class="modal-body">
                <form method="post" action="function/updatetempbb.php">
                  <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" name="id_bahan" value="<?php echo $data['id_bahan'];?>"readonly>
                    <?php echo("<script>console.log('PHP: ".$data['id_bahan']."');</script>"); ?>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama_bahan" id="nama_bahan" value="<?php echo $data['nama_bahan'];?>"readonly>
                  </div>
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?php echo $data['jumlah'];?>">
                  </div>
                  <button type="submit" class="btn btn-primary">Update</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      <td><a href="function/deletetempbb.php?id_bahan=<?php echo $data['id_bahan'];?>" onclick="return confirm('Delete?')"><button class="btn btn-danger">Delete Data</button></a></td>
     <?php
     	}
     ?>
    </tr>
	  </tbody>
	</table>
    </div>
    <div class="col">
	  <form method="post" action="function/tambah_bahanbaku.php">
	  <div class="form-group">
	    <label for="exampleFormControlSelect1">Bahan Baku</label>
	    <select class="form-control" name="id_bahan">
                      <?php
                      $sql = "SELECT * from bahanbaku";
                      $query = mysqli_query($conn,$sql);
                      while ($data = mysqli_fetch_array($query)){
                      ?>
                      <option value="<?php echo $data['id_bahan'];?>"><?php echo $data['nama_bahan'] . " - Rp." . $data['harga']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
	  </div>
	  <div class="form-group">
	    <label for="jumlah">Jumlah</label>
	    <input class="form-control" type="text" name="jumlah">
	  </div>
	  <button type="submit">Tambah</button>
	</form>
    </div>
  </div>
</body>
</html>