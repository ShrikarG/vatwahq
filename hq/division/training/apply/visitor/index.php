<base href="http://hq.vatsimwa.com/" />
<?php include '../../../../header.php';?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../../../admin/connect.php';


if(!empty($_POST))
{
	if(isset($_POST['vacc']))
	{
		$vacc = ($_POST['vacc']);
		$reason = ($_POST['reason']);
        $type = 'Visitor';
		
		if(!empty($vacc))
		{
			$insert = $db->prepare("INSERT INTO apply(vatsimid,type,fname,lname,stu_email,vacc,rating,stu_reason) VALUES (?,?,?,?,?,?,?,?)"); 
			$insert->bind_param('isssssss',$vatsimid,$type,$firstname,$lastname,$email,$vacc,$atc_rating,$reason);
			if($insert->execute())
			{
			    
			    
                $from = 'no-reply@vatsimwa.com';
                $subject = 'VATSIM West Asia Training Department';
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $message = "
<html>
<body>
<p>To Training Director,<br>
$firstname $lastname ($vatsimid) has requested for Visitor Status in your vACC.<br>
Kindly Assign him 'No Auth' in vACC Authorisations so that he can reqest for Mentoring Session.<br><br>

<b><u>Applicant Details :</b></u><br><br>
<b>Name : </b> $firstname $lastname<br>
<b>VATSIM CID :</b>$vatsimid <br>
<b>Home Division</b> : $division_name<br>
<b>Rating</b> : $atc_rating<br>
<b>Reason for Visiting</b> : $reason<br><br>
<i>This is an automated email. Please do not reply to this E-mail.</i>
</body>
</html>
";
                if($vacc=='India vACC'||$vacc="West Asia FSS")
			    {
			        $to      = 'aditya.iyer3@gmail.com';
			    }
			    elseif($vacc=='Pakistan vACC')
			    {
			        $to = 'directoratc@pakvacc.com';
			    }
			    elseif($vacc=='Nepal vACC')
			    {
			        $to = 'nepalvacc@gmail.com';
			    }
			    elseif($vacc=='SRM vACC')
			    {
			        $to = 'milair@hotmail.com';
			    }
			    
                mail($to, $subject, $message, $headers,"-f$from");
                
                
            header('Location:../success/');
				die();
			}
		}
	}
}


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!-- Main content -->

    <!-- Main content -->
    <section class="content-header">
      <h3><rw1>
        Apply for Visiting Status
      </h3></rw12>
    </section>
    	<div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Visitor Form</h3>
            </div>
	<div class="card-body">
	<form name="myForm" action="" method="post" onsubmit="return validateForm()">

    <lable for="event_name">Applicant First Name : </lable>
    <input type = "text" class="form-control" placeholder="<?php echo $firstname;?>" disabled>&nbsp;<lable for="event_name">Applicant Last Name : </lable>
    <input type = "text" class="form-control" placeholder="<?php echo $lastname;?>" disabled><hr>
    
    <lable for="event_name">Applicant VATSIM CID : </lable>
    <input type = "text" class="form-control" placeholder="<?php echo $vatsimid;?>" disabled><hr>
    
        <lable for="event_name">Applicant Email : </lable>
    <input type = "text" class="form-control" placeholder="<?php echo $email;?>" disabled><hr>
    
    <lable for="event_name">Applicant Rating : </lable>
    <input type = "text" class="form-control" placeholder="<?php echo $atc_rating;?>" disabled><hr>

    
    <lable for="event_name">Which vACC would you like to Visit : </lable>
    <lable for="vacc">vACC</lable>
	<select name = "vacc" class="form-control">
		<option name="india" id="india">India vACC</option>
		<option name="pakistan" id="pakistan">Pakistan vACC</option>
		<option name="nepal" id="nepal">Nepal vACC</option>
		<option name="srm" id="srm">SRM vACC</option>
		<option name="wa" id="wa">West Asia FSS</option></option>
	</select>
    <hr>
    
    <lable for="event_name">Reason for Visiting (In Short) : </lable>
    <textarea name="reason" class="form-control"></textarea><hr>
    
	<input type="submit" class="btn btn-info value="Submit">

</div>
</form>
            </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>

<?php include '../../../../footer.php';?>