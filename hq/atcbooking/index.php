<base href="http://hq.vatsimwa.com/" />
<?php 
include '../header.php';
if($atc_id==1)
{
    echo "<h2>";
    echo "Sorry! You don't hold an ATC Rating yet.";
}
else
{
?>
<?php
error_reporting(0);
ini_set('display_errors', 0);

include '../admin/connect.php';

if(!empty($_POST))
{
	if(isset($_POST['position'],$_POST['b_day'],$_POST['sTime'],$_POST['eTime']))
	{
	    $position = ($_POST['position']);
		$b_day = ($_POST['b_day']);
        $stime = ($_POST['sTime']);
        $etime = ($_POST['eTime']);
		
		$time  = strtotime($b_day);
        $day   = date('d',$time);
        $month = date('m',$time);
        $year  = date('Y',$time);
        
     
        
		if(!empty($position) && !empty($b_day))
		{
			$insert = $db->prepare("INSERT INTO atcbooking(vatsimid,fname,lname,position,b_full_date,b_day,b_month,b_year,stime,etime) VALUES (?,?,?,?,?,?,?,?,?,?)"); 
			$insert->bind_param('issssiiiii',$vatsimid,$firstname,$lastname,$position,$b_day,$day,$month,$year,$stime,$etime);
			if($insert->execute())
			{
			   
			   header('Location:/atcbooking/confirm/');
				die();
				
			}
		}
	}
}


?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!-- Main content -->

    <!-- Main content -->
    <section class="content-header">
      <h3><rw1>
        Book a ATC Slot
      </h3></rw12>
    </section>
    <div class ="row">
    	<div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Book your ATC Slot</h3>
            </div>
	<div class="card-body">
	<form name="myForm" action="" method="post">
	    
	 <label>ATC Position :</label>
	 <input type="text" name="position" class="form-control" placeholder="Eg : VCBI_TWR"><br>
    
    <label>Booking Date : </label>
    <input type ="date" name ="b_day" class="form-control"><br>
    
    <label>ATC Start Time (UTC) : </label>
    <input type ="number" name="sTime" class="form-control" maxlength="4"><br>
    
    <label>ATC End Time (UTC) : </label>
    <input type ="number" name="eTime" class="form-control" maxlength="4"><br>
    
	<input type="submit" class="btn btn-info value="Submit">
    
</div>
</form>
        
        </div>    
            </div>
            
        <div class="col-md-6">
    	 <div class ="row">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Rules for ATC Booking</h3>
            </div>
	<div class="card-body">
	<p><b>The ATC Booking System allows residents and visitors to book their desired ATC Position on the VATSIM Network.<br><br><u> Rules and Regulations :</u> <br></p></b>
	<ul>
	<li> You should only book positions that you are authorised for. </li>
	<li> Please Book a Position only if you intend to control at the booked time. </li>
	<li> The ATC Positions booked here are automatically feeded to VATBOOK and ATCBooking.com :) </li>
	<li> You can view and delete your ATC Bookings by visiting <b>My Profile -> My ATC Bookings </b>.</li>
	<li> As a common coutesy , do not book same positions repeatedly. Give others a chance to control at the positon too. </li>
	</ul>
	</div>
	    </div>
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
?>
<?php include '../footer.php';?>