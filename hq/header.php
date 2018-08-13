<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['username'])){
header("Location: http://hq.vatsimwa.com/");
} else {
$vatsimid = $_SESSION['username'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];
$atc_id = $_SESSION['atc_rating_id'];
$atc_rating = $_SESSION['atc_rating'];
$pilot_rating = $_SESSION['pilot_rating'];
$reg_date = $_SESSION['reg_date'];
$region_code = $_SESSION['region_code'];
$region_name = $_SESSION['region_name'];
$division_code = $_SESSION['division_code'];
$division_name = $_SESSION['division_name'];
$subdivision_code = $_SESSION['subdivision_code'];
$subdivision_name = $_SESSION['subdivision_name']; 
?>

<?php

$xml = simplexml_load_file("https://cert.vatsim.net/cert/vatsimnet/idstatus.php?cid=$vatsimid");
$atctime = $xml->user->atctime;
$pilottime = $xml->user->pilottime;
$joindate = $xml->user->regdate;
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HQ | VATSIM West Asia</title>
  <!-- Tell the browser to be responsive to scrTreen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway:350" rel="stylesheet">
  <link rel="shortcut icon" href="dist/img/favicon.ico" type="image/x-icon"> 

  <style>
      rw1 {
        font-family: 'Raleway', sans-serif

      }
    </style>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120361238-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120361238-1');
</script>


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../division/" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="https://map.vatsim.net/" class="nav-link">Online Map</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/division/credits" class="nav-link">Credits</a>
      </li>
      
    </ul>

    <ul class="navbar-nav ml-auto">
        
         <li>
            
            <a class="nav-link" data-toggle="dropdown" ><b><?php
                print gmdate("TH:i");?></b>
          <i class="fa fa-clock-o"></i>
        </a>
        </li>
        <li>
            
            <a class="nav-link" href="logout/"><b>Logout</b>
          <i class="fa fa-sign-out"></i>
        </a>
        </li>
        
       
    </ul>
    
    <!-- Right navbar links -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../division/" class="brand-link">
      
      <span class="brand-text font-weight-light"><center>West Asia HQ</center> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/wa1.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="user/" class="d-block"><?php echo $firstname; echo'&nbsp'; echo $lastname;?><br><font size="2px"><i class="fa fa-circle text-success"></i>&nbsp;&nbsp;<?php echo $atc_rating;?></font></a>
          
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item has-treeview">
                   
            <a href="#" class="nav-link">
              <i class="fa fa-user nav-icon"></i>
              <p>
                My Profile
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user/" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>My Dashboard</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="user/notes/" class="nav-link">
                  <i class="fa fa-file-text-o nav-icon"></i>
                  <p>My Training Notes</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="user/atcbooking/" class="nav-link">
                  <i class="fa fa-file-text-o nav-icon"></i>
                  <p>My ATC Bookings</p>
                </a>
              </li>
              </ul>
              </li>
              
                <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-superpowers nav-icon"></i>
              <p>
                ATC Controllers
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                
                <li class="nav-item">
                <a href="division/training/apply/resident" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>New ATC Application</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="division/training/apply/visitor" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Become a Visitor Controller</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="division/training/" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Book a  Training Session</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="/atcbooking/" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Book a ATC Slot</p>
                </a>
              </li>
              
              </ul>
              </li>
              
              
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-plane nav-icon"></i>
              <p>
                Event Flight Bookings
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="events/" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>View Events</p>
                </a>
              </li>
              
              </ul>
              </li>
              
              
              <li class="nav-item has-treeview">
            <a href="routes/" class="nav-link">
            <i class="nav-icon fa fa-circle-o text-warning"></i>
              <p>
                VATWA Routes Database
              </p>
            </a>
              </li>

              
               <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <img src="dist/img/wa12.png" alt="AdminLTE Logo" class="brand-image ">
              <p>
                West Asia Division
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="division/" class="nav-link">
                  <i class="fa fa-tachometer nav-icon"></i>
                  <p>Division Dashboard</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="calendar/" class="nav-link">
                  <i class="fa fa-calendar nav-icon"></i>
                  <p>Activity Calendar</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="division/docs" class="nav-link">
                  <i class="fa fa-file-text-o nav-icon"></i>
                  <p>Documents and Tools</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="division/atc/list" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Divisional Controller List</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="division/fss" class="nav-link">
                  <i class="fa fa-file-text nav-icon"></i>
                  <p>Flight Service Station</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="division/discord" class="nav-link">
                  <i class="fa fa-server nav-icon"></i>
                  <p>Division Discord Server</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="division/solo" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>View Solo Validations</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <img src="dist/img/ind1.png" alt="AdminLTE Logo" class="brand-image ">
              <p>
                India vACC
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="india/" class="nav-link">
                  <i class="fa fa-tachometer nav-icon"></i>
                  <p>vACC Dashboard</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="india/docs" class="nav-link">
                  <i class="fa fa-file-text nav-icon"></i>
                  <p>Documents and Tools</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="india/sectorfiles" class="nav-link">
                  <i class="fa fa-superpowers nav-icon"></i>
                  <p>ATC Sector Files</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="india/charts" class="nav-link">
                  <i class="fa fa-map nav-icon"></i>
                  <p>Aeronautical Charts</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="india/scenery" class="nav-link">
                  <i class="fa fa-bookmark nav-icon"></i>
                  <p>Sceneries and AFCAD</p>
                </a>
              </li>
              

            </ul>
          </li>

           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <img src="dist/img/pak.png" alt="AdminLTE Logo" class="brand-image ">
              <p>
                Pakistan vACC
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pakistan/" class="nav-link">
                  <i class="fa fa-tachometer nav-icon"></i>
                  <p>vACC Dashboard</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="pakistan/docs" class="nav-link">
                  <i class="fa fa-file-text nav-icon"></i>
                  <p>Documents and Tools</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="pakistan/sectorfiles" class="nav-link">
                  <i class="fa fa-superpowers nav-icon"></i>
                  <p>ATC Sector Files</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="pakistan/charts" class="nav-link">
                  <i class="fa fa-map nav-icon"></i>
                  <p>Aeronautical Charts</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="pakistan/scenery" class="nav-link">
                  <i class="fa fa-bookmark nav-icon"></i>
                  <p>Sceneries and AFCAD</p>
                </a>
              </li>

            </ul>
          </li>




           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <img src="dist/img/nep.png" alt="AdminLTE Logo" class="brand-image ">
              <p>
                Nepal vACC
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="nepal/" class="nav-link">
                  <i class="fa fa-tachometer nav-icon"></i>
                  <p>vACC Dashboard</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="nepal/docs" class="nav-link">
                  <i class="fa fa-file-text nav-icon"></i>
                  <p>Documents and Tools</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="http://files.aero-nav.com/VNSM" class="nav-link">
                  <i class="fa fa-superpowers nav-icon"></i>
                  <p>ATC Sector Files</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="https://nepal.vatsimwa.com/charts/" class="nav-link">
                  <i class="fa fa-map nav-icon"></i>
                  <p>Aeronautical Charts</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="nepal/scenery" class="nav-link">
                  <i class="fa fa-bookmark nav-icon"></i>
                  <p>Sceneries and AFCAD</p>
                </a>
              </li>

            </ul>
          </li>




          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <img src="dist/img/srm.png" alt="AdminLTE Logo" class="brand-image ">
              <p>
                SRM vACC
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="srm/" class="nav-link">
                  <i class="fa fa-tachometer nav-icon"></i>
                  <p>vACC Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="srm/docs" class="nav-link">
                 <i class="fa fa-file-text nav-icon"></i>
                  <p>Documents and Tools</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="srm/sectorfiles" class="nav-link">
                   <i class="fa fa-superpowers nav-icon"></i>
                  <p>ATC Sector Files</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="srm/charts" class="nav-link">
                  <i class="fa fa-map nav-icon"></i>
                  <p>Aeronautical Charts</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="srm/scenery" class="nav-link">
                  <i class="fa fa-bookmark nav-icon"></i>
                  <p>Sceneries and AFCAD</p>
                </a>
              </li>

            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-info-circle nav-icon"></i>
              <p>
                Member Tools
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="https://www.vatsim.net/pilots/getting-started" class="nav-link">
                  <i class="fa fa-external-link-square nav-icon"></i>
                  <p>Getting Started</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://www.vatsim.net/pilots/training" class="nav-link">
                  <i class="fa fa-plane nav-icon"></i>
                  <p>VATSIM Pilot Ratings</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="https://stats.vatsim.net/" class="nav-link">
                  <i class="fa fa-address-card nav-icon"></i>
                  <p>Member Statistics</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="https://cert.vatsim.net/vatsimnet/newmail.php" class="nav-link">
                  <i class="fa fa-address-book nav-icon"></i>
                  <p>Change Registered Email</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="https://cert.vatsim.net/sso/member/password/" class="nav-link">
                  <i class="fa fa-unlock-alt nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>

            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-info"></i>
              <p>
               VATSIM Policies
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="https://www.vatsim.net/documents/data-protection-handling-policy" class="nav-link">
                 <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Data Protection and Handling</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="https://www.vatsim.net/documents/privacy-policy" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>VATSIM Privacy Policy</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="https://www.vatsim.net/documents/global-ratings-policy" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Global Ratings Policy</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="https://www.vatsim.net/documents/code-of-conduct" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Code of Conduct</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="https://www.vatsim.net/documents/code-of-regulations" class="nav-link">
                 <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Code of Regulations</p>
                </a>
              </li>

            </ul>
          </li>


           <li class="nav-item has-treeview">
            <a href="http://helpdesk.vatsimwa.com" class="nav-link active">
             <i class="fa fa-question-circle nav-icon"></i>
              <p>
                VATWA Helpdesk
              </p>
            </a>
          </li>

          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<?php
}
?>