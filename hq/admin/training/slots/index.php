<base href="http://hq.vatsimwa.com/" />
<?php include '../../header.php';?>

<?php
 
if ($role==0||$role==1)
  {
?>
<?php
error_reporting(0);
require '../../connect.php';

$records = array();

if($result = $db->query("SELECT * FROM ins_slots"))
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

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!-- Main content -->

    <!-- Main content -->
    <section class="content-header">
      <h3><rw1>
       My Training Availability List
      </h3></rw12>
    </section>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Availability List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <table id="example1" class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
			    <th>Instructor ID</th>
				<th>Rating</th>
				<th>Session Date</th>
				<th>Start Time</th>
				<th>End Time</th>
				<th>Status</th>
				<th>Student Email</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>

			<?php
			foreach($records as $cont)
			{
			?>
		       	<?php
				$date = $cont->session_date;
                $newDate = date("d-m-Y", strtotime($date));?>
        <form action="admin/training/slots/add/index.php" method="get">
			<tr>
			    <td>
			        <?php
				    if($cont->ins_id == NULL)
				    {
				    ?>
				    <a class="btn btn-primary btn-block" href="admin/training/slots/book/index.php?id=<?php echo $cont->id; ?>&ins_id=<?php echo $vatsimid; ?>&stu_email=<?php echo $cont->stu_email; ?>&ins_email=<?php echo $email; ?>&sess_start_time=<?php echo $cont->sess_start_time; ?>&sess_end_time=<?php echo $cont->sess_end_time; ?>&rating=<?php echo $cont->rating; ?>&date=<?php echo $newDate?>">Book</a>
				    <?php
				    }
				    elseif($cont->ins_id == $vatsimid && $cont->stu_id!=NULL)
				    {
				    ?>
				    <a class="btn btn-danger btn-block" href="admin/training/slots/delete/delete.php?id=<?php echo $cont->id; ?>">Umm Change of Plans...Vacate my Slot!</a>
				    <?php
				    }
				    else
			        {
				        echo 'Booked by&nbsp;'.$cont->ins_id ;
				    }
				    ?>
				    </td>
				</form>
				<td><?php echo $cont->rating; ?></td>
			      
				<td><?php echo $newDate; ?>
				<td><?php echo $cont->sess_start_time; ?>Z</td>
				<td><?php echo $cont->sess_end_time; ?>Z</td>
				
				<td>
				    <?php
				    if($cont->stu_id == NULL)
				    {
				        echo 'Not Booked';
				    }
				    else
				    {
				        ?>
				        
				    Requested by&nbsp;<a href="https://cert.vatsim.net/vatsimnet/status.php?id=<?php echo $cont->stu_id; ?>"><?php echo $cont->stu_id; ?></a>
				    <?php
				    }
				    ?>
				    </td>
				    <td><?php echo $cont->stu_email; ?></td>
				    <td>
				        <a class="btn btn-primary btn-block" href="admin/training/slots/delete/index.php?id=<?php echo $cont->id; ?>">Delete</a>
				    </td>
				
			</tr>

			<?php
			}
			?>
		</tbody>
	</table>

	
                <!-- /.tab-content -->
              </div>
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
<?php
}
else
{
    header("Location: ../../unauth/");
}
?>
<?php include '../../footer.php';?>


