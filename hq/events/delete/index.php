<?php
error_reporting(0);
ini_set('display_errors', 0);
?>
<base href="http://hq.vatsimwa.com/" />
<?php include '../../header.php';?>
<?php
require '../../admin/connect.php';

if(!empty($_GET))
{
	if(isset($_GET['id']))
	{
	    $id = ($_GET['id']);
	    $vatsimcid = ($_GET['vatsimid']);
	    
        if($vatsimcid!=$vatsimid)
        {
           header('Location: ../unauth/');
        }
        else
        {
		if(!empty($id))
		{
			$insert = $db->prepare("UPDATE flights SET status = NULL , vatsimid=NULL WHERE id='$id'"); 
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