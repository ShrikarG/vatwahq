<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../connect.php';

$vatsimid= $_GET['vatsimcid'];

$sql1 = "UPDATE atc_roster SET verify='0' WHERE vatsimcid='$vatsimid'";

if ($db->query($sql1) === TRUE) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo "Error: " . $sql1 . "<br>" . $db->error;
}


?>