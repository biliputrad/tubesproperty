<?php
include 'header.php';
include '../koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mulai Proyek</title>
</head>
<body>
<div class="container">
<h1>Mulai Proyek</h1>
<div class="row">
<div class="col-sm">
 <button class="btn btn-primary" data-toggle = "modal" data-target ="#myModal3">Tambah Tipe Property</button>
      <!-- Modal -->
        <div id="myModal3" class="modal fade" role="dialog" style="color:black;">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tambah Tipe Property</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>  
              </div>
              <div class="modal-body">
                <form method="post" action="function/inputproperty.php">
                  <div class="form-group">
                    <label for="id_property">ID Property</label>
                    <input type="text" class="form-control" name="id_property" id="id_property">
                  </div>
                  <div class="form-group">
                    <label for="nama_property">Nama Property</label>
                    <input type="text" class="form-control" name="nama_property" id="nama_property">
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                  </div>
                   <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" name="harga" id="harga">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>
        <div class="col-sm">
 <button class="btn btn-primary" data-toggle = "modal" data-target ="#myModal4">Tambah Arsitek</button>
      <!-- Modal -->
        <div id="myModal4" class="modal fade" role="dialog" style="color:black;">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tambah Arsitek</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>  
              </div>
              <div class="modal-body">
                <form method="post" action="function/inputarsitek.php">
                  <div class="form-group">
                    <label for="id_arsitek">ID Arsitek</label>
                    <input type="text" class="form-control" name="id_arsitek" id="id_arsitek">
                  </div>
                  <div class="form-group">
                    <label for="nama_arsitek">Nama Arsitek</label>
                    <input type="text" class="form-control" name="nama_arsitek" id="nama_arsitek">
                  </div>
                  <div class="form-group">
                    <label for="gaji">Gaji</label>
                    <input type="number" class="form-control" name="gaji" id="gaji">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-sm">
        <button class="btn btn-primary" data-toggle = "modal" data-target ="#myModal5">Tambah Tim Pekerja</button>
      <!-- Modal -->
        <div id="myModal5" class="modal fade" role="dialog" style="color:black;">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tambah Tim Pekerja</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>  
              </div>
              <div class="modal-body">
                <form method="post" action="function/inputtim.php">
                  <div class="form-group">
                    <label for="id_pekerja">ID Tim</label>
                    <input type="text" class="form-control" name="id_pekerja" id="id_pekerja">
                  </div>
                  <div class="form-group">
                    <label for="nama_pekerja">Nama Pimpinan Tim</label>
                    <input type="text" class="form-control" name="nama_pekerja" id="nama_pekerja">
                  </div>
                  <div class="form-group">
                    <label for="gaji">Ongkos</label>
                    <input type="number" class="form-control" name="gaji" id="gaji">
                  </div>
                  <div class="form-group">
                    <label for="jumlah_pekerja">Jumlah Pekerja</label>
                    <input type="number" class="form-control" name="jumlah_pekerja" id="jumlah_pekerja">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<br/>

<div class="container">
  <div class="row">
    <div class="col">
     <form method="post" action="function/start_proyek.php">
      <div class="form-group">
	    <label for="id_proyek">ID Proyek</label>
	    <input class="form-control" type="text" name="id_proyek">
	  </div>
	  <div class="form-group">
	    <label for="id_proyek">ID Transaksi Bahan Baku</label>
	    <input class="form-control" type="text" name="id_transaksi">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlSelect1">Lokasi</label>
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
	  <div class="form-group">	
	    <label for="id_property">Tipe Property</label>
	     <select class="form-control" name="id_property">
           <?php
           $sql = "SELECT * from property";
           $query = mysqli_query($conn,$sql);
           while ($data = mysqli_fetch_array($query)){
           ?>
           <option value="<?php echo $data['id_property'];?>"><?php echo $data['jenis_property'] ; ?></option>
           <?php
           }
           ?>
         </select>
	    </div>
		<div class="form-group">	
	     <label for="Id_arsitek">Arsitek</label>
	      <select class="form-control" name="Id_arsitek">
           <?php
           $sql = "SELECT * from arsitek";
           $query = mysqli_query($conn,$sql);
           while ($data = mysqli_fetch_array($query)){
           ?>
           <option value="<?php echo $data['Id_arsitek'];?>"><?php echo $data['Nama_arsitek']." | Gaji = ".$data['Gaji']; ?></option>
           <?php
           }
           ?>
          </select>

	    </div>
	    <div class="form-group">	
	     <label for="Id_tenagakerja">Tim Pekerja</label>
	      <select class="form-control" name="Id_tenagakerja">
           <?php
           $sql = "SELECT * from tenagakerja";
           $query = mysqli_query($conn,$sql);
           while ($data = mysqli_fetch_array($query)){
           ?>
           <option value="<?php echo $data['Id_tenagakerja'];?>"><?php echo "Tim ".$data['Nama_tenagakerja']." | ".$data['jumlah_pekerja']." Orang | Ongkos Rp.".number_format($data['Gaji'],2,",","."); ?></option>
           <?php
           }
           ?>
          </select>
	    </div>
	    <button type="submit">Start Proyek</button>
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
    $query = mysqli_query($conn,"SELECT bahanbaku.id_bahan,nama_bahan,jumlah from temp_proyek join bahanbaku on (temp_proyek.id_bahan=bahanbaku.id_bahan)");
    while ($data = mysqli_fetch_array($query)){
  ?>  
    <tr scope="row">
      <td><?php echo $data['id_bahan'];?></td>
      <td><?php echo $data['nama_bahan']; ?></td>
      <td><?php echo $data['jumlah']; ?></td>
      <td><button class="btn btn-primary" data-toggle = "modal" data-target ="#myModal1<?php echo $data['id_bahan']?>">Edit Data</button></td>
      <!-- Modal -->
        <div id="myModal1<?php echo $data['id_bahan']; ?>" class="modal fade" role="dialog" style="color:black;">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit Jumlah Bahan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>  
              </div>
              <div class="modal-body">
                <form method="post" action="function/update_temp_proyek.php">
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
      <td><a href="function/delete_temp_proyek.php?id_bahan=<?php echo $data['id_bahan'];?>" onclick="return confirm('Delete?')"><button class="btn btn-danger">Delete Data</button></a></td>
     <?php
     	}
     ?>
    </tr>
	  </tbody>
	</table>
    </div>
    <div class="col">
      <form method="post" action="function/proyek_bahanbaku.php">
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
</div>
</body>
</html>