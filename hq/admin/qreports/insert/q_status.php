<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../connect.php';

$qyear= $_POST['qyear'];
$vacc = $_POST['vacc'];
$submitted_by = $_POST['submitted_by'];

$sql = "INSERT INTO qr_status(qyear,vacc,submitted_by,q_status) VALUES('$qyear','$vacc','$submitted_by','1')";

if ($db->query($sql) === TRUE) {
    header('Location: ../dashboard/');
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}


?>