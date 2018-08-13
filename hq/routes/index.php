<base href="http://hq.vatsimwa.com/" />
<?php
error_reporting(0);
ini_set('display_errors', 0);
require '../admin/connect.php';
include '../header.php';

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!-- Main content -->

    <!-- Main content -->
    <section class="content-header">
      <h3><rw1>
        West Asia Aeronautical Routes
      </h3></rw12>
    </section>
    <?php
    if(!empty($_GET))
{
	if(isset($_GET['s']))
	{
     ?>         <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-ban"></i> Ayyy..Sorry!</h5>
                No Route Available in the Databse for the Requested Airports!
                </div>
<?php    
	}
}

?>
        <div class="row">
    	<div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Enter Departure and Arrival ICAO</h3>
            </div>
	<div class="card-body">
	<form action="routes/view/index.php" method="GET">
	    

    <label>Enter Departure ICAO</label>
    <input type = "text" name="dep_icao" class="form-control" placeholder="Eg: VABB"><hr>
    
    <label>Enter Arrival ICAO</label>
    <input type = "text" name="arr_icao" class="form-control" placeholder="Eg: OPKC"><hr>

	<input type="submit" class="btn btn-info value="Submit"><br><br>

</div>
</form>
            </div><!-- /.card-body -->
            </div>
            
            <div class="col-md-6">
            <div class="card">
            <div class="card-header">
              <h3 class="card-title">Route Contributors</h3>
              </div>
              <div class="card-body">
              <ol>
              <p class="lead">
              <li>Sachin Gnath</li>
              <li>Shrikar Galgali</li>
              </ol>
              </p>
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

<?php include '../footer.php';?>