<?php
	session_start();
  include_once "server.php";
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>

	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>

	<div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
      <a href="history.php"> History</a>
      <form method="post" action="search.php">

    		<?php include('errors.php'); ?>

    		<div class="input-group">
    			<label>Source</label>
    			<select name="source">
            <?php
            $query = 'SELECT * FROM `city`';
            $result = mysqli_query($db,$query);
            $result1= $result;
            // echo(mysqli_num_rows($result));
            while ($row = mysqli_fetch_assoc($result)) {
              echo('<option value="'.$row['id'].'">'.$row['city'].'</option>');
            }
             ?>
            <!-- <option value="Delhi">Delhi</option>
            <option value="Allahabad">Allahabad</option> -->
          </select>
    		</div>
    		<div class="input-group">
    			<label>Destination</label>
          <select name="destination">
            <?php
            $query = 'SELECT * FROM `city`';
            $result = mysqli_query($db,$query);
            $result1= $result;
            // echo(mysqli_num_rows($result));
            while ($row = mysqli_fetch_assoc($result)) {
              echo('<option value="'.$row['id'].'">'.$row['city'].'</option>');
            }
             ?>
            <!-- <option value="Delhi">Delhi</option>
            <option value="Allahabad">Allahabad</option> -->
          </select>
    		</div>
        <div class="input-group">
    			<label>Mode</label>
          <select name="mode">
            <option value="1">Flight</option>
            <option value="2">Bus</option>
            <option value="3">Train</option>
          </select>
    		</div>
        <div class="input-group">
    			<label>Date</label>
    			<input type="date" name="date">
    		</div>
    		<div class="input-group">
    			<button type="submit" class="btn" name="search">Search</button>
    		</div>
    		<p>
    			Not yet a member? <a href="register.php">Sign up</a>
    		</p>
    	</form>

			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
	</div>

</body>
</html>
