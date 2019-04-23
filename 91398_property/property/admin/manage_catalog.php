<?php
include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Catalog</title>
</head>
<body>

  <div class="container">
  <h1>Manage Catalog</h1>
    <table class="table table-stripped" style="background-color: white;" >
  <thead>
    <tr>
      <th scope="col">ID Catalog</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Lokasi</th>
      <th scope="col">Harga</th>
      <th scope="col">Status</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php

    $query = mysqli_query($conn,"SELECT * FROM catalog");
    while ($data = mysqli_fetch_array($query)){
  ?>

    <tr scope="row">
      <td><?php echo $data['id_catalog']; ?></td>
      <td><?php echo $data['deskripsi']; ?></td>
      <td><?php echo $data['lokasi']; ?></td>
      <td><?php echo $data['harga']; ?></td>
      <td><?php echo $data['status']; ?></td>
      <td><?php echo "Rp.".number_format($data['harga'],2,",","."); ?></td>
      <td><button class="btn btn-primary" data-toggle = "modal" data-target ="#myModal<?php echo $data['id_catalog']?>">Update</button></td>
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
                <form method="post" action="function/updatecatalog.php">
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
                    <input type="text" class="form-control" name="harga" id="harga" value="<?php echo $data['harga'];?>">
                  </div>
                   <div class="form-group">
                    <input type="hidden" class="form-control" name="id_catalog" id="id_catalog" value="<?php echo $data['id_catalog'];?>">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a><button class="btn btn-success">Update</button></a>
              </div>
              </form>
            </div>
          </div>
        </div>
      
      <td><a href="function/deactivecatalog.php?id_catalog=<?php echo $data['id_catalog'];?>" onclick="return confirm('Catalog Akan Ditarik?')"><button class="btn btn-danger">Deactive</button></a></td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>
  </div>

</body>
</html>