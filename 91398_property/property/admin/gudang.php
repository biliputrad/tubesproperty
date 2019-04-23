  <?php
  include('header.php');
  include('../koneksi.php');  
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Stock Gudang</title>
</script>
  </head>
  <body>
  <div class="container">
  <h1>Stock Gudang</h1>
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
        <th scope="col">Nama Bahan</th>
        <th scope="col">Jumlah </th>
        <th scope="col">Cost</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
    <?php
  if(isset($_POST['go'])){ //check if form was submitted
  //$id_gudang=$_POST['id_gudang'];
  $id_gudang=$_POST["id_gudang"];

  $sql = "SELECT nama_bahan,jumlah,jumlah*harga as cost from data_gudang join bahanbaku on (data_gudang.id_bahan=bahanbaku.id_bahan) where data_gudang.id_gudang='$id_gudang'";

  $query1 = mysqli_query($conn,$sql);
  if (!$query1) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
  }
  while ($data = mysqli_fetch_array($query1)){
  ?>  
    <tr scope="row">
      <td><?php echo $data['nama_bahan']; ?></td>
      <td><?php echo $data['jumlah']; ?></td>
      <td><?php echo "Rp.".number_format($data['cost'],2,",","."); ?></td>
      <td><a href="function/deletebb.php?id_bahan=<?php echo $data['id_bahan'];?>" onclick="return confirm('Delete?')"><button class="btn btn-danger">Delete Data</button></a></td>
      </tr>
     <?php
      }
    ?>
    <?php
    }
     ?>
    
  </tbody>
</table>
</div>
  </body>
  </html>
