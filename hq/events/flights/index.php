<?php
error_reporting(0);
ini_set('display_errors', 0);
?>
<base href="http://hq.vatsimwa.com/" />
<?php include '../../header.php';?>
<?php
require '../../admin/connect.php';


$sql = "INSERT INTO booking_log(vatsimid,fname,lname,log_time) VALUES ('$vatsimid','$firstname','$lastname',NOW())";
if ($result = $db->query($sql)) {

if(!empty($_GET))
{
	if(isset($_GET['id']))
	{
	    $id = ($_GET['id']);
		$event_name = ($_GET['event_name']);
		$event_date = ($_GET['date']);
		$result = array();
	if($result = $db->query("SELECT * FROM flights where event_id='$id'"))
{
		if($result->num_rows)
			{
				while($row  = $result->fetch_object())
				{
					$check[] = $row;
				}
				$result->free();
			}
        }
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
        Book a Flight for <?php echo $event_name;?> Event
      </h3></rw12>
    </section>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Flights</h3>
            </div>
	<div class="card-body">
<table id="example1" class="table table-hover">
		<thead>
			<tr>
			    <th>Airline</th>
			    <th>Flight No.</th>
				<th>Origin</th>
				<th>Destination</th>
				<th>Dep. Time</th>
				<th>Arr. Time</th>
				<th>Book</th>
			</tr>
		</thead>
		<tbody>

			<?php
			foreach($check as $cont)
			{
			?>
			<tr>
				<td>
				    <?php
				    $airline=substr("$cont->flight_no",0,3);
				    ?>
				    <img src="events/logos/<?php echo $airline;?>.gif" width='180px'></img>
				</td>
				<td><?php echo $cont->flight_no; ?></td>
				<td><?php echo $cont->dep_icao; ?></td>
				<td><?php echo $cont->arr_icao; ?></td>
				<td><?php echo $cont->dep_time; ?> Z</td>
				<td><?php echo $cont->arr_time; ?> Z</td>
				
				<td>
				    <?php
				    if($cont->status==NULL)
				    {
				   ?>
				   <form method="POST" action="events/book/index2.php">
				       <input type='hidden' name="id" value="<?php echo $cont->id; ?>">
				        <input type='hidden' name="flight_no" value="<?php echo $cont->flight_no; ?>">
				         <input type='hidden' name="dep_icao" value="<?php echo $cont->dep_icao; ?>">
				          <input type='hidden' name="arr_icao" value="<?php echo $cont->arr_icao; ?>">
				           <input type='hidden' name="dep_time" value="<?php echo $cont->dep_time; ?>">
				            <input type='hidden' name="arr_time" value="<?php echo $cont->arr_time; ?>">
				             <input type='hidden' name="event" value="<?php echo $event_name;?>">
				              <input type='hidden' name="route" value="<?php echo $cont->route; ?>">
				               <input type='hidden' name="date" value="<?php echo $event_date;?>">
				                <button name="name" class="btn btn-primary btn-block" type="submit ">Book This Flight</button>
				                
				       
				   </form>
				   
				    <?php
				    }
				    elseif($cont->status=="Booked" && $cont->vatsimid==$vatsimid)
				    {?>
				    <a href="events/delete/index.php?id=<?php echo $cont->id; ?>&vatsimid=<?php echo $cont->vatsimid; ?>" class="btn btn-danger btn-block">Delete My Booking!</a>
				    <?php
				    }
				    
				    else
				    {
				        echo 'Booked by&nbsp'; echo $cont->vatsimid;
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
</div></div></div>
<?php
}
else
{
    echo "Error with HQ. Please Contact Division Director";
}
?>
<?php include '../../footer.php';?>