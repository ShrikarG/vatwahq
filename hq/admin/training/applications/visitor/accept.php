<base href="http://hq.vatsimwa.com/" />
<?php include '../../../header.php';?>

<?php
 
if ($role==0||$role==1)
  {
?>
<?php
error_reporting(0);
require '../../../connect.php';

if(!empty($_GET))
{
	if(isset($_GET['id'],$_GET['email']))
	{
	    $id = ($_GET['id']);
		$email = ($_GET['email']);
        if(!empty($id))
		{
			$insert = $db->prepare("UPDATE apply SET status = 'Accepted' WHERE id='$id'"); 
			$insert->bind_param('i',$id);
			if($insert->execute())
			{
			    


                $to      = $email;
                $from = 'no-reply@vatsimwa.com';
                $subject = 'VATSIM West Asia Training Department';
                $headers .= 'Reply-To: ' . $email . "\r\n";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $message = "
<html>
<body>
<p>Dear Member,<br>
Your Application for Visitor Status has been accepted by a vACC HQ Administrator.<br>
Kindly visit ATC Training System in West Asia HQ to book a Mentoring Session!<br><br>
<i>This is an automated email. Please do not reply to this E-Mail</i>
</body>
</html>
";

                mail($to, $subject, $message, $headers,"-f$from");


            header('Location:../../../atc/add/');
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