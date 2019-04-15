<?php
include_once 'server.php';

for ($i=1; $i <= $_SESSION['seat']; $i++) {
  $name="name".$i;
  $age="age".$i;
  $query='INSERT INTO `passangers` ( `ticket_id`, `name`, `age`) VALUES ( "'.$_SESSION['booking_id'].'", "'.$_POST[$name].'", "'.$_POST[$age].'")';
  $result = mysqli_query($db,$query);
}

$query = 'UPDATE `tickets` SET `status`="1" WHERE `id`="'.$_SESSION['booking_id'].'"';
$result = mysqli_query($db,$query);
unset($_SESSION['booking_id']);
unset($_SESSION['seat']);
if($result){
  echo('<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
        <br><br> <h2 style="color:#0fad00">Success</h2>

        <a href="index.php" class="btn btn-success">     Home      </a>
    <br><br>
        </div>

	</div>
</div>');
}
else{
  echo('<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
        <br><br> <h2 style="color:#f44242">Error</h2>

        <a href="" class="btn btn-danger">    Home      </a>
    <br><br>
        </div>

	</div>
</div>');
}

 ?>
