<base href="http://hq.vatsimwa.com/" />
<?php include '../../header.php';?>

<?php
 
if ($role==0||$role==1||$role==2)
  {
?>
<?php
error_reporting(0);
require '../../connect.php';
?>
<?php
if(!empty($_GET))
{
	if(isset($_GET['id']))
	{
	    $id = ($_GET['id']);

		if(!empty($id))
		{
			$insert = $db->prepare("DELETE FROM flights WHERE id='$id'"); 
			$insert->bind_param('i',$id);
			if($insert->execute())
			{
            header('Location:../');
				die();
			}
		}
	}
}
?>
<?php
}
else
{
    header("Location: ../../unauth/");
}
?>
