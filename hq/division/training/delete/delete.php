<base href="http://hq.vatsimwa.com/" />
<?php include '../../../header.php';?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../../admin/connect.php';

if(!empty($_GET))
{
	if(isset($_GET['id']))
	{
	    $id = ($_GET['id']);
	    $vatsimcid = ($_GET['stu_id']);
	    
        if($vatsimcid!=$vatsimid)
        {
           header('Location: ../unauth/');
        }
        else
        {
		if(!empty($id))
		{
			$insert = $db->prepare("UPDATE ins_slots SET stu_id=NULL WHERE id='$id'"); 
			$insert->bind_param('i',$id);
			if($insert->execute())
			{
            header('Location: ' . $_SERVER['HTTP_REFERER']);
				die();
			}
		}
	}
	}
}
?>