<?php

require 'connect.php';

$sql = 'DELETE FROM atcbooking WHERE b_full_date < DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 1 DAY)';


if (mysqli_query($db, $sql)) {
      echo "Record deleted successfully";
   } else {
      echo "Error deleting record: " . mysqli_error($db);
   }
   
?>