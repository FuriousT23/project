<?php

include_once "server.php";

$query = 'SELECT tr.name as name, tr.mode as mode, t.date as date, tr.time as time, t.fare as fare, t.status as status, t.id as id FROM `tickets` t, `transport` tr WHERE t.`user_id`= "'.$_SESSION['userId'].'" and t.`transport_id`=tr.`id` ORDER BY `date`';
// echo($query);
$result = mysqli_query($db, $query);



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
         <th>Id</th>
         <th>Name</th>
         <th>Mode</th>
         <th>Date</th>
         <th>Time</th>
         <th>Fare</th>
         <th>status</th>
         <th></th>
       </tr>
     </thead>
     <tbody>
       <?php
       if($result){
         while ($row = mysqli_fetch_assoc($result)) {
           echo('<tr>
             <td>'.$row['id'].'</td>
             <td>'.$row['name'].'</td>');
             if($row['mode']==1){echo('<td>Flight</td>');}
             elseif($row['mode']==2){echo('<td>Bus</td>');}
             else{echo('<td>Train</td>');}
             echo('<td>'.$row['date'].'</td>
             <td>'.$row['time'].'</td>
             <td>'.$row['fare'].'</td>');
             if($row['status']<0){echo('<td>Cancelled and Refunded</td>');}
             elseif ($row['status']==0) {echo('<td>Booking failed</td>');}
             elseif ($row['status']==1) {echo('<td>Booked</td>');}
             else{echo('<td>'.$row['status'].'</td>');}
             if(strtotime($row['date'])>time()){
             echo('
             <td><form action="cancel.php" method="POST">
                 <input type="hidden" name="ticket_id" value="'.$row['id'].'">
                  <button type="submit" class="btn btn-default">Cancel</button>
                 </form.</td>
           </tr>');}
           else {
             echo('<td>Date passed</td>');
           }
         }
       }
        ?>
     </tbody>
   </table>
 </div>

 </body>
 </html>
