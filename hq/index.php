<?php
error_reporting(0);
ini_set('display_errors', 0);
?>
<base href="http://hq.vatsimwa.com/" />

<?php
session_start();
if (isset($_SESSION['username'])){
header("Location: http://hq.vatsimwa.com/division/");
} else {
    ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HQ | VATSIM West Asia</title>
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
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.min.css">
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
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
      <center><img src="dist/img/wa.png" height="90px" width="200px"></center>
    <a href="../../index2.html"><b>VATSIM West Asia </b>Headquarters</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">VATWA HQ is a central repository and a Management Tool for West Asia Division.<br><br><b>You must have a valid (non-suspended) VATSIM account to log into the system.</b></p><hr>
            <a href="login.php"><button class="btn btn-primary btn-block btn-flat">Login with VATSIM SSO</button></a>
          </div>
          <!-- /.col -->
          
        </div>
        <center><img src="http://vateg.net/theme/EGvACC/images/vatsim.png" height="70px" width="200px"></center>
        

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
</div>

<?php
}
?>
