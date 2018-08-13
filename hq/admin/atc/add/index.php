<base href="http://hq.vatsimwa.com/" />
<?php include '../../header.php';?>

<?php
 
if ($role=='0')
  {
?>
<?php
error_reporting(0);
require '../../connect.php';

if(!empty($_POST))
{
	if(isset($_POST['vatsimcid'],$_POST['vacc'],$_POST['auth'],$_POST['status']))
	{
		$vatsimcid = ($_POST['vatsimcid']);
		$xml = simplexml_load_file("https://cert.vatsim.net/cert/vatsimnet/idstatus.php?cid=$vatsimcid");
		$fname = $xml->user->name_first;
		$lname = $xml->user->name_last;
		$rating = $xml->user->rating;
		$vacc = ($_POST['vacc']);
		$status = ($_POST['status']);
		$auth = ($_POST['auth']);

		

		if(!empty($vatsimcid) && !empty($fname) && !empty($lname) && !empty($rating) && !empty($vacc) && !empty($status) && !empty($auth))
		{
			$insert = $db->prepare("INSERT INTO atc_roster(vatsimcid,fname,lname,rating,vacc,status,auth) VALUES (?,?,?,?,?,?,?)"); 
			$insert->bind_param('issssss',$vatsimcid,$fname,$lname,$rating,$vacc,$status,$auth);
			if($insert->execute())
			{
			$query3 = "INSERT into news(type,vatsimid,fname,lname,rating,vacc,auth,status) values('new_ctrl','$vatsimcid','$fname','$lname','$rating','$vacc','$auth','$status')";
            $rup = $db->query($query3);
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
        Add a Controller
      </h3></rw12>
    </section>
    	<div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">vACC Controller</h3>
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
		<option name="wa" id="wa">West Asia Division</option>
	</select>

	<lable for="status">Status</lable>
	<select name = "status" class="form-control">
		<option name="res" id="res">Resident</option>
		<option name="visit" id="visit">Visitor</option>
	</select>


	<lable for="auth">Authorisation</lable>
	<select name = "auth" class="form-control">
	    <option name="noauth" id="noauth">NoAuth</option>
		<option name="del" id="del">DEL</option>
		<option name="gnd" id="gnd">GND</option>
		<option name="twr" id="twr">TWR</option>
		<option name="app" id="app">APP</option>
		<option name="ctr" id="ctr">CTR</option>
		<option name="ctr" id="ctr">FSS</option>
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