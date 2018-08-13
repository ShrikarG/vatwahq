<base href="http://hq.vatsimwa.com/" />
<?php include '../../../header.php';?>

<?php
 
if ($role==0||$role==1)
  {
?>

<?php
error_reporting(0);
require '../../../connect.php';

$stu_id = ($_GET['stu_id']);
$records = array();
if($result = $db->query("SELECT * FROM training WHERE stu_id=$stu_id"))
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
       Training Notes for <?php echo $stu_id;?>
      </h3></rw12>
    </section>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Training Notes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                 <ul class="timeline timeline-inverse">
			<?php
			foreach($records as $cont)
			{

			?>
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-danger">
                        <?php $date = date("F d, Y", strtotime($cont->session_date));
                        echo $date;?>
                        
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><b>Session Time&nbsp;:&nbsp;<?php echo $cont->sess_start_time.'Z&nbsp;'.'&nbsp;-&nbsp;'.$cont->sess_end_time.'Z'; ?></b> </span>

                          <h3 class="timeline-header">Instructor ID : <?php echo $cont->ins_id; ?></h3>

                          <div class="timeline-body">
                            <?php echo $cont->notes; ?>
                          </div>
                          
                          	<?php
			}
			?>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      
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


