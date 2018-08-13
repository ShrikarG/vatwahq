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

if(!empty($_POST))
{
	if(isset($_POST['delete_event']))
	{
		$delete_event = ($_POST['delete_event']);

		if(!empty($delete_event))
		{
			    $insert = $db->prepare("DELETE FROM events WHERE event_name=?"); 
			    $insert->bind_param('s',$delete_event);
			    if($insert->execute())
			        {
				        header('Location: ' . $_SERVER['HTTP_REFERER']);
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
        Delete an Event
      </h3></rw12>
    </section>
                <div class="card-body">
                <div class="alert alert-danger">
                  <h5><i class="icon fa fa-ban"></i> Alert!</h5>
                  You can only Delete Events that were created by You. <br>Before Deleting an Event , make sure you delete All Flights of the event using "Delete all flights from an event option". This step is very Important!!
                </div>
    	<div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Event</h3>
            </div>
                
                
	<div class="card-body">
	<form action="" method="post">


<div class="form-group">
	
<?php
	$records = array();

if($result = $db->query("SELECT event_name FROM events where created_by=$vatsimid"))
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
echo "<select name='delete_event' class='form-control'>";
foreach($records as $cont)
			{
	
echo "<option>";    echo $cont->event_name; echo "</option>" ;
}
echo "</select>";

?>

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
<?php include '../../footer.php';?>