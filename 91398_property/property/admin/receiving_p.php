  <?php
  include('header.php');
  include('../koneksi.php');  
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Receiving Proyek</title>
</script>
  </head>
  <body>
  <div class="container">
  <h1>Receiving Proyek</h1>
  <form method="post" action="">
    <div class="form-group">
      <label for="exampleFormControlSelect1">No Transaksi</label>
      <select class="form-control" name="id_transaksi" id="id_transaksi">
                      <?php
                      $sql = "SELECT bahanbaku_proyek_t.id_transaksi,bahanbaku_proyek_t.id_proyek,gudang.alamat_gudang from bahanbaku_proyek_t join proyek on (bahanbaku_proyek_t.id_proyek=proyek.id_proyek) join gudang on (bahanbaku_proyek_t.id_gudang=gudang.id_gudang) where bahanbaku_proyek_t.status='Pending'";
                      $query = mysqli_query($conn,$sql);
                      while ($data = mysqli_fetch_array($query)){
                      ?>
                      <option value="<?php echo $data['id_transaksi'];?>"><?php echo $data['id_transaksi'] . " - " . $data['id_proyek']." - ".$data['alamat_gudang']; ?></option>
                      <?php

                      }
                      ?>

                    </select>
    </div>
    <button type="submit" name="go">Go</button>
  </form>

   <table class="table">
    <thead>
      <tr>
        <th scope="col">Id Bahan</th>
        <th scope="col">Nama Bahan</th>
        <th scope="col">Jumlah </th>
        <th scope="col">Harga/pcs</th>
        <th scope="col">Cost</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
    <?php
  if(isset($_POST['go'])){ //check if form was submitted
  //$id_gudang=$_POST['id_gudang'];
  $id_transaksi=$_POST["id_transaksi"];

  $sql = "SELECT receiving_proyek.id_bahan,nama_bahan, sum(jumlah) as total,harga,sum(jumlah)*harga as cost,bahanbaku_proyek_t.id_gudang FROM receiving_proyek join bahanbaku_proyek_t on (receiving_proyek.id_transaksi=bahanbaku_proyek_t.id_transaksi) join bahanbaku on (receiving_proyek.id_bahan=bahanbaku.id_bahan) where receiving_proyek.id_transaksi='$id_transaksi' group by receiving_proyek.id_bahan";

  $query1 = mysqli_query($conn,$sql);
  if (!$query1) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
  }
  while ($data = mysqli_fetch_array($query1)){
    $id_gudang= $data['id_gudang'];
  ?>
  
    <tr scope="row">
      <td><?php echo $data['id_bahan'];?></td>
      <td><?php echo $data['nama_bahan']; ?></td>
      <td><?php echo $data['total']; ?></td>
      <td><?php echo "Rp.".number_format($data['harga'],2,",",".");?></td>
      <td><?php echo "Rp.".number_format($data['cost'],2,",","."); ?></td>
      <td><a href="function/deletebb.php?id_bahan=<?php echo $data['id_bahan'];?>" onclick="return confirm('Delete?')"><button class="btn btn-danger">Delete Data</button></a></td>
      </tr>
     <?php
      }
    ?>
    <tr scope="row">
    <td><a href="function/receiving_proyek.php?id_transaksi=<?php echo $id_transaksi;?>&id_gudang=<?php echo $id_gudang;?>" onclick="return confirm('Receive Ke Proyek?')"><button class="btn btn-primary">Receiving</button></a>
    </td>
    </tr>
    <?php
    }
     ?>
    
  </tbody>
</table>
</div>
  </body>
  </html>
