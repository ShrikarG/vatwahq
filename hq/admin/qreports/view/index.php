<base href="http://hq.vatsimwa.com/" />
<?php include '../../header.php';?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../connect.php';
$vacc= $_GET['vacc'];
$qyear= $_GET['qyear'];
                $staff = array();

                if($result = $db->query("SELECT * FROM qr_staff where vacc='$vacc'"))
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

                if($result = $db->query("SELECT * FROM events where vacc='$vacc' AND verify='1'"))
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

                if($result = $db->query("SELECT * FROM atc_roster where vacc='$vacc' AND status='Resident' AND verify='1'"))
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


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!-- Main content -->

    <!-- Main content -->
    <section class="content-header">
      <h3><rw1>
        Quarterly Report for <?php echo $vacc;?>
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
			</tr>

			<?php
			}
			?>   
        </tbody>
        </table>
          
        </div>
</div>
    </div>
</div>
<?php include '../../../footer.php';?>