<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['username'])){
header("Location: http://hq.vatsimwa.com/");
} else {

$vatsimid = $_SESSION['username'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$atc_rating = $_SESSION['atc_rating'];
$role = $_SESSION['role'];
$email = $_SESSION['email'];
?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HQ | Admin Console</title>
  <!-- Tell the browser to be responsive to screen width -->
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
        <a href="http://hq.vatsimwa.com/" class="nav-link">Home</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li>
        <iframe src="http://free.timeanddate.com/clock/i693zoe5/fn6/fs18/th1/ta1" frameborder="0" width="111" height="24"></iframe>

      </li>
    </ul>
    
    <!-- Right navbar links -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="http://hq.vatsimwa.com/admin" class="brand-link">
      
      <span class="brand-text font-weight-light"><center>HQ Admin Console</center> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/wa1.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $firstname; echo'&nbsp'; echo $lastname;?><br><font size="2px"><i class="fa fa-circle text-success"></i>&nbsp;&nbsp;<?php echo $atc_rating;?></font></a>
          
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
    
            
            <?php if($role==0){?>
            
               <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-info"></i>
              <p>
                ATC
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin/atc/add" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Add a Controller</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="admin/atc/delete" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Delete a Controller</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="admin/atc/update" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Update a Controller</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="admin/atc/view" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>View Master List</p>
                </a>
              </li>

            </ul>
          </li>
          
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-info"></i>
              <p>
                ATC Applications
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin/training/applications/resident/" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Resident Applications</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="admin/training/applications/visitor/" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Visiting Applications</p>
                </a>
              </li>
            </ul>
          </li>
          
          <?php }?>
          
          <?php if($role==0 || $role==1 ){?>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-info"></i>
              <p>
                Solo Validations
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin/solo" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Add a Solo Validation</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="admin/solo/view" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>View Solo Master List </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="admin/solo/delete" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Delete a Solo Validation</p>
                </a>
              </li>

            </ul>
          </li>
      
          
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-info"></i>
              <p>
                Training Notes
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin/training/notes/add" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Add a Training Note</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin/training/" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>View Training Records</p>
                </a>
              </li>
            </ul>
          </li>
          
          
          
                    <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-info"></i>
              <p>
                Training Slots
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin/training/slots/add" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Add Your Availability</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="admin/training/slots/" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>View Training Slots</p>
                </a>
              </li>

            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-info"></i>
              <p>
                vACC Quarterly Report
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="admin/qreports/dashboard" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>QR Dashboard</p></p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="admin/qreports/india" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>India vACC</p></p>
                </a>
              </li>
              
              <li class="nav-item">
                 <a href="admin/qreports/pakistan" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Pakistan vACC</p>
                </a>
              </li>
              
              <li class="nav-item">
                 <a href="admin/qreports/srm" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>SRM vACC</p>
                </a>
              </li>
              
              <li class="nav-item">
                 <a href="admin/qreports/nepal" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Nepal vACC</p>
                </a>
              </li>

            </ul>
          </li>
          
          <?php }?>
          
          <?php if($role==0 || $role==1 || $role==2){?>
          
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-info"></i>
              <p>
                Events
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin/events/add" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Add an Event</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="admin/events/mass_delete" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Delete all flights from an Event</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="admin/events/delete" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Delete an Event</p>
                </a>
                
              
              </li>

            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-info"></i>
              <p>
                Flight Bookings
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="admin/flights/add" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Add a Flight</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="admin/flights/delete" class="nav-link">
                  <i class="nav-icon fa fa-circle-o text-danger"></i>
                  <p>Delete a Flight </p>
                </a>
              </li>

            </ul>
          </li>
          
       <?php }?>
          
          <li class="nav-item has-treeview">
             <a href="admin/docs" class="nav-link">
             <i class="fa fa-question-circle nav-icon"></i>
              <p>
                Admin Documents
              </p>
            </a>
          </li>
         
   
         
          <li class="nav-item has-treeview">
            <a href="../" class="nav-link active">
             <i class="fa fa-question-circle nav-icon"></i>
              <p>
                Back to User Console
              </p>
            </a>
          </li>
          
        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<?php
}
?>