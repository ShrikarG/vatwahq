<base href="http://hq.vatsimwa.com/" />
<?php include '../../../header.php';?>

<?php
 
if ($role==0||$role==1)
  {
?>
<?php
error_reporting(0);
require '../../../connect.php';

$records = array();

if($result = $db->query("SELECT * FROM apply where type='Resident'"))
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
       Training Requests
      </h3></rw12>
    </section>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Pending vACC Training Requests</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <table id="example1" class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
			    <th>vACC</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Rating</th>
				<th>Student Email</th>
				<th>Student CID</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>

			<?php
			foreach($records as $cont)
			{
			?>
        
			<tr>
			    <td><?php echo $cont->vacc; ?></td>
				<td><?php echo $cont->fname; ?></td>
				<td><?php echo $cont->lname; ?></td>
				<td><?php echo $cont->rating; ?></td>
				<td><?php echo $cont->stu_email; ?></td>
				<td><?php echo $cont->vatsimid; ?></td>
				
				<td>
				    <?php
				    if($cont->status == NULL)
				    {?>
				        <a class="btn btn-primary btn-block" href="admin/training/applications/resident/apply.php?id=<?php echo $cont->id; ?>&email=<?php echo $cont->stu_email; ?>">Accept</a>
				    <?php    
				    }
				    else
				    {
				        echo 'Accepted';
				    }
				     ?>
				        
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
    header("Location: ../../../unauth/");
}
?>
<?php include '../../../footer.php';?>


