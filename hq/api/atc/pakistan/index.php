<?php
error_reporting(0);
require '../../../admin/connect.php';

$records = array();

if($result = $db->query("SELECT * FROM atc_roster where vacc='Pakistan vACC'"))
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
$print_rec = json_encode($records);
echo $print_rec;
?>

