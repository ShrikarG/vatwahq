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

if($result = $db->query("SELECT * FROM solo WHERE valid_from > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 30 DAY)"))
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
       Solo ATC Roster
      </h3></rw12>
    </section>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Solo Master List</h3>
            </div>
	<?php
	if(!count($records))
	{
		echo 'No Resident Controllers';
	}
	else
	{
		?>
			   <div class="card-body">
               <table class="table table-bordered table-hover table-striped">
		<thead>
		<thead>
			<tr>
				<th>VATSIM ID</th>
				<th>Name</th>
				<th>Rating</th>
				<th>vACC</th>
				<th>Position</th>
				<th>Valid From</th>
				<th>Valid Till</th>
			</tr>
		</thead>
		<tbody>

			<?php
			foreach($records as $cont)
			{
			?>

			<tr>
				<td><?php echo $cont->vatsimcid; ?></td>
				<td><?php echo $cont->fname; ?>&nbsp;<?php echo $cont->lname; ?></td>
				<td><?php echo $cont->rating; ?></td>
				<td><?php echo $cont->vacc; ?></td>
				<td><?php echo $cont->position; ?></td>
				<td><?php echo $cont->valid_from; ?></td>
				<td><?php echo $cont->valid_till; ?></td>
			</tr>

			<?php
			}
			?>
		</tbody>
	</table>

		<?php
		}
		?>
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
