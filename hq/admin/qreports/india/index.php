<base href="http://hq.vatsimwa.com/" />
<?php include '../../header.php';?>

<?php
 
if ($role==0||$role==1)
  {
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../connect.php';

                $staff = array();

                if($result = $db->query("SELECT * FROM qr_staff where vacc='India vACC'"))
                {
		            if($result->num_rows)
			    {	
				while($row  = $result->fetch_object())
				    {
					$staff[] = $row;
			    	}
				$result->free();
		       	}
            }
            
            $events = array();

                if($result = $db->query("SELECT * FROM events where vacc='India vACC'"))
                {
		            if($result->num_rows)
			    {	
				while($row  = $result->fetch_object())
				    {
					$events[] = $row;
			    	}
				$result->free();
		       	}
            }
            
            $atc = array();

                if($result = $db->query("SELECT * FROM atc_roster where vacc='India vACC' AND status='Resident'"))
                {
		            if($result->num_rows)
			    {	
				while($row  = $result->fetch_object())
				    {
					$atc[] = $row;
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
        Quarterly Report for India vACC
      </h3></rw12>
    </section>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Staff</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
            
			<table class="table table-bordered table-hover table-striped">
		<thead>
		<thead>
			<tr>
				<th>VATSIM ID</th>
				<th>Name</th>
				<th>Staff Callsign</th>
				<th>Staff Position</th>
				<th>Verify</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		    
		    <?php
			foreach($staff as $cont)
			{
			?>
			
             
             <tr>
				<td><?php echo $cont->vatsimid; ?></td>
				<td><?php echo $cont->fname; ?>&nbsp;<?php echo $cont->lname; ?></td>
				<td><?php echo $cont->callsign; ?></td>
				<td><?php echo $cont->position; ?></td>
				<td>
				    <?php
				    if($cont->verify=='0')
				    {?>
				    <a href = "admin/qreports/insert/staff_verify.php?vatsimid=<?php echo $cont->vatsimid; ?>" class="btn btn-primary btn-block">Verify</a>
				    <?php
				    }
				    elseif($cont->verify=='1')
				    {?>
				    <a href = "admin/qreports/insert/staff_unverify.php?vatsimid=<?php echo $cont->vatsimid; ?>" class="btn btn-danger btn-block">Un-Verify</a> 
				    <?php   
				    }
				    ?>
				</td>
				<td><a href = "admin/qreports/insert/staff_delete.php?vatsimid=<?php echo $cont->vatsimid; ?>" class="btn btn-primary btn-block">Delete</a></td>
			</tr>

			<?php
			}
			?>   
        </tbody>
        </table>
            <hr>
            <form name = "staff" action="admin/qreports/insert/staff.php" method="POST">
            <div class="row">
            <div class="col-md-4">
            <label>Staff VATSIM ID :</label> <input class = "form-control" name="vatsimid" type="number" />
            </div>
            <div class="col-md-4">
            <label>Staff Callsign : </label> <input class = "form-control" name="callsign" type="text" />
            </div>
            <div class="col-md-4">
            <label>Staff Position : </label> <input class = "form-control" name="position" type="text" />
            <input type = "hidden" name = "vacc" value = "India vACC">
            </div>
            </div>
            <br>
            <center>
            <input class="btn btn-info" name="save" type="submit" />
            </center>
            </form>

<?php
}
?>      
        </div>
    </div>



            <div class="card">
            <div class="card-header">
              <h3 class="card-title">vACC Events</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
            
			<table class="table table-bordered table-hover table-striped">
		<thead>
		<thead>
			<tr>
				<th>Event Date</th>
				<th>Event Name</th>
				<th>Verify</th>
			</tr>
		</thead>
		<tbody>
		    
		    <?php
			foreach($events as $cont)
			{
			?>
			
             
             <tr>
				<td><?php echo $cont->event_date; ?></td>
				<td><?php echo $cont->event_name; ?></td>
				<td>
				    <?php
				    if($cont->verify=='0')
				    {?>
				    <a href = "admin/qreports/insert/event_verify.php?event_name=<?php echo $cont->event_name; ?>" class="btn btn-primary btn-block">Verify</a>
				    <?php
				    }
				    elseif($cont->verify=='1')
				    {?>
				    <a href = "admin/qreports/insert/event_unverify.php?event_name=<?php echo $cont->event_name; ?>" class="btn btn-danger btn-block">Un-Verify</a> 
				    <?php   
				    }
				    ?>
				</td>
			</tr>

			<?php
			}
			?>   
        </tbody>
        </table>
            <hr>
            <form name = "staff" action="admin/qreports/insert/events.php" method="POST">
            <div class="row">
            <div class="col-md-4">
            <label>Event Date :</label> <input class = "form-control" name="event_date" type="date" />
            </div>
            <div class="col-md-4">
            <label>Event Name : </label> <input class = "form-control" name="event_name" type="text" />
            </div>
            <input class = "form-control" name="vacc" value="India vACC" type="hidden" />
            </div>
            <br>
            <center>
            <input class="btn btn-info" name="save" type="submit" />
            </center>
            </form>

      
        </div>
    </div>
    
    
    
     <div class="card">
            <div class="card-header">
              <h3 class="card-title">ATC Training Students</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
            
			<table id="example1" class="table table-bordered table-hover table-striped">
		<thead>
		<thead>
			<tr>
				<th>Student ID</th>
				<th>Student Name</th>
				<th>Student Rating</th>
				<th>Verify</th>
			</tr>
		</thead>
		<tbody>
		    
		    <?php
			foreach($atc as $cont)
			{
			?>
			
             
             <tr>
				<td><?php echo $cont->vatsimcid; ?></td>
				<td><?php echo $cont->fname; ?>&nbsp;<?php echo $cont->lname; ?></td>
				<td><?php echo $cont->rating; ?></td>
				<td>
				    <?php
				    if($cont->verify=='0')
				    {?>
				    <a href = "admin/qreports/insert/atc_verify.php?vatsimcid=<?php echo $cont->vatsimcid; ?>" class="btn btn-primary btn-block">Verify</a>
				    <?php
				    }
				    elseif($cont->verify=='1')
				    {?>
				    <a href = "admin/qreports/insert/atc_unverify.php?vatsimcid=<?php echo $cont->vatsimcid; ?>" class="btn btn-danger btn-block">Un-Verify</a> 
				    <?php   
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
</div>

 <div class="card">
            <div class="card-header">
              <h3 class="card-title">Submit Final Report</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
     <form name = "staff" action="admin/qreports/insert/q_status.php" method="POST">
            <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            
            <label>Quarter and Year :</label> <input class = "form-control" name="qyear" type="text" placeholder="Eg : Q32018" />
            </div>
            <input class = "form-control" name="vacc" type="hidden" value="India vACC" />
            <input class = "form-control" name="submitted_by" type="hidden" value="<?php echo $vatsimid; ?>" />
            </div>
            <br>
            <center>
            <input class="btn btn-info" value="Submit vACC Quaterly Report" name="save" type="submit" />
            </center>
            </form>
        </div>
    </div>
</div>
<?php include '../../../footer.php';?>