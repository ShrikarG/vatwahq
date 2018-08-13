<base href="http://hq.vatsimwa.com/" />
<?php include '../../../header.php';?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../../admin/connect.php';

if(!empty($_GET))
{
	if(isset($_GET['id']))
	{
	    $id = ($_GET['id']);
		$ins_id = ($_GET['ins_id']);
        $stu_email = $email;
        $ins_email = ($_GET['ins_email']);
        $session_date = ($_GET['date']);
        $sess_start_time = ($_GET['sess_start_time']);
        $stu_id = $vatsimid;
        $sess_end_time = ($_GET['sess_end_time']);
        $rating = ($_GET['rating']);

		if(!empty($id))
		{
			$insert = $db->prepare("UPDATE ins_slots SET stu_id = ?,stu_email=? WHERE id='$id'"); 
			$insert->bind_param('is',$stu_id,$email);
			if($insert->execute())
			{
			    
                $to      = $ins_email;
                $from = 'no-reply@vatsimwa.com';
                $subject = 'VATSIM West Asia Training Department';
                $headers .= 'Reply-To: ' . $email . "\r\n";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $message = "
<html>
<body>
<p>Dear Instructor,<br>
The ATC Training Slot requested by you has been accepted by a Student.<br><br>
<b><u>ATC Training Session Details</b></u> : <br><br>
<b>Student</b> : $firstname $lastname ($vatsimid) <br>
<b>Rating</b> : $rating<br>
<b>Session Date : </b>$session_date<br>
<b>Session Start Time : </b>$sess_start_time Z<br>
<b>Session End Time : </b>$sess_end_time Z<br>
<b>Location</b> : West Asia Discord Server <br>
<i>This is an automated email. Please do not reply to this E-mail</i>
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

<?php include '../../../footer.php';?>