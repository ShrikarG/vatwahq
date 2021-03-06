<base href="http://hq.vatsimwa.com/" />
<?php include '../../../header.php';?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../../admin/connect.php';


if(!empty($_POST))
{
	if(isset($_POST['rating'],$_POST['session_date'],$_POST['sess_start_time'],$_POST['sess_end_time'],$_POST['vacc']))
	{
	    $rating = ($_POST['rating']);
		$session_date = ($_POST['session_date']);
		$sess_start_time = ($_POST['sess_start_time']);
		$sess_end_time = ($_POST['sess_end_time']);
		$stu_id = $vatsimid;
		$vacc = ($_POST['vacc']);

		
		if(!empty($rating) && !empty($session_date) && !empty($sess_start_time) && !empty($sess_end_time) && !empty($vacc))
		{
			$insert = $db->prepare("INSERT INTO ins_slots(rating,session_date,sess_start_time,sess_end_time,stu_id,stu_email,vacc) VALUES (?,?,?,?,$vatsimid,?,?)"); 
			$insert->bind_param('ssiiss',$rating,$session_date,$sess_start_time,$sess_end_time,$email,$vacc);
			if($insert->execute())
			{
            header('Location:../');
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
        Add Your Availability
      </h3></rw12>
    </section>
    	<div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Request a Training Session</h3>
            </div>
	<div class="card-body">
	<form name="myForm" action="" method="post" onsubmit="return validateForm()">
	    
		<lable for="rating">Rating</lable>
	<select name = "rating" class="form-control">
		<option name="s1" id="s1">S1</option>
		<option name="s2" id="s2">S2</option>
		<option name="s3" id="s3">S3</option>
		<option name="c1" id="c1">C1</option>
	</select><hr>

    <lable>Session Date</lable>
    <input type="date" name="session_date" class="form-control"><hr>
    
    <lable for="event_name">Session Start Time (Zulu)</lable>
    <input type = "number" class="form-control" name="sess_start_time" placeholder="Eg : 0900 - Enter Numeric Value only " min = "0000" max = "2359"  maxlength="4" ><hr>
    
    <lable for="event_name">Session End Time (Zulu)</lable>
    <input type = "number" class="form-control" name="sess_end_time" placeholder="Eg : 2000 - Enter Numeric Value only " min = "0000" max = "2359"  maxlength="4"><hr>

    <lable for="event_name">Student VATSIM CID</lable>
    <input type = "text" class="form-control" placeholder="<?php echo $vatsimid;?>" disabled><hr>
    <lable for="event_name">vACC</lable>
    <?php
	$records = array();

if($result = $db->query("SELECT vacc FROM atc_roster where vatsimcid=$vatsimid"))
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
echo "<select name='vacc' class='form-control'>";
foreach($records as $cont)
			{
	
echo "<option>";    echo $cont->vacc; echo "</option>" ;
}
echo "</select>";

?>
<hr>
    <lable for="event_name">Student Email</lable>
    <input type = "text" class="form-control" placeholder="<?php echo $email;?>" disabled><hr>

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

<?php include '../../../footer.php';?>