<?php
error_reporting(0);
require '../../admin/connect.php';
$data = array();

if($result = $db->query("SELECT id,CONCAT(position,' : ',stime,'Z - ',etime,'Z') as title,b_full_date FROM atcbooking"))
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
    'title' => $run->title,
    'start' => $run->b_full_date,
    ];

    $data[] = $obj;

}
echo json_encode($data);

?>


