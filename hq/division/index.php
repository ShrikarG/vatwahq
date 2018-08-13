<base href="http://hq.vatsimwa.com/" />
<?php include '../header.php';?>
<?php
error_reporting(0);
ini_set('display_errors', 0);
require '../admin/connect.php';

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
            <div class="card-body">
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-info"></i> Alert!</h5>
                  The Divisional and vACC Staff would like to know your thoughts and feedback about the Division. Help us to serve you better! :) <br>
                  <a href="https://vats.im/wa_feedback"><b>Click Here to fill in the Feedback Form!</b></a>
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

                <h3 class="profile-username text-center">VATSIM West Asia Division</h3>

                <p class="text-muted text-center">Division Info</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Name</b> <a class="float-right">West Asia (VATWA)</a>
                  </li>
                  <li class="list-group-item">
                    <b>Region</b> <a class="float-right">Asia (AS)</a>
                  </li>
                </ul>

                <a href="http://vatsimwa.com/" class="btn btn-primary btn-block"><b>Visit Website</b></a>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Staff</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="mailto:vatsimatco@gmail.com">
                <strong><i class="fa fa-user mr-1"></i>Vacant</strong>

                <p class="text-muted">
                  VATWA1 - Division Director<br>
                  Email : 
                </p></a>

                <hr>
                <a href="mailto:aditya.iyer@vatsimwa.com">
                <strong><i class="fa fa-user mr-1"></i> Aditya Iyer</strong>

                <p class="text-muted">
                VATWA3 - Division Training Director<br>
                Email : aditya.iyer@vatsimwa.com</p></a>
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
                  <li class="nav-item"><a class="active nav-link" href="#news" data-toggle="tab">Divisional News</a></li>
                  <li class="nav-item"><a class="nav-link" href="#resources" data-toggle="tab">Resources</a></li>
                  <li class="nav-item"><a class="nav-link" href="#social" data-toggle="tab">Social</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">



                  <div class="tab-pane" id="resources">
                    <!-- Post -->


                    <a href="division/docs">
                    <div class="callout callout-danger">
                  <h5>Documents and Tools</h5>

                  <p>Divisional Polcies , LOAs , etc</p>
                  </div>
                   </a>


                <a href="division/fss">
                <div class="callout callout-info">
                  <h5><h5>West Asia Flight Service Station</h5>
                  <p>Approved Controller List , Documentation and Sector Files</p>
                </div></a>


                <a href="admin/">
                <div class="callout callout-success">
                  <h5>Staff Utilities</h5>

                  <p>Staff Utilities for vACC Staff</p>
                </div>
               </a>
                    <!-- /.post -->
                  </div>

                  <!-- /.tab-pane -->
                  <div class="active tab-pane" id="news">
                
                <?php
                $records = array();

                if($result = $db->query("SELECT * FROM news ORDER BY id DESC LIMIT 5"));
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
                
                <table class="table table-bordered table-hover table-striped">
		<thead>
		<thead>
			<tr>
				<th>Division News</th>
			</tr>
		</thead>
		<tbody>

			<?php
			foreach($records as $cont)
			{
			?>

			<tr>
				<td>
				<?php
			     if($cont->type=='new_ctrl')
			     {
			         echo "<b>$cont->fname $cont->lname</b> joined as an $cont->status Air Traffic Controller in $cont->vacc";
			     }
			     elseif($cont->type=='upd_auth')
			     {
			         echo "<b>$cont->fname $cont->lname</b> is now authorised to control as a $cont->auth Controller in $cont->vacc!";
			     }
			     elseif($cont->type=='rating')
			     {
			         echo "Congratulations to <b>$cont->fname $cont->lname</b> for his Rating Upgrade to <b>$cont->rating</b> Rating!";
			     }
			     elseif($cont->type=='event')
			     {
			         echo "$cont->vacc is hosting <b>$cont->fname</b> Event on <b>$cont->lname</b>";
			     }
			     elseif($cont->type=='solo')
			     {
			         echo "Congratulations to <b>$cont->fname $cont->lname</b> for his Solo Approval for <b>$cont->rating</b>!";
			     }
			     
			     ?>
			    </td>
			
			</tr>

			<?php
			}
			?>
		</tbody>
	</table>
	
        
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="social">
                    
                    <a href="https://www.facebook.com/vatsimwa/?ref=bookmarks">
                <div class="callout callout-info">
                  <h5><img src="dist/img/fb.png" height="50px" width="50px">  &nbsp; Division Facebook Page</h5>
                </div></a>

                
                <a href="division/discord">
                <div class="callout callout-danger">
                  <h5><img src="dist/img/discord.png" height="50px" width="50px">  &nbsp;VATWA Division Discord</h5>
                </div></a>

                <a href="https://community.vatsimwa.com/">
                <div class="callout callout-success">
                  <h5><img src="dist/img/wa1.jpg" height="50px" width="50px">  &nbsp;Divisional Forums</h5>
                </div></a>

                </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
                            
            <div class="card">
            <div class="card-header">
              <h3 class="card-title">ATC Bookings</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>Callsign</th>
				<th>Date</th>
				<th>From</th>
				<th>To</th>
				<th>Booked By</th>
			</tr>
		</thead>
		<tbody>
            <?php
            $sql = "SELECT fname,lname,position,b_full_date,stime,etime from atcbooking WHERE euid!='0' AND b_full_date > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 1 DAY) ";
            $result = $db->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
             while($row = $result->fetch_assoc()) {
            ?>
            <tr>
            <td><?php echo $row["position"];?></td>
            <td>
            <?php $timestamp = strtotime($row["b_full_date"]);
                    $newDate = date('d-F-Y', $timestamp); 
                    echo $newDate
            ?>
            </td>
            <td><?php echo $row["stime"];?> Z</td>
            <td><?php echo $row["etime"];?> Z</td>
            <td><?php echo $row["fname"];?>&nbsp;<?php echo $row["lname"];?></td>
            
<?php
    }

}             
?>
        </tr></tbody></table>
           
            
            <center><a href="/calendar/" class="btn btn-danger">Activity Calendar</a> &nbsp; &nbsp;<a href="/atcbooking/" class="btn btn-info">Book ATC Slot</a></center>
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

<?php include '../footer.php';?>