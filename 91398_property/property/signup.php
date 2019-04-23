<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="property.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>

	<?php 
		session_start();
    !isset($_SESSION['idlogin'])
	?>

	<div class="container" style="margin: 80px;"> 
  		<div class="row">
    		<div class="col-lg-4"></div>
    		<div class="col-lg-4 form">
      			<div class="row">
      				<div class="col-lg-4"></div>
      				<div class="col-lg-12 warna"><b>Sign Up</b></div>
    			</div>

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
        			
        			<button type="submit" class="btn btn-default" name="register">Register</button>
      			</form>
    		</div>
  		</div>
	</div>

</body>
</html>