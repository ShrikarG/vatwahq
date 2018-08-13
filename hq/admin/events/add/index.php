<base href="http://hq.vatsimwa.com/" />
<?php include '../../header.php';?>

<?php
 
if ($role=='0'||$role=='1'||$role=='2')
  {
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../connect.php';

if(!empty($_POST))
{
	if(isset($_POST['event_name'],$_POST['vacc']))
	{
		$event_name = ($_POST['event_name']);
		$event_date = ($_POST['event_date']); 
		$vacc = ($_POST['vacc']);

		
		if(!empty($event_name) && !empty($vacc))
		{
			$insert = $db->prepare("INSERT INTO events(event_name,event_date,vacc,created_by) VALUES (?,?,?,?)"); 
			$insert->bind_param('sssi',$event_name,$event_date,$vacc,$vatsimid);
			if($insert->execute())
			{
			$query3 = "INSERT into news(type,fname,lname,vacc) values('event','$event_name','$event_date','$vacc')";
            $rup = $db->query($query3);
            header('Location:../../flights/add/');
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
        Add an Event
      </h3></rw12>
    </section>
    	<div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Add Event for Flight Bookings</h3>
            </div>
	<div class="card-body">
	<form action="" method="post">


<div class="form-group">
	<lable for="event_name">Event Name</lable>
	<input type = "text" class="form-control" name="event_name" id="event_name"><hr>
	
	
	<lable for="event_name">Event Date</lable>
    <input type="date" name="event_date" id="event_date" class="form-control"><hr>
	
	<lable for="vacc">vACC</lable>
	<select name = "vacc" class="form-control">
		<option name="india" id="india">India vACC</option>
		<option name="pakistan" id="pakistan">Pakistan vACC</option>
		<option name="nepal" id="nepal">Nepal vACC</option>
		<option name="srm" id="srm">SRM vACC</option>
	</select>
</div>

	<button type="submit" class="btn btn-info">Submit</button>

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
<?php
}
else
{
    header("Location: ../../unauth/");
}
?>
<script>
  $(document).ready(function() {
    $("#event_date").datepicker({
    });
  });
  </script>
<?php include '../../footer.php';?>