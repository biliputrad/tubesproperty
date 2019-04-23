<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
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

  <a href="index.php" class="btn btn-outline-secondary btn-sm" role="button" id="back">Back</a>
	<a href="signup.php" class="btn btn-outline-secondary btn-sm" role="button" id="logout">Sign Up</a>

	<div class="container" style="margin: 80px;"> 
  		<div class="row">
    		<div class="col-lg-4"></div>
    		<div class="col-lg-4 form">
      			<div class="row">
      				<div class="col-lg-4"></div>
      				<div class="col-lg-12 warna"><b>Log In</b></div>
    			</div>

      			<form class="ukuranform" action="proseslogin.php" method="POST">
        			<div class="form-group">
          				<label for="username">Username :</label>
          				<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
        			</div>
        			<div class="form-group">
        				<label for="password">Password :</label>
          				<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
        			</div>

        			<!--
              <div class="form-group">
  						  <label for="choose">Choose :</label>
  						  <select class="form-control" id="sel1">
    						  <option>User</option>
    						  <option>Admin</option>
  						  </select>
					     </div> 
               -->
               
       	 			<button type="submit" class="btn btn-default" name="login">Login</button>
      			</form>

    		</div> 
  		</div>
	</div>

</body>
</html>