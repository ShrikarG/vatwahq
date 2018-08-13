<base href="http://hq.vatsimwa.com/" />
<?php include '../../header.php';?>

<?php
error_reporting(0);
require '../../admin/connect.php';

$records = array();
if($result = $db->query("SELECT * FROM atcbooking WHERE vatsimid=$vatsimid"))
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
        Your ATC Bookings!
      </h3></rw12>
    </section>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">ATC Booking</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>Position</th>
				<th>Date</th>
				<th>Start Time</th>
				<th>End Time</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>

			<?php
			foreach($records as $cont)
			{
			?>

			<tr>
				<td><?php echo $cont->position; ?></td>
				<td><?php echo $cont->b_full_date; ?></td>
				<td><?php echo $cont->stime; ?></td>
				<td><?php echo $cont->etime; ?></td>
				<td>
				 <a class="btn btn-danger" href ="http://vatbook.euroutepro.com/atc/delete.asp?Local_URL=http://hq.vatsimwa.com/user/atcbooking/delete.php&EU_ID=<?php echo $cont->euid; ?>&Local_ID=<?php echo $cont->id; ?>">Delete Booking</a>
				</td>
			</tr>

			<?php
			}
			?>
		</tbody>
	</table>

                  </div></div></div>
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

<?php include '../../footer.php';?>


