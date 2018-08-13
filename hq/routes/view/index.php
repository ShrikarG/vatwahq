<base href="http://hq.vatsimwa.com/" />
<?php
error_reporting(0);
ini_set('display_errors', 0);
require '../../admin/connect.php';
include '../../header.php';

if(!empty($_GET))
{
	if(isset($_GET['dep_icao']))
	{
	    $dep_icao = ($_GET['dep_icao']);
	    $arr_icao = ($_GET['arr_icao']);
	}
}
$records = array();
if($result = $db->query("SELECT route FROM routes where dep_icao = '$dep_icao' and arr_icao ='$arr_icao'"))
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
		

if($records==NULL)
{
    header('Location:../index.php?s=1');
}
else
{
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!-- Main content -->

    <!-- Main content -->
    <section class="content-header">
      <h3><rw1>
        West Asia Routes
      </h3></rw12>
    </section>

          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#route" data-toggle="tab">Route</a></li>
                  <li class="nav-item"><a class="nav-link" href="#weather" data-toggle="tab">Weather</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="route">
                    <!-- Post -->
                    <p class="lead">
                    Departure Airport : <b><?php echo $dep_icao;?></b>&emsp;
                    Arrival Airport :  <b><?php echo $arr_icao;?></b><br><br>
                    Route : &nbsp;
                    <code>
                    <?php
                    foreach($records as $cont)
		        	{
                    echo $cont->route;
                   ?>
                    </code>
                    <br><br>
                    <div class="row">
                    <div class="col-md-4">
                    <a href="../notams/index.php?icao=<?php echo $dep_icao;?>" class="btn btn-danger btn-block" target="_blank">Departure Airport NOTAMS</a>
                    </div>
                    <div class="col-md-4">
                    <a href="../notams/index.php?icao=<?php echo $arr_icao;?>" class="btn btn-success btn-block" target="_blank">Arrival Airport NOTAMS</a>
                    </div>
                    
                    <div class="col-md-4">
                    <a href="https://cert.vatsim.net/fp/file.php?1=I&5=<?php echo $dep_icao;?>&8=<?php echo $cont->route;;?>&9=<?php echo $arr_icao;?>" target="_blank" class="btn btn-info btn-block">VATSIM Pre-File Flight Plan</a>
                    </div>
                    </div>
                    </div>
                  <?php
		        	}
                    ?>
                    
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="weather">
                    <p class="lead">
                    Departure Airport METAR :
                   </p>
                   <?php
                   $url = 'http://metar.vatsim.net/'.$dep_icao.'';
                   $page = file_get_contents($url);
                   echo $page;
                   ?>
                   <br><br>
                   <p class="lead">
                    Arrival Airport METAR :
                   </p>
                   <?php
                   $url = 'http://metar.vatsim.net/'.$arr_icao.'';
                   $page = file_get_contents($url);
                   echo $page;
                   ?>

                    </div>
                  </div>
                <!-- /.tab-content -->
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

<?php
}
?>
<?php include '../../footer.php';?>