<?php
require 'connect.php';

if(!empty($_POST))
{
	if(isset($_POST['event_date'],$_POST['event_name']))
	{
		$event_date = ($_POST['event_date']);
		$event_name = ($_POST['event_name']);
		
		if(!empty($event_name) && !empty($event_date))
		{
			$insert = $db->prepare("INSERT INTO events(start,title) VALUES (?,?)"); 
			$insert->bind_param('ss',$event_date,$event_name);
			if($insert->execute())
			{
            header('Location:../index.php?p=success');
				die();
			}
		}
	}
}


?>

