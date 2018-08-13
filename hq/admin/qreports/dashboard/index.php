<base href="http://hq.vatsimwa.com/" />
<?php include '../../header.php';
include '../fpdf/fpdf.php';    ?>

<?php
 
if ($role==0||$role==1)
  {
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../connect.php';

                $status = array();

                if($result = $db->query("SELECT * FROM qr_status"))
                {
		            if($result->num_rows)
			    {	
				while($row  = $result->fetch_object())
				    {
					$status[] = $row;
			    	}
				$result->free();
		       	}
            }

?>




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!-- Main content -->

    <!-- Main content -->
    <section class="content-header">
      <h3><rw1>
        Quarterly Report vACCs in West Asia Division
      </h3></rw12>
    </section>
    
         <div class="card">
            <div class="card-header">
              <h3 class="card-title">vACC</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-3">
                    <a href="admin/qreports/pakistan" class="btn btn-success btn-block" target="_blank">Pakistan vACC</a>
                    </div>
                    <div class="col-md-3">
                    <a href="admin/qreports/india" class="btn btn-primary btn-block" target="_blank">India vACC</a>
                    </div>
                    
                    <div class="col-md-3">
                    <a href="admin/qreports/srm" class="btn btn-info btn-block" target="_blank">SRM vACC</a>
                    </div>
                    
                     <div class="col-md-3">
                    <a href="admin/qreports/nepal" class="btn btn-danger btn-block" target="_blank">Nepal vACC</a>
                    </div>
            </div>
                </div>
                    </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">vACC Status</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
                <table class="table table-bordered table-hover table-striped">
		<thead>
		<thead>
			<tr>
				<th>vACC</th>
				<th>Quarter</th>
				<th>Submitted By</th>
				<th>Status</th>
				<th>View vACC Report</th>
				<th>Delete Report</th>
			</tr>
		</thead>
		<tbody>
		    
		    <?php
			foreach($status as $cont)
			{
			?>
			
             
             <tr>
				<td><?php echo $cont->vacc; ?></td>
				<td><?php echo $cont->qyear; ?></td>
				<td><?php echo $cont->submitted_by; ?></td>
				<td><?php 
				
				if($cont->q_status==1)
				{
				    echo"<font color='green'><b>Submitted</b></font>";
				}
				
				?></td>
				<td><a href="admin/qreports/view/index.php?vacc=<?php echo $cont->vacc; ?>&qyear=<?php echo $cont->qyear; ?>" class="btn btn-primary btn-block">View vACC Report</a></td>
				
				<td>
				    <a href="admin/qreports/insert/delete_report.php?vacc=<?php echo $cont->vacc; ?>&qyear=<?php echo $cont->qyear; ?>&submitted_by=<?php echo $cont->submitted_by; ?>" class="btn btn-danger btn-block">Delete This Report</a></td>
				</td>
			<?php
			}
			?>
			</tbody>
			</table>
			<br><br><br>
			<center>
			    <a href="admin/qreports/dashboard/generate_report.php" class="btn btn-primary">Generate Division Quarterly Report!</a>
			</center>
<?php
}
?>
</div>
    </div>
        </div>
    
<?php include '../../footer.php';?>