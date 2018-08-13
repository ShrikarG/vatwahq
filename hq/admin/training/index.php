<base href="http://hq.vatsimwa.com/" />
<?php include '../header.php';?>
<?php
 
if ($role==0||$role==1)
  {
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!-- Main content -->

    <!-- Main content -->
    <section class="content-header">
      <h3><rw1>
        View Training Records
      </h3></rw12>
    </section>
    	<div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">View a Training Record</h3>
            </div>
	<div class="card-body">
	<form action="admin/training/notes/view/index.php" method="get">
	    
    <lable for="event_name">Student VATSIM CID</lable>
    <input type = "text" class="form-control" name="stu_id" placeholder="Eg : 1217255 - Enter Numeric Value only "><hr>
	
	<button type="submit" class="btn btn-info">Submit</button>

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
else
{
    header("Location: ../unauth/");
}
?>
<?php include '../footer.php';?>