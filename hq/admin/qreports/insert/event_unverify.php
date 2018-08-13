<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../connect.php';

$event_name= $_GET['event_name'];

$sql1 = "UPDATE events SET verify='0' WHERE event_name='$event_name'";

if ($db->query($sql1) === TRUE) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo "Error: " . $sql1 . "<br>" . $db->error;
}


?>