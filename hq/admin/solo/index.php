<base href="http://hq.vatsimwa.com/" />
<?php include '../header.php';?>

<?php
 
if ($role==0||$role==1)
  {
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../connect.php';

if(!empty($_POST))
{
	if(isset($_POST['vatsimcid'],$_POST['vacc'],$_POST['position']))
	{
		$vatsimcid = ($_POST['vatsimcid']);
		$xml = simplexml_load_file("https://cert.vatsim.net/cert/vatsimnet/idstatus.php?cid=$vatsimcid");
		$fname = $xml->user->name_first;
		$lname = $xml->user->name_last;
		$rating = $xml->user->rating;
		$vacc = ($_POST['vacc']);
		$position = ($_POST['position']);
		$valid_from = date('Y/m/d');
		$valid_till = date('Y-m-d', strtotime("+30 days"));

		

		if(!empty($vatsimcid) && !empty($fname) && !empty($lname) && !empty($rating) && !empty($vacc)  && !empty($position) && !empty($valid_from) && !empty($valid_till))
		{
			$insert = $db->prepare("INSERT INTO solo(vatsimcid,fname,lname,rating,vacc,position,valid_from,valid_till) VALUES (?,?,?,?,?,?,?,?)"); 
			$insert->bind_param('isssssss',$vatsimcid,$fname,$lname,$rating,$vacc,$position,$valid_from,$valid_till);
			if($insert->execute())
			{
			    $query3 = "INSERT into news(type,vatsimid,fname,lname,rating) values('solo','$vatsimcid','$fname','$lname','$position')";
                $rup = $db->query($query3);
				header('Location: view/');
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
        Add a Solo Status
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
	</select>

	<lable for="position">ATC Position</lable>
	<select name = "position" class="form-control">
		<option name="del" id="del">DEL</option>
		<option name="gnd" id="gnd">GND</option>
		<option name="twr" id="twr">TWR</option>
		<option name="app" id="app">APP</option>
		<option name="ctr" id="ctr">CTR</option>
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
    header("Location: ../unauth/");
}
?>
<?php include '../footer.php';?>