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

if(!empty($_POST))
{
	if(isset($_POST['session_date'],$_POST['sess_start_time'],$_POST['sess_end_time'],$_POST['stu_id'],$_POST['notes']))
	{
		$session_date = ($_POST['session_date']);
		$sess_start_time = ($_POST['sess_start_time']);
		$sess_end_time = ($_POST['sess_end_time']);
		$stu_id = ($_POST['stu_id']);
		$ins_id = $vatsimid;
		$notes = ($_POST['notes']);

		
		if(!empty($session_date) && !empty($sess_start_time) && !empty($sess_end_time) && !empty($stu_id) && !empty($notes))
		{
			$insert = $db->prepare("INSERT INTO training(session_date,sess_start_time,sess_end_time,stu_id,ins_id,notes) VALUES (?,?,?,?,$vatsimid,?)"); 
			$insert->bind_param('siiis',$session_date,$sess_start_time,$sess_end_time,$stu_id,$notes);
			if($insert->execute())
			{
            header('Location:../../');
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
        Add a Training Note
      </h3></rw12>
    </section>
    	<div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Add a Training Session</h3>
            </div>
	<div class="card-body">
	<form action="" method="post">

    <lable>Session Date</lable>
    <input type="date" name="session_date" class="form-control"><hr>
    
    <lable for="event_name">Session Start Time</lable>
    <input type = "number" class="form-control" name="sess_start_time" placeholder="Eg : 2000 - Enter Numeric Value only " maxlength="4" min="0000" max="2359"><hr>
    
    <lable for="event_name">Session End Time</lable>
    <input type = "number" class="form-control" name="sess_end_time" placeholder="Eg : 2000 - Enter Numeric Value only "maxlength="4" min="0000" max="2359"><hr>
    
    <lable for="event_name">Student VATSIM CID</lable>
    <input type = "number" class="form-control" name="stu_id" placeholder="Eg : 1217255 - Enter Numeric Value only "maxlength="7"><hr>
    
    <lable for="event_name">Instructor VATSIM CID</lable>
    <input type = "text" class="form-control" placeholder="<?php echo $vatsimid;?>" disabled><hr>


	<lable for="event_name">Training Notes</lable>
    <textarea name="notes" class="form-control"></textarea><hr>
	
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
    header("Location: ../../../unauth/");
}
?>
<script>
  $(document).ready(function() {
    $("#session_date").datepicker({
    });
  });
  </script>
<?php include '../../../footer.php';?>