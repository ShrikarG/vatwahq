<base href="http://hq.vatsimwa.com/" />
<?php include '../../header.php';?>

<?php
require '../../admin/connect.php';

if(!empty($_POST))
{

	if(isset($_POST['id']))
	{
	    $id = ($_POST['id']);
        $flight_no = ($_POST['flight_no']);
        $dep_icao = ($_POST['dep_icao']);
        $arr_icao = ($_POST['arr_icao']);
        $dep_time = ($_POST['dep_time']);
        $arr_time = ($_POST['arr_time']);
        $route = ($_POST['route']);
        $event = ($_POST['event']);
        $event_date = ($_POST['date']);
		if(!empty($id))
		{
			$insert = $db->prepare("UPDATE flights SET status = 'Booked' , vatsimid='$vatsimid' WHERE id='$id'"); 
			$insert->bind_param('i',$vatsimid);
			if($insert->execute())
			{
			   
			   
                $to      = $email;
                $from = 'no-reply@vatsimwa.com';
                $subject = 'VATSIM West Asia Events Department';
                $headers .= 'Reply-To: ' . $email . "\r\n";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $message = "
<html>
<body>
<p>Dear $firstname $lastname,<br>
Your Flight Booking for $event is confirmed! Kindly Check your Flight Details below. <br><br>
<b><u>Flight Details for $event Event</b></u> : <br><br>

<b>Callsign</b> : $flight_no<br>
<b>Date </b>: $event_date<br>
<b>Departure Airport : </b>$dep_icao<br>
<b>Arrival Airport : </b>$arr_icao <br>
<b>Departure Time : </b>$dep_time Z<br>
<b>Arrival Time</b> : $arr_time Z<br>
<b>Route</b> : $route <br><br>

In case you want to cancel this Booking , please visit the West Asia HQ Flight Booking Page. We look forward to see you for the Event!<br><br>
<i>This is an automated email. Please do not reply to this mail.</i>
</body>
</html>
";

                mail($to, $subject, $message, $headers,"-f$from");
 
			   
           header('Location: ' . $_SERVER['HTTP_REFERER']);
				die();
			}
		}
	}
}
?>

<?php include '../../footer.php';?>