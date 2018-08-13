<base href="http://hq.vatsimwa.com/" />
<?php include '../header.php';?>
<?php
 
if ($role=='0'||$role=='1'|$role=='2')
{?>
<?php
error_reporting(0);
ini_set('display_errors', 0);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!-- Main content -->

    <!-- Main content -->
    <section class="content-header">
      <h3><rw1>
        Admin Console
      </h3></rw12>
    </section>

          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                Welcome to Admin Console.
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
else
{
    header("Location: ../unauth/");
}
?>
<?php include '../footer.php';?>