<base href="http://hq.vatsimwa.com/" />
<?php include '../../header.php';?>
<?php
 
if ($role==0||$role==1||$role==2)
  {
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../connect.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!-- Main content -->
                    <div class="alert alert-info alert-dismissible">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-info"></i> Alert!</h5>
                 If you are tired of adding single flights , you can feed the date in the CSV file from the Admin Documents and send it to vatsimatco@gmail.com
                </div>
    <!-- Main content -->
    <section class="content-header">
      <h3><rw1>
        Add Flights
      </h3></rw12>
    </section>
    	<div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Add Flights</h3>
            </div>
	<div class="card-body">
	<form action="admin/flights/add/add.php" method="post">
	    
	    <div class="form-group">
    
    <lable for="event_name">Event</lable>
    
    <?php
	$records = array();

if($result = $db->query("SELECT event_name , id FROM events"))
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
echo "<select name='event' class='form-control'>";
foreach($records as $cont)
{
echo"<option>";  echo $cont->event_name; echo "</option>" ;
}
echo "</select>";

?><hr>
    
    <lable for="event_name">Flight Number</lable>
	<input type = "text" class="form-control" name="flight_no" id="flight_no"><hr>
	
	<lable for="dep">Departure ICAO</lable>
	<input type = "text" class="form-control" name="dep_icao" id="dep" maxlength="4"><hr>
	
	<lable for="arr">Arrival ICAO</lable>
	<input type = "text" class="form-control" name="arr_icao" id="arr" maxlength="4"><hr>
	
	<lable for="arr">Departure Time</lable>
	<input type = "number" class="form-control" name="dep_time" placeholder="Eg : 0200 - Enter Numeric Value only " min = "0000" max = "2359"  maxlength="4"><hr>
	
	<lable for="arr">Arrival Time</lable>
	<input type = "number" class="form-control" name="arr_time" placeholder="Eg : 0300 - Enter Numeric Value only " min = "0000" max = "2359"  maxlength="4"><hr>
	
	<lable for="arr">Route</lable>
	<input type = "text" class="form-control" name="route" placeholder="Enter Route (Optional) "><hr>
    
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
    $("#session_date").datepicker({
    });
  });
  </script>
<?php include '../../footer.php';?>