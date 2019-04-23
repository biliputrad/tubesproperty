<?php
  include('header.php');
  include('../koneksi.php');  
?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Data Proyek</title>
  </head>
  <body>
  
  <div class="container">
    <h1>Data Proyek</h1>
  <div class="row">
  <div class="col">
  <form method="post" action="">
    <div class="form-group">
      <label for="exampleFormControlSelect1">Pilih Proyek</label>
      <select class="form-control" name="id_proyek" id="id_proyek">
                      <?php
                      $sql = "SELECT id_proyek,alamat_gudang from proyek join gudang on (proyek.id_gudang=gudang.id_gudang) where status='On Progress'";
                      $query = mysqli_query($conn,$sql);
                      while ($data = mysqli_fetch_array($query)){
                      ?>
                      <option value="<?php echo $data['id_proyek'];?>"><?php echo $data['id_proyek']. " - ".$data['alamat_gudang']; ?></option>
                      <?php

                      }
                      ?>

                    </select>
    </div>
    <button type="submit" name="go" class="btn btn-primary">Go</button>
  </form>

 
    <?php
  if(isset($_POST['go'])){ //check if form was submitted
  //$id_gudang=$_POST['id_gudang'];
  $id_proyek=$_POST["id_proyek"];

  $sql = "SELECT gudang.alamat_gudang,property.jenis_property,property.deskripsi,arsitek.Nama_arsitek,arsitek.Gaji as arg,tenagakerja.Nama_tenagakerja,tenagakerja.Gaji as tkg,tenagakerja.jumlah_pekerja from proyek join arsitek on (proyek.Id_arsitek=arsitek.Id_arsitek) join tenagakerja on (proyek.Id_tenagakerja=tenagakerja.Id_tenagakerja) join gudang on (proyek.id_gudang=gudang.id_gudang) join property on (proyek.id_property=property.id_property) where proyek.Id_proyek='$id_proyek'";

  $query1 = mysqli_query($conn,$sql);
  if (!$query1) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
  }
  while ($data = mysqli_fetch_array($query1)){
  $ongkos = $data['arg']+$data['tkg'];
  ?>
  <br>
  <div class="container">
  <div class="row">
  <div class="col">
  	<form>
	  <div class="form-group">
	    <label for="lokasi">Lokasi</label>
	    <input class="form-control" type="text" name="lokasi" value="<?php echo $data['alamat_gudang'] ?>">
	  </div>
	  <div class="form-group">
	    <label for="deskripsi">Deskripsi</label>
	    <input class="form-control" type="text" name="deskripsi" value="<?php echo $data['jenis_property']." - ".$data['deskripsi'] ?>">
	  </div>
	  <div class="form-group">
	    <label for="arsitek">Arsitek</label>
	    <input class="form-control" type="text" name="arsitek" value="<?php echo $data['Nama_arsitek'] ?>">
	  </div>
	  <div class="form-group">
	    <label for="tim">Tim Pekerja</label>
	    <input class="form-control" type="text" name="tim" value="<?php echo $data['Nama_tenagakerja'] ?>">
	  </div>
	  <div class="form-group">
	    <label for="ongkos">Cost Jasa</label>
	    <input class="form-control" type="text" name="ongkos" value="<?php echo "Rp.".number_format($ongkos,2,",",".") ?>">
	  </div>
	</form>
      <!-- Modal -->
        <div id="myModal<?php echo $id_proyek; ?>" class="modal fade" role="dialog" style="color:black;">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Input To Catalog</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>  
              </div>
              <div class="modal-body">
                <form method="post" action="function/tostore.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>ID Catalog</label>
                    <input type="text" class="form-control" name="id_catalog" value="">
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat_gudang" id="alamat_gudang" value="<?php echo $data['alamat_gudang'];?>"readonly>
                  </div>
                  <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" name="desc" id="desc" value="<?php echo $data['jenis_property']." - ".$data['deskripsi'];?>"readonly>
                  </div>
                  <div class="form-group">
                    <label>Harga Jual</label>
                    <input type="text" class="form-control" name="harga_jual" id="harga_jual">
                  </div>
                  <div class="form-group">
                    <label>ID Proyek</label>
                    <input type="text" class="form-control" name="id_proyek" value="<?php echo $id_proyek;?>"readonly>
                  </div>
                   <div class="form-group">
                    <label>Foto</label>
                    <input type="file" class="form-control-file" name="image" id="image">
                  </div>
                  <button type="submit" class="btn btn-primary">Input</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
</div>
  <?php
    }
  ?>
  <div class="col"> 
   <table class="table">
    <thead>
      <tr>
        <th scope="col">Nama Bahan</th>
        <th scope="col">Jumlah </th>
        <th scope="col">Harga/pcs</th>
        <th scope="col">Cost</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>

  <?php
    $sql1 = "SELECT nama_bahan,jumlah,harga,jumlah*harga as cost,sum(jumlah*harga) as total from detil_proyek join bahanbaku on (detil_proyek.id_bahan=bahanbaku.id_bahan) where detil_proyek.id_proyek='$id_proyek'";

  $query2 = mysqli_query($conn,$sql1);
  if (!$query1) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
  }
  while ($data2 = mysqli_fetch_array($query2)){
  $costtotal = $data2['total'] + $ongkos;
  ?>  
    <tr scope="row">
      <td><?php echo $data2['nama_bahan']; ?></td>
      <td><?php echo $data2['jumlah']; ?></td>
      <td><?php echo "Rp.".number_format($data2['harga'],2,",","."); ?></td>
      <td><?php echo "Rp.".number_format($data2['cost'],2,",","."); ?></td>
      <td><a href="function/deletebb.php?id_bahan=<?php echo $data['id_bahan'];?>" onclick="return confirm('Delete?')"><button class="btn btn-danger">Delete Data</button></a></td>
      </tr>
     <?php
      }

     ?>
 	</tbody>
 	</table>
     <label>Cost Total</label>
	<input type="Text" name="" value="<?php echo "Rp.".number_format($costtotal,2,",","."); ?>">  

	<td><button class="btn btn-primary" data-toggle = "modal" data-target ="#myModal<?php echo $id_proyek;?>">Input To Catalog</button></td>
    <?php
   }
   ?>

</div>
</div>
</div>
</body>
</html>
