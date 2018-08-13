<?php
error_reporting(0);
ini_set('display_errors', 0);
?>
<base href="http://hq.vatsimwa.com/" />

<?php include '../../../header.php';?>

<?php
error_reporting(0);
ini_set('display_errors', 0);
require '../../../admin/connect.php';

$records = array();

if($result = $db->query("SELECT * FROM atc_roster"))
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
        Division Controller Roster
      </h3></rw12>
    </section>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">West Asia Air Traffic Controllers</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>VATSIM ID</th>
				<th>Name</th>
				<th>Rating</th>
				<th>vACC</th>
				<th>Status</th>
				<th>Authorisation</th>
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
				<td><?php echo $cont->status; ?></td>
				<td>
					
			<?php
				    if ($cont->auth == 'NoAut')
					{
						echo 'No Authorisation';
					}
					elseif ($cont->auth == 'DEL') 
					{
						echo 'DEL';
					}
					elseif ($cont->auth == 'GND') 
					{
						echo 'DEL , GND';
					}
					elseif ($cont->auth == 'TWR') 
					{
						echo 'DEL , GND , TWR';
					}
					elseif ($cont->auth == 'APP') 
					{
						echo 'DEL , GND , TWR , APP';
					}
					elseif ($cont->auth == 'CTR') 
					{
						echo 'DEL , GND , TWR , APP , CTR';
					}
					elseif ($cont->auth == 'FSS') 
					{
						echo 'ASIA_W_FSS';
					}
					?>
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

<?php include '../../../footer.php';?>