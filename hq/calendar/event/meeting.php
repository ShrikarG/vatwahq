<?php
require 'connect.php';
session_start();
if (empty($_SESSION['logged_in']))
    {
        header('Location: ../../index.php');
        die("Not logged in");
    }
    else
    {
      $name = $_SESSION['name'];
    }

if(!empty($_POST))
{
	if(isset($_POST['mdate'],$_POST['mtime']))
	{
		$mdate = ($_POST['mdate']);
		$mtime = ($_POST['mtime']);
		$mtitle = ($_POST['mtitle']);
		$murl = ($_POST['murl']);
		if(!empty($mtime) && !empty($mdate))
		{
			$insert = $db->prepare("INSERT INTO meeting(title,mdate,mtime,url) VALUES (?,?,?,?)"); 
			$insert->bind_param('ssss',$mtitle,$mdate,$mtime,$murl);
			if($insert->execute())
			{
            header('Location:../index.php?p=success');
				die();
			}
		}
	}
}


?>

