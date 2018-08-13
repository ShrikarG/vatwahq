<base href="http://hq.vatsimwa.com/" />
<?php include '../../../header.php';?>
<?php
$email = ($_GET['email']);
$id = ($_GET['id']);
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
        Add Reason for Rejection
      </h3></rw12>
    </section>
    	<div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Reason For Rejection</h3>
            </div>
	<div class="card-body">
	<form action="admin/training/applications/visitor/reject_email.php" method="get">
    <label>Reason : </label>
   <textarea class="form-control" name="reason" ></textarea><br>
    <hr>
	<label>Email (DO NOT EDIT) : </label><input type="email" name="email" value="<?php echo $email;?>" class="form-control"><hr>
	<label>Request ID (DO NOT EDIT) : </label><input type="text" name="id" value="<?php echo $id;?>" class="form-control"><hr>
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
    header("Location: ../../../unauth/");
}
?>
<?php include '../../../footer.php';?>