<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../connect.php';

$event = ($_POST['event']);
$records = array();

if($result = $db->query("SELECT id FROM events where event_name='$event'"))
{
		if($result->num_rows)
			{
				while($row  = $result->fetch_object())
				{
					$records[] = $row;
				}
				$result->free();
			}
}
$event_id = $records[0]->id;

if(!empty($_POST))
{
	if(isset($_POST['event'],$_POST['flight_no'],$_POST['dep_icao'],$_POST['arr_icao'],$_POST['dep_time'],$_POST['arr_time']))
	{
		$event = ($_POST['event']);
		$flight_no = ($_POST['flight_no']);
		$dep_icao = ($_POST['dep_icao']);
		$arr_icao = ($_POST['arr_icao']);
		$dep_time = ($_POST['dep_time']);
		$arr_time = ($_POST['arr_time']);
		$route = ($_POST['route']);

		if(!empty($event) && !empty($flight_no) && !empty($dep_icao) && !empty($arr_icao) && !empty($dep_time) && !empty($arr_time))
		{
			$insert = $db->prepare("INSERT INTO flights(event,event_id,flight_no,dep_icao,arr_icao,dep_time,arr_time,route) VALUES (?,$event_id,?,?,?,?,?,?)"); 
			$insert->bind_param('ssssiis',$event,$flight_no,$dep_icao,$arr_icao,$dep_time,$arr_time,$route);
			if($insert->execute())
			{
            header('Location:../../');
				die();
			}
		}
	}
}


?>