<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../connect.php';

$vatsimid= $_GET['vatsimid'];

$sql1 = "UPDATE qr_staff SET verify='1' WHERE vatsimid='$vatsimid'";

if ($db->query($sql1) === TRUE) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo "Error: " . $sql1 . "<br>" . $db->error;
}


?>