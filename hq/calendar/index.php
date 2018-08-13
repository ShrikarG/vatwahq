<base href="http://hq.vatsimwa.com/" />
<?php 
include '../header.php';
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>VATWA Activity Calendar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Calendar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <section class="content">
    
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="cal"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /. box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php include '../footer.php';?>

<script>
$( document ).ready(function() {
    
     $('#cal').fullCalendar({
          
    header: {
            left: '',
            center: 'prev title next',
            right: ''
        },
  
    eventSources: [

    // your event source
    {
      url: 'http://hq.vatsimwa.com/calendar/feeds/atcbooking.php',
      color: 'blue',   
      textColor: 'white'
    },
    
     {
      url: 'http://hq.vatsimwa.com/calendar/feeds/event.php',
      color: 'green',   
      textColor: 'white'
    }

    // any other sources...

  ]
  })

});

</script>
