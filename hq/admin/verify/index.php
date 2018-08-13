<base href="http://hq.vatsimwa.com/" />
<?php include '../header.php';?>


<?php
if (!isset($_SESSION['username'])){
header("Location: http://hq.vatsimwa.com/");
} else {
$vatsimid = $_SESSION['username'];
}
?>

<?php
if ($role=='0'||$role=='1'||$role=='2')
{
    header("Location: http://hq.vatsimwa.com/admin/console");
}
else
{
    header("Location: ../unauth/");
}
?>
