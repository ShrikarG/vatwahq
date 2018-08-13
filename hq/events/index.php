<?php
error_reporting(0);
ini_set('display_errors', 0);
?>
<base href="http://hq.vatsimwa.com/" />
<?php include '../header.php';?>
<?php
require '../admin/connect.php';

$records = array();

if($result = $db->query("SELECT * FROM events where event_date > NOW()"))
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
        View Published Events
      </h3></rw12>
    </section>
    	<div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List of Events</h3>
            </div>
	<div class="card-body">
	<table id="example1" class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
			    <th>Event Name</th>
				<th>Event Date</th>
				<th>vACC</th>
				<th>Book</th>
			</tr>
		</thead>
		<tbody>

			<?php
			foreach($records as $cont)
			{
			?>
        <form action="flights/view" method="get">
			<tr>
				</form>
				<td><?php echo $cont->event_name; ?></td>
				<td>
				    <?php $timestamp = strtotime($cont->event_date);
                    $newDate = date('d-F-Y', $timestamp); 
                    echo $newDate;?>
                </td>
				<td><?php echo $cont->vacc; ?></td>
				<td>
				    <a href="events/flights/index.php?id=<?php echo $cont->id; ?>&event_name=<?php echo $cont->event_name; ?>&date=<?php echo $newDate;?>" class="btn btn-primary btn-block">Book a Flight</a>
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

<?php include '../footer.php';?>

