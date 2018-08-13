<base href="http://hq.vatsimwa.com/" />
<?php include '../../header.php';
include '../../admin/connect.php';
?>
<?php
error_reporting(0);
ini_set('display_errors', 0);

if(!empty($_GET))
{
	if(isset($_GET['EU_ID'],$_GET['Local_ID']))
	{
	        $euid =($_GET['EU_ID']);
	        $id =($_GET['Local_ID']);
	        
	        $insert = $db->prepare("DELETE FROM atcbooking WHERE euid='$euid'");
			$insert->bind_param('i',$id);
			if($insert->execute())
			{
				 
?>
<section class="content">
      <div class="error-page">
        <div class="error-content">
          <h3><i class="fa fa-warning text-success"></i>Your ATC Booking has been successfully Deleted!</h3>

            <!-- /.input-group -->
          </form>
        </div>
      </div>
      <!-- /.error-page -->

    </section>
</div>
<?php
		}
    }
}
else
{
header('Location: user/atcbooking/');
}
?>
<?php include '../../footer.php';?>