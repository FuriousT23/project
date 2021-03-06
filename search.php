<?php
include_once "server.php";
if(isset($_POST['search'])){
  $source = mysqli_real_escape_string($db, $_POST['source']);
  $destination = mysqli_real_escape_string($db, $_POST['destination']);
  $mode = mysqli_real_escape_string($db, $_POST['mode']);
  $date = mysqli_real_escape_string($db, $_POST['date']);

  if (empty($source)) { array_push($errors, "Source is required");}
  if (empty($destination)) { array_push($errors, "Destination is required");}
  if (empty($mode)) { array_push($errors, "Mode is required");}
  if (empty($date)) { array_push($errors, "Date is required");}
  $timestamp = strtotime($date);
  echo($date);
  $day = date('w',$timestamp);
  // echo($day);

  $query = 'SELECT * FROM `transport` WHERE `source` = "'.$source.'" AND `destination` = "'.$destination.'" AND `mode` = "'.$mode.'" AND (`day` LIKE "'.$day.',%" OR `DAY` LIKE "%,'.$day.',%" OR `DAY` LIKE "%,'.$day.'") AND `availability`!=0';
  // echo($query);
  $result = mysqli_query($db, $query);

}
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
  <h2>Booking</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Mode</th>
        <th>Time</th>
        <th>Duration</th>
        <th>Availability</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      if($result){
        while ($row = mysqli_fetch_assoc($result)) {
          echo('<tr>
            <td>'.$row['name'].'</td>
            <td>'.$row['mode'].'</td>
            <td>'.$row['time'].'</td>
            <td>'.$row['duration'].'</td>
            <td>'.$row['availability'].'</td>
            <td><form action="book.php" method="POST">
                <input type="hidden" name="transport_id" value="'.$row['id'].'">
                <input type="hidden" name="date" value="'.$date.'">
                <input type="number" name="seat" >
                 <button type="submit" class="btn btn-default">Book</button>
                </form.</td>
          </tr>');
        }
      }
       ?>
    </tbody>
  </table>
</div>

</body>
</html>
