<base href="http://hq.vatsimwa.com/" />
<?php include '../../../../header.php';?>
<?php 
if($division_code!='WA')
{
    header('Location: ../unauth/');
}
else
{?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../../../admin/connect.php';


if(!empty($_POST))
{
	if(isset($_POST['rating'],$_POST['vacc']))
	{
	    $rating = ($_POST['rating']);
		$vacc = ($_POST['vacc']);
        $type = 'Resident';
		
		if(!empty($rating) && !empty($vacc))
		{
			$insert = $db->prepare("INSERT INTO apply(vatsimid,type,fname,lname,stu_email,vacc,rating) VALUES (?,?,?,?,?,?,?)"); 
			$insert->bind_param('issssss',$vatsimid,$type,$firstname,$lastname,$email,$vacc,$rating);
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
$firstname $lastname ($vatsimid) has requested ATC Training for $rating Rating. <br>
If he is new ATC Trainee , Kindly Assign him 'No Auth' in vACC Authorisations so that he can reqest for ATC Training.<br><br>
<i>This is an automated email. Please do not reply to this mail.</i>
</body>
</html>
";
                if($vacc=='India vACC')
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
        Apply for ATC Training - Resident
      </h3></rw12>
    </section>
    	<div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Resident Training Form</h3>
            </div>
	<div class="card-body">
	<form name="myForm" action="" method="post" onsubmit="return validateForm()">

    <lable for="event_name">Student First Name</lable>
    <input type = "text" class="form-control" placeholder="<?php echo $firstname;?>" disabled>&nbsp;<lable for="event_name">Student Last Name</lable>
    <input type = "text" class="form-control" placeholder="<?php echo $lastname;?>" disabled><hr>
    
    <lable for="event_name">Student VATSIM CID</lable>
    <input type = "text" class="form-control" placeholder="<?php echo $vatsimid;?>" disabled><hr>
    
        <lable for="event_name">Student Email</lable>
    <input type = "text" class="form-control" placeholder="<?php echo $email;?>" disabled><hr>
    
        <lable for="rating">Training For</lable>
	    <select name = "rating" class="form-control">
		<option name="s1" id="s1">S1</option>
		<option name="s2" id="s2">S2</option>
		<option name="s3" id="s3">S3</option>
		<option name="c1" id="c1">C1</option>
	    </select><hr>

    
    <lable for="event_name">vACC</lable>
    <lable for="vacc">vACC</lable>
	<select name = "vacc" class="form-control">
		<option name="india" id="india">India vACC</option>
		<option name="pakistan" id="pakistan">Pakistan vACC</option>
		<option name="nepal" id="nepal">Nepal vACC</option>
		<option name="srm" id="srm">SRM vACC</option>
	</select>
    <hr>
    
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
<script>
  $(document).ready(function() {
    $("#session_date").datepicker({
    });
  });
  </script>
  <script>
function validateForm() {
    var x = document.forms["myForm"]["sess_start_time"].value;
    var y = document.forms["myForm"]["sess_end_time"].value;
    var x1 = document.forms["myForm"]["sess_start_time"].value.length;
    var y1 = document.forms["myForm"]["sess_end_time"].value.length;
    if (x == ""||y == "") {
        alert("Session Start Time or End Time Empty");
        return false;
    }
     
     if (x1!='4'|y1!='4') {
        alert("Please enter 4 Numeric Digits");
        return false;
     }  
}
</script>
<?php
}?>
<?php include '../../../../footer.php';?>