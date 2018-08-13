<base href="http://hq.vatsimwa.com/" />
<?php include '../header.php';?>
<?php
error_reporting(0);
ini_set('display_errors', 0);
?>

<?php
require '../admin/connect.php';
$records = array();

if($result = $db->query("SELECT * FROM atc_roster WHERE vatsimcid='$vatsimid'"))
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
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa fa-plane"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pilot Hours</span>
                <span class="info-box-number"><rw1><h4><?php echo $pilottime;?></h4></rw1></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa fa-superpowers"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pilot Rating</span>
                <span class="info-box-number">
                    <rw1><h4><?php
                if($pilot_rating=='0'){
                    echo 'Inactive';
                }
                elseif($pilot_rating=='1'){
                    echo 'P1';
                }
                elseif($pilot_rating=='3'){
                    echo 'P1,P2';
                }
                elseif($pilot_rating=='4'){
                    echo 'P3';
                }
                elseif($pilot_rating=='5'){
                    echo 'P1,P3';
                }
                elseif($pilot_rating=='7'){
                    echo 'P1,P2,P3';
                }
                elseif($pilot_rating=='9'){
                    echo 'P1,P4';
                }
                elseif($pilot_rating=='11'){
                    echo 'P1,P2,P4';
                }
                 elseif($pilot_rating=='15'){
                    echo 'P1,P2,P3,P4';
                }
                elseif($pilot_rating=='31'){
                    echo 'P1,P2,P3,P4,P5';
                }
                ?></h4></rw1>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa fa-user-secret"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">ATC Hours</span>
                <span class="info-box-number"><rw1><h4><?php echo $atctime;?></h4></rw1></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">ATC Rating</span>
                <span class="info-box-number"><rw1><h4><?php
                if($atc_id=='0'){
                    echo 'Inactive';
                }
                elseif($atc_id=='1'){
                    echo 'OBS';
                }
                elseif($atc_id=='2'){
                    echo 'S1';
                }
                elseif($atc_id=='3'){
                    echo 'S2';
                }
                elseif($atc_id=='4'){
                    echo 'S3';
                }
                elseif($atc_id=='5'){
                    echo 'C1';
                }
                elseif($atc_id=='7'){
                    echo 'C3';
                }
                elseif($atc_id=='8'){
                    echo 'I1';
                }
                 elseif($atc_id=='10'){
                    echo 'I3';
                }
                elseif($atc_id=='11'){
                    echo 'SUP';
                }
                elseif($atc_id=='12'){
                    echo 'ADM';
                }
                
                ?></h4></rw1></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="dist/img/wa1.jpg"
                       alt="User profile picture">
                </div>

                <h4 class="profile-username text-center"><?php echo $firstname; echo'&nbsp'; echo $lastname;?></h4>

                <p class="text-muted text-center">User Information</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>VATSIM CID</b> <a class="float-right"><?php echo $vatsimid; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>vACC</b> <a class="float-right">
                    <?php 
                    if($subdivision_code==NULL)
                    {
                        echo 'vACC not Assigned in CERT';
                    }
                    else
                    {
                        echo $subdivision_name; echo '('.$subdivision_code.')'; 
                    }
                    ?>
                    </a>
                  </li>
                  <li class="list-group-item">
                    <b>Division</b> <a class="float-right"><?php echo $division_name; echo '('.$division_code.')'; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Region</b> <a class="float-right"><?php echo $region_name; echo '('.$region_code.')'; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Member Since</b> <a class="float-right"><?php echo date("M d, Y", strtotime($joindate)); ?></a>
                  </li>
                </ul>

                <a href="https://stats.vatsim.net/" class="btn btn-primary btn-block"><b>View Full Statistics</b></a>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
        
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
            <div class="card-header">
              <h4 class="card-title">vACC ATC Authorisation</h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php
                if($records==NULL)
                {
                    echo "<center><rw1>";echo "No Authorisation!";"</center></rw1>";
                }
                else
                {
                    ?>
               <table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
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
    <?php
                }
                ?>
	
                <!-- /.tab-content -->
              </div>
                
                <!-- /.tab-content -->
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
  <?php include '../footer.php';?>