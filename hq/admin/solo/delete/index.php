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

if(!empty($_POST))
{
	if(isset($_POST['vatsimcid'],$_POST['vacc']))
	{
		$vatsimcid = ($_POST['vatsimcid']);
		$xml = simplexml_load_file("https://cert.vatsim.net/cert/vatsimnet/idstatus.php?cid=$vatsimcid");
		$vacc = ($_POST['vacc']);

		

		if(!empty($vatsimcid) && !empty($vacc))
		{
			$insert = $db->prepare("DELETE FROM solo WHERE vatsimcid=? AND vacc=?"); 
			$insert->bind_param('is',$vatsimcid,$vacc);
			if($insert->execute())
			{
				 header('Location:../view/');
				die();
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
        Delete a Solo Validations
      </h3></rw12>
    </section>
    	<div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Delete a Solo Validation</h3>
            </div>
	<div class="card-body">
	<form action="" method="post">


<div class="form-group">
	<lable for="vatsimcid">VATSIM CID</lable>
	<input type = "text" class="form-control" name="vatsimcid" id="vatsimcid">
	

	<lable for="vacc">vACC</lable>
	<select name = "vacc" class="form-control">
		<option name="india" id="india">India vACC</option>
		<option name="pakistan" id="pakistan">Pakistan vACC</option>
		<option name="nepal" id="nepal">Nepal vACC</option>
		<option name="srm" id="srm">SRM vACC</option>
	</select>
</div>
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
    header("Location: ../../unauth/");
}
?>
<?php include '../../footer.php';?>