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
	if(isset($_POST['loa_start'],$_POST['loa_end']))
	{
		$loa_start = ($_POST['loa_start']);
		$loa_end = ($_POST['loa_end']);
		$user = $name;
		if(!empty($loa_end) && !empty($loa_start))
		{
			$insert = $db->prepare("INSERT INTO loa(title,start,end) VALUES (?,?,?)"); 
			$insert->bind_param('sss',$user,$loa_start,$loa_end);
			if($insert->execute())
			{
            header('Location:../index.php?p=success');
				die();
			}
		}
	}
}


?>

