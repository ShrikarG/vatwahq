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

$records = array();

if($result = $db->query("SELECT * FROM flights"))
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
        Delete a Flight
      </h3></rw12>
    </section>
    	<div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Flights</h3>
            </div>
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
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>

			<?php
			foreach($records as $cont)
			{
			?>
        <form action="admin/flights/delete/delete.php" method="get">
			<tr>
				</form>
				<td><?php echo $cont->flight_no; ?></td>
				<td><?php echo $cont->dep_icao; ?></td>
				<td><?php echo $cont->arr_icao; ?></td>
				<td><?php echo $cont->dep_time; ?>Z</td>
				<td><?php echo $cont->arr_time; ?>Z</td>
				<td><?php 
				if($cont->status==NULL)
				{
				    echo 'Unbooked';
				}
				else
				{
				    echo 'Booked';
				}
				?>
				</td>
				<td>
				    <a href="admin/flights/delete/delete.php?id=<?php echo $cont->id;?>">Delete</a>
				</td>
				
			</tr>

			<?php
			}
			?>
		</tbody>
	</table>
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