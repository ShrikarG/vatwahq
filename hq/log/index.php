<?php
require '../admin/connect.php';
$records = array();
if($result = $db->query("SELECT * FROM log"))
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
			foreach($records as $cont)
			{
			echo $cont->vatsimid;
			echo '&nbsp;&nbsp;';
			echo $cont->fname;
			echo '&nbsp;&nbsp;';
			echo $cont->lname;
			echo '&nbsp;&nbsp;';
			echo $cont->log_time;
			echo '<br>';
			}
?>