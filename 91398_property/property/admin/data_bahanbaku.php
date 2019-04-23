  <?php
  include('header.php');
  include('../koneksi.php');  
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Receiving Pembelian Bahan Baku</title>
</script>
  </head>
  <body>
  <div class="container">
  <h1>Receiving Pembelian Bahan Baku</h1>
  <form method="post" action="">
    <div class="form-group">
      <label for="exampleFormControlSelect1">Pilih Gudang</label>
      <select class="form-control" name="id_gudang" id="id_gudang">
                      <?php
                      $sql = "SELECT * from gudang";
                      $query = mysqli_query($conn,$sql);
                      while ($data = mysqli_fetch_array($query)){
                      ?>
                      <option value="<?php echo $data['id_gudang'];?>"><?php echo $data['id_gudang'] . " - " . $data['alamat_gudang']; ?></option>
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
  $id_gudang=$_POST["id_gudang"];

  $sql = "SELECT detil_belibb.id_bahan,nama_bahan, sum(jumlah) as total,harga,sum(jumlah)*harga as cost FROM `beli_bahanbaku` join detil_belibb on (beli_bahanbaku.id_transaksi=detil_belibb.id_transaksi) join bahanbaku on (detil_belibb.id_bahan=bahanbaku.id_bahan) where beli_bahanbaku.id_gudang='$id_gudang' group by detil_belibb.id_bahan";

  $query1 = mysqli_query($conn,$sql);
  if (!$query1) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
  }
  while ($data = mysqli_fetch_array($query1)){
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
    <td><a href="function/receiving.php?id_gudang=<?php echo $id_gudang;?>" onclick="return confirm('Receive Ke Gudang?')"><button class="btn btn-primary">Receiving</button></a>
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
