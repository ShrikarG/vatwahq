<?php
error_reporting(0);
require '../../../admin/connect.php';

$records = array();

if($result = $db->query("SELECT * FROM solo where vacc='Nepal vACC' AND valid_from > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 30 DAY"))
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

