<?php
error_reporting(0);
require '../../admin/connect.php';
$data = array();

if($result = $db->query("SELECT id,CONCAT(vacc,' : ',rating) as title,session_date FROM ins_slot"))
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
    'start' => $run->session_date,
    ];

    $data[] = $obj;


    }
echo json_encode($data);

?>


