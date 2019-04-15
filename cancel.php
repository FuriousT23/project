<?php
include_once 'server.php';

$ticket_id = $_POST['ticket_id'];
$query = 'UPDATE `tickets` SET `status`="-1" WHERE `id`="'.$ticket_id.'"';
$result = mysqli_query($db, $query);
if($result){
  echo('<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
        <br><br> <h2 style="color:#0fad00">Successfully Cancelled</h2>

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
        <br><br> <h2 style="color:#f44242">Error canceling</h2>

        <a href="" class="btn btn-danger">     Home     </a>
    <br><br>
        </div>

	</div>
</div>');
}
 ?>
