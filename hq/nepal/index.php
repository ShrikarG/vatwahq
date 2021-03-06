<base href="http://hq.vatsimwa.com/" />
<?php include '../header.php';?>
<?php
error_reporting(0);
ini_set('display_errors', 0);
require '../admin/connect.php';

$records = array();

if($result = $db->query("SELECT * FROM atc_roster where vacc='Nepal vACC'"))
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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-danger card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="dist/img/nepal.png"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">VATSIM Nepal vACC</h3>

                <p class="text-muted text-center">vACC Information</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Name</b> <a class="float-right">Nepal (NPL)</a>
                  </li>
                  <li class="list-group-item">
                    <b>Division</b> <a class="float-right">West Asia (VATWA)</a>
                  </li>
                  <li class="list-group-item">
                    <b>Region</b> <a class="float-right">Asia (AS)</a>
                  </li>
                </ul>

                <a href="https://nepal.vatsimwa.com/" class="btn btn-danger btn-block"><b>Visit Website</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">vACC Staff</h3>
              </div>
              <!-- /.card-header -->
               <div class="card-body">
                <strong><i class="fa fa-user-circle-o" aria-hidden="true"></i> Bahaeddine El-Zerif</strong>

                <p class="text-muted">ACCNPL1 - vACC Director<br>
                                     <b>Email</b> : nepalvacc@gmail.com</p>
                  
                

                <hr>

                <strong><i class="fa fa-user-circle-o" aria-hidden="true"></i></i> Yazan Alothman</strong>

                <p class="text-muted">ACCNPL2 - vACC Deputy Director<br>
                                      <b>Email</b> : yazan0alothman@gmail.com</p>

                <hr>

                <strong><i class="fa fa-user-circle-o" aria-hidden="true"></i> VACANT</strong>

                <p class="text-muted">ACCNPL5 - vACC Membership Director<br>
                                    <b>Email</b> : </p>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
           <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#resources" data-toggle="tab">Resources</a></li>
                  <li class="nav-item"><a class="nav-link" href="#online" data-toggle="tab">Online Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#social" data-toggle="tab">Social</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">



                  <div class="active tab-pane" id="resources">
                    <!-- Post -->

                    <a href="nepal/docs">
                    <div class="callout callout-danger">
                  <h5>Documents and Tools</h5>

                  <p>ATC Manuals , Pilot Guides , SOPs ,Crib Sheets , Tutorials , etc</p>
                  </div>
                   </a>

                   <a href="nhttp://files.aero-nav.com/VNSM">
                <div class="callout callout-info">
                  <h5>ATC Sector Files</h5>

                  <p>EuroScope and VRC Sector Files</p>
                </div></a>


                <a href="https://nepal.vatsimwa.com/charts/">
                <div class="callout callout-warning">
                  <h5>Aeronautical Charts</h5>

                  <p>Aeronautical Charts for all Nepal airports</p>
                </div></a>

                <a href="nepal/scenery">
                    <div class="callout callout-danger">
                  <h5>Sceneries and AFCAD</h5>

                  <p>Freeware and Payware Sceneries for FSX , P3D and XPlane</p>
                  </div>
                   </a>

                
                <a href="admin/">
                <div class="callout callout-success">
                  <h5>Staff Utilities</h5>

                  <p>Staff Utilities for vACC Staff</p>
                </div>
               </a>
                  
                    <!-- /.post -->
                  </div>




                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="online">
                   <?php
  echo "<!--Code by Joseph Donat Bolton 1289478-->";
 $cache_file = 'atctable.cache';
  if (file_exists($cache_file) && (filemtime($cache_file) > (time() - 60 * 2 ))) {
    $tablerows = file_get_contents($cache_file);
  }
  else {
        $atcNAF = simplexml_load_file('http://api.vateud.net/online/atc/VN.xml');
        foreach ($atcNAF as $controller):
                $xploded = explode('_', $controller->callsign);
                if (strlen($xploded[0]) == 4){
                        if (in_array(end($xploded), array('DEL','GND','TWR', 'APP', 'DEP', 'CTR', 'FSS'), true) && $xploded[0] !== 'GULF'){
                          $name = $controller->name;
                          $frequency = $controller->frequency;
                          $callsign = $controller->callsign;
                          $row = "<tr> <td>$name</td> <td>$frequency MHz</td> <td>$callsign</td></tr>";
                          $tablerows .= $row;
                        }
                }
        endforeach;
  file_put_contents($cache_file, $tablerows, LOCK_EX);
}
if (!empty($tablerows)) {
  echo "                        <div class=\"panel margin-bottom-40\">
  <table class=\"table table-hover\">
    <thead>
        <tr>
            <th>Name</th>
            <th>Frequency</th>
            <th>Position</th>
        </tr>
    </thead>
    <tbody>
    $tablerows
    </tbody>
</table>
</div>
";
  }
  else {
    echo "
        <div class=\"animated fadeInLeft\"><span>No controllers currently online in Nepal!</span></div>";
  }
?>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="social">
                    
                    <a href="https://www.facebook.com/vatsimnepal/">
                <div class="callout callout-info">
                  <h5><img src="dist/img/fb.png" height="50px" width="50px">  &nbsp; vACC Facebook Page</h5>
                </div></a>

                
                <a href="nepal/docs">
                <div class="callout callout-danger">
                  <h5><img src="dist/img/discord.png" height="50px" width="50px">  &nbsp;VATWA Division Discord</h5>
                </div></a>

                <a href="https://community.vatsimwa.com/forum/15-nepal-vacc/">
                <div class="callout callout-success">
                  <h5><img src="dist/img/nepal.png" height="50px" width="50px">  &nbsp;vACC Forums</h5>
                </div></a>

                </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->

            <div class="card">
            <div class="card-header">
              <h3 class="card-title">vACC vACC Air Traffic Controllers</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>VATSIM ID</th>
				<th>Name</th>
				<th>Rating</th>
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
				<td><?php echo $cont->status; ?></td>
					<td>
					
			<?php
					if ($cont->auth == 'NoAut') 
					{
						echo 'Not Approved';
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
						echo 'DEL , GND , TWR , APP , CTR , FSS';
					}
					elseif ($cont->auth == 'FSS O') 
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

                  </div></div></div></div>
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