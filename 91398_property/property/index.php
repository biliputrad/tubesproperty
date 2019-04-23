<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="property.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="icon" href="img/FavPerumahan.png">
</head>
<body>

	<nav class="navbar navbar-dark bg-dark">  		
  			<a class="navbar-brand" href="#">Property123</a>
		<form class="form-inline" action="proseslogin.php" method="POST">
			<input class="form-control mr-sm-2" type="text" id="username" name="username" placeholder="Enter Username" required>
			<input class="form-control mr-sm-2" type="password" id="password" name="password" placeholder="Enter Password" required>
    		<button class="btn btn-outline-primary" type="submit" name="login">Masuk</button>
  		</form>
	</nav>
		<div class="row">
		<div class="col">
			<div class="hero">
				<h3 class="title">Selamat Datang di Property123.com</h>
				<p class="subtitle">Temukan Rumah Impianmu Sekarang</p>
			</div>
		</div>

		<div class="col">
			<br>
			<h2>Daftar</h2>
			<h5>Silahkan isi data anda disini</h5>
			<form class="ukuranform" name="datauser" method="POST" action="postdata.php">
        			<div class="form-group">
          				<label for="email">Email address:</label>
          				<input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
        			</div>
        			<div class="form-group">
          				<label for="username">Username:</label>
          				<input type="username" class="form-control" id="username" placeholder="Enter Username" name="username" required>
        			</div>
        			<div class="form-group">
          				<label for="pwd">Password:</label>
          				<input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="password" required>
        			</div>
              <div class="form-group">
                  <label for="pwd">Type:</label>
                  <select name="type" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                  </select>
              </div>
        			<button type="submit" class="btn btn-outline-primary" name="register">Register</button>
      			</form>
		</div>
	</div>	
</body>
</html>