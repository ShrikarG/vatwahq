<base href="http://hq.vatsimwa.com/" />
<?php
error_reporting(0);
ini_set('display_errors', 0);
include '../../admin/connect.php';
include '../../header.php';

$records = array();
if($result = $db->query("SELECT * from atcbooking order by id DESC LIMIT 1"))
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

foreach($records as $cont)
			{
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!-- Main content -->

    <!-- Main content -->
    <section class="content-header">
      <h3><rw1>
        Confirm your ATC Slot
      </h3></rw12>
    </section>
    	<div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Your ATC Slot Details</h3>
            </div>
	<div class="card-body">
	<form name="myForm" action="atcbooking/confirm/index.php" method="post">
	  <div class = "row">
	      
	  <div class = "col-md-4">
	 <label>Booking By :</label>
	 <input type="text" name="position" class="form-control" placeholder="<?php echo $cont->fname;?>&nbsp;<?php echo $cont->lname;?>" disabled><br>
     </div>    
	      
	 <div class = "col-md-4">
	 <label>ATC Position :</label>
	 <input type="text" name="position" class="form-control" placeholder="<?php echo $cont->position;?>" disabled><br>
     </div>
    
    <div class = "col-md-4">
    <label>Booking Date : </label>
    <input type ="text" name ="b_day" class="form-control" placeholder="<?php echo $cont->b_full_date;?>" disabled><br>
    </div>
    
    <div class = "col-md-6">
    <label>ATC Start Time : </label>
    <input type ="number" name="sTime" class="form-control" placeholder="<?php echo $cont->stime;?> Z" disabled><br>
    </div>

    <div class = "col-md-6">
    <label>ATC End Time : </label>
    <input type ="number" name="eTime" class="form-control" placeholder="<?php echo $cont->etime;?> Z" disabled><br>
    </div>
   </div>
   
    
    <center><a class="btn btn-info value="Confirm" href="http://vatbook.euroutepro.com/atc/insert.asp?Local_URL=http://hq.vatsimwa.com/atcbooking/success/index.php&Local_ID=<?php echo $cont->id;?>&b_day=<?php echo $cont->b_day;?>&b_month=<?php echo $cont->b_month;?>&b_year=<?php echo $cont->b_year;?>&Controller=<?php echo $cont->fname;?>%20<?php echo $cont->lname;?>&Position=<?php echo $cont->position;?>&sTime=<?php echo $cont->stime;?>&eTime=<?php echo $cont->etime;?>&T=1&E=0&voice=1">Confirm my Booking</a>
	
	<a class="btn btn-danger value="goBack" href="http://hq.vatsimwa.com/atcbooking/">Go Back! </a></center>

</div>
</form>
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
</div>
<?php
}
?>


<?php include '../../footer.php';?>



