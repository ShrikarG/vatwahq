<base href="http://hq.vatsimwa.com/" />
<?php include '../../header.php';?>
<?php
error_reporting(0);
require '../../admin/connect.php';

    $check = array();
	if($result = $db->query("SELECT * FROM atc_roster where vatsimcid=$vatsimid"))
{
		if($result->num_rows)
			{
				while($row  = $result->fetch_object())
				{
					$check[] = $row;
				}
				$result->free();
			}
}

if($check!=NULL)
{
?>
    
<?php

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
       VATWA Instructor/Mentor Availability List
      </h3></rw12>
    </section>
            <!--<div class="card">
            <div class="card-header">
              <h3 class="card-title">Important Instructions</h3>
            </div>
            <!-- /.card-header 
            <div class="card-body">
                </div>
                </div> -->
                
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Availability List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <table id="example1" class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
			    <th>Instructor</th>
				<th>Training For</th>
				<th>Session Date</th>
				<th>Start Time</th>
				<th>End Time</th>
				<th>vACC</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>

			<?php
			foreach($records as $cont)
			{
			?>
            <form action="division/training/book/index.php" method="get">
			<tr>
			    <td><?php
				    if($cont->ins_id == NULL)
				    {
				    ?>
				    <i>No Instructor Assigned Yet!</i>
				    <?php
				    }
				    else
				    {
				        ?>
			       <a href="https://cert.vatsim.net/vatsimnet/status.php?id=<?php echo $cont->ins_id; ?>" target="_blank"> <font color="blue"><b><?php echo $cont->ins_id; ?></a></b></font>
			        <?php
				    }
			        ?></td>
				<td><?php echo $cont->rating; ?></td>
				<?php
				$date = $cont->session_date;
                $newDate = date("d-m-Y", strtotime($date));?>
				<td><?php echo $newDate; ?>
				<td><?php echo $cont->sess_start_time; ?>Z</td>
				<td><?php echo $cont->sess_end_time; ?>Z</td>
				<td><?php echo $cont->vacc; ?></td>
				<td>
				    <?php
				    if($cont->stu_id == NULL)
				    {
				    ?>
				    <a class="btn btn-primary btn-block" href="division/training/book/index.php?id=<?php echo $cont->id; ?>&ins_email=<?php echo $cont->ins_email; ?>&sess_start_time=<?php echo $cont->sess_start_time; ?>&sess_end_time=<?php echo $cont->sess_end_time; ?>&rating=<?php echo $cont->rating; ?>&date=<?php echo $newDate?>">Book</a>
				    <?php
				    }
				    elseif($cont->stu_id == $vatsimid && $cont->ins_id == NULL)
				    {
				    ?>
				    <a class="btn btn-danger btn-block" href="division/training/delete/index.php?id=<?php echo $cont->id; ?>&stu_id=<?php echo $vatsimid; ?>">Delete My Booking!</a>
				    <?php
				    }
				    elseif($cont->stu_id == $vatsimid && $cont->ins_id!= NULL)
				    {
				    ?>
				    <a class="btn btn-danger btn-block" href="division/training/delete/delete.php?id=<?php echo $cont->id; ?>&stu_id=<?php echo $vatsimid; ?>">Umm Change of Plans...Vacate my Slot!</a>
				    <?php
				    }
				    elseif($cont->ins_id == NULL)
				    {
				    ?>
				    <a href="https://cert.vatsim.net/vatsimnet/status.php?id=<?php echo $cont->stu_id; ?>" target="_blank">Requested by <font color="blue"><b><?php echo $cont->stu_id; ?></a></b></font>
				    <?php
				    }
				    else
				    {
				    ?>
				    <a href="https://cert.vatsim.net/vatsimnet/status.php?id=<?php echo $cont->stu_id; ?>" target="_blank">Booked by <font color="blue"><b><?php echo $cont->stu_id; ?></a></b></font>
				    <?php
				    }
				    ?>
				    </td>
				
			</tr>
			
            </form>
			<?php
			}
			?>
		</tbody>
	</table>
	</div>
	</div>
                <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                 <h3 class="card-title">
                <center>If no slots are suiting to your availability , post your own Availability!<br><hr>
                <a href="division/training/add"><button type="button" class="btn btn-primary">Request a Slot</button></a></center>
                </div>
                </div>
	
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
   header('Location: ../training/error/');
}
?>
<?php include '../../footer.php';?>


