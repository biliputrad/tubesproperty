<?php
include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Pembelian</title>
</head>
<body>

  <div class="container">
    <h1>Manage Pembelian</h1>
    <table class="table table-stripped" style="background-color: white;" >
  <thead>
    <tr>
      <th scope="col">Jenis Property</th>
      <th scope="col">Harga</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php

    $query = mysqli_query($conn,"SELECT id_pesanan,deskripsi,harga,catalog.id_catalog,lokasi,pemesanan.jenis_pembayaran,pemesanan.status_bayar,pemesanan.pemrosesan FROM pemesanan join catalog on (pemesanan.id_catalog=catalog.id_catalog) where status_bayar='Selesai'");
    while ($data = mysqli_fetch_array($query)){
  ?>

    <tr scope="row">
      <td><?php echo $data['deskripsi']; ?></td>
      <td><?php echo "Rp.".number_format($data['harga'],2,",","."); ?></td>
      <td><button class="btn btn-primary" data-toggle = "modal" data-target ="#myModal<?php echo $data['id_catalog']?>">Detail</button></td>
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
      <td><a href="function/validate.php?id_pesanan=<?php echo $data['id_pesanan'];?>" onclick="return confirm('Validasi?')"><button class="btn btn-success">Validasi</button></a></td>
      <td><a href="function/batalpesan.php?id_pesanan=<?php echo $data['id_pesanan'];?>" onclick="return confirm('Batalkan Pemesanan?')"><button class="btn btn-danger">Batal Pesan</button></a></td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>
  </div>

</body>
</html>