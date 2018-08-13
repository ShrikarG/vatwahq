<?php
error_reporting(0);
require '../../admin/connect.php';
$data = array();

if($result = $db->query("SELECT * FROM events"))
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


foreach($records as $run)
{

    $obj = (object) [
    'id' => $run->id,
    'title' => $run->event_name,
    'start' => $run->event_date,
    ];

    $data[] = $obj;

}
echo json_encode($data);

?>


