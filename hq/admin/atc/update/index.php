<base href="http://hq.vatsimwa.com/" />
<?php include '../../header.php';?>
<?php
 
if ($role=='0')
  {
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../connect.php';

if(!empty($_POST))
{
	if(isset($_POST['vatsimcid'],$_POST['vacc'],$_POST['auth'],$_POST['status']))
	{
		$vatsimcid = ($_POST['vatsimcid']);
		$xml = simplexml_load_file("https://cert.vatsim.net/cert/vatsimnet/idstatus.php?cid=$vatsimcid");
		$vacc = ($_POST['vacc']);
		$status = ($_POST['status']);
		$auth = ($_POST['auth']);
		$fname = $xml->user->name_first;
	    $lname = $xml->user->name_last;

		if(!empty($vatsimcid) && !empty($vacc) && !empty($auth) && !empty($status))
		{
			$insert = $db->prepare("UPDATE atc_roster SET auth=?,status=? WHERE vatsimcid=? AND vacc=?");
			$insert->bind_param('ssis',$auth,$status,$vatsimcid,$vacc);
			if($insert->execute())
			{
			    if($auth=='NoAuth')
			    {
			       header('Location:../view/');
				   die(); 
			    }
			    else
			    {
			        
			     $query3 = "INSERT into news(type,vatsimid,fname,lname,vacc,auth) values('upd_auth','$vatsimcid','$fname','$lname','$vacc','$auth')";
                 $rup = $db->query($query3);
                 
			    }
			   
				 
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
        Update a Controller
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
		<option name="del" id="del">DEL</option>
		<option name="gnd" id="gnd">GND</option>
		<option name="twr" id="twr">TWR</option>
		<option name="app" id="app">APP</option>
		<option name="ctr" id="ctr">CTR</option>
		<option name="app" id="app">FSS</option>
		<option name="noauth" id="noauth">NoAuth</option>
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
