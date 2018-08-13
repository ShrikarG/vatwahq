<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../connect.php';

$vatsimid= $_POST['vatsimid'];
$xml = simplexml_load_file("https://cert.vatsim.net/cert/vatsimnet/idstatus.php?cid=$vatsimid");
$fname = $xml->user->name_first;
$lname= $xml->user->name_last;
$callsign = $_POST['callsign'];
$position = $_POST['position'];
$vacc = $_POST['vacc'];

$sql = "INSERT INTO qr_staff(vatsimid,fname,lname,callsign,position,vacc,verify) VALUES('$vatsimid','$fname','$lname','$callsign','$position','$vacc','1')";

if ($db->query($sql) === TRUE) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>