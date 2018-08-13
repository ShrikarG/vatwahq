<?php

require 'connect.php';

$sql = 'DELETE FROM solo WHERE valid_from < DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 30 DAY)';


if (mysqli_query($db, $sql)) {
      echo "Record deleted successfully";
   } else {
      echo "Error deleting record: " . mysqli_error($db);
   }
   
?>