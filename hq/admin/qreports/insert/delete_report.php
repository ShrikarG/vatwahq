<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../connect.php';
require '../../header.php';

$vacc= $_GET['vacc'];
$submitted_by = $_GET['submitted_by'];
$qyear = $_GET['qyear'];

if($submitted_by==$vatsimid)
{
$sql1 = "DELETE from qr_status WHERE vacc='$vacc' AND qyear='$qyear'";

if ($db->query($sql1) === TRUE) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo "Error: " . $sql1 . "<br>" . $db->error;
}
    }

else
{
    echo "Not Authorised to Delete!";
}

?>