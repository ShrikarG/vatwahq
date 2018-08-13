<base href="http://hq.vatsimwa.com/" />
<?php include '../../../header.php';?>
<?php
 
if ($role==0||$role==1)
  {
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../../connect.php';

if(!empty($_GET))
{
	if(isset($_GET['id'],$_GET['ins_id']))
	{
	    $id = ($_GET['id']);
		$ins_id = ($_GET['ins_id']);
        $stu_email = ($_GET['stu_email']);
        $ins_email = $email;
        $session_date = ($_GET['date']);
        $sess_start_time = ($_GET['sess_start_time']);
        
        $sess_end_time = ($_GET['sess_end_time']);
        $rating = ($_GET['rating']);
		if(!empty($ins_id))
		{
			$insert = $db->prepare("UPDATE ins_slots SET ins_id = ?,ins_email=? WHERE id='$id'"); 
			$insert->bind_param('is',$ins_id,$ins_email);
			if($insert->execute())
			{
			    


                $to      = $stu_email;
                $from = 'no-reply@vatsimwa.com';
                $subject = 'VATSIM West Asia Training Department';
                $headers .= 'Reply-To: ' . $email . "\r\n";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $message = "
<html>
<body>
<p>Dear Member,<br>
The ATC Training Slot requested by you has been accepted by an Instructor.<br><br>
<b><u>ATC Training Session Details</b></u> : <br><br>
<b>Instructor</b> : $firstname $lastname <br>
<b>Rating</b> : $rating<br>
<b>Session Date : </b>$session_date<br>
<b>Session Start Time : </b>$sess_start_time Z<br>
<b>Session End Time : </b>$sess_end_time Z<br>
<b>Location</b> : West Asia Discord Server <br>
<i>This is an automated email.</i>
</body>
</html>
";

                mail($to, $subject, $message, $headers,"-f$from");


            header('Location:../');
				die();
			}
		}
	}
}


?>

<?php
}
else
{
    header("Location: ../../../unauth/");
}
?>
<?php include '../../../footer.php';?>