<base href="http://hq.vatsimwa.com/" />
<?php
include '../header.php';
if(!empty($_GET))
{
	if(isset($_GET['icao']))
	{
	    $icao = ($_GET['icao']);
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
        NOTAMS for <?php echo $icao;?>
      </h3></rw12>
    </section>
    	<div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Notice to Airmen</h3>
            </div>
	<div class="card-body">
	                    <?php
                        $url = file_get_contents('http://api.vateud.net/notams/'.$icao.'.json');
                        $notams = json_decode($url);
                        foreach ($notams as $notam) {
                            echo '<pre>';
                            echo $notam->raw;
                            echo $notam->message;
                            echo '</pre><hr>';
                        }
                        ?>
                        </div>
                        
            </div>
        </div>
    </div>
    

<?php
include '../footer.php';?>