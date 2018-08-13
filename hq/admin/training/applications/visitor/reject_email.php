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
	if(($_GET['email']))
	{
	    $id = ($_GET['id']);
		$email = urldecode($_GET['email']);
		$reason = ($_GET['reason']);
        if(!empty($email))
		{
			$insert = $db->prepare("UPDATE apply SET status = 'Rejected' WHERE id='$id'"); 
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
Your Application for Visitor Status has been REJECTED by a vACC HQ Administrator.<br>
<b>Reason : </b> $reason<br>
If you have any questions , please do not hesitate to contact the vACC Staff<br><br>
<i>This is an automated email. Please do not reply to this E-Mail</i>
</body>
</html>
";

                mail($to, $subject, $message, $headers,"-f$from");


            header('Location: ../visitor/');
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