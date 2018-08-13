<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../connect.php';

$event_date= $_POST['event_date'];
$event_name= $_POST['event_name'];
$vacc = $_POST['vacc'];

$sql = "INSERT INTO events(event_name,event_date,vacc) VALUES('$event_name','$event_date','$vacc')";

if ($db->query($sql) === TRUE) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>