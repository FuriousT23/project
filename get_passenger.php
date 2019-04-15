<?php
// session_start();
include('server.php');


 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Enter passenger details.</h2>
  <form action="checkout.php" method="POST">

    <?php
    echo($_SESSION['seat']);
    for ($i=1; $i <= $_SESSION['seat'] ; $i++) {
      echo('<h3>Passanger '.$i.'</h3>');
      echo('<div class="form-group">
        <label for="name">Name:</label>
        <input type="Text" class="form-control" placeholder="Enter name" name="name'.$i.'" required>
      </div>
      <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" class="form-control" placeholder="Enter age" name="age'.$i.'" required>
      </div>');
    }
     ?>


    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
