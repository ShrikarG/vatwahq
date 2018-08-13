<?php
error_reporting(0);
ini_set('display_errors', 0);
?>
<base href="http://hq.vatsimwa.com/" />

<?php include '../header.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!-- Main content -->

    <!-- Main content -->
    <section class="content-header">
      <h3><rw1>
       West Asia HQ API
      </h3></rw12>
    </section>

        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">API Examples</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="accordion">
                  <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                          vACC Authrosied ATC Controllers List
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                      <div class="card-body">
                        <pre>http://hq.vatsimwa.com/api/atc/{country}/{status}/index.php</pre>
                        Returns List of Authorised vACC Controllers
                      </div>
                    </div>
                  </div>
                  <div class="card card-info">
                    <div class="card-header">
                      <h4 class="card-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                           vACC Solo Approvals List
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="card-body">
                        <pre>http://hq.vatsimwa.com/api/solo/{country}/index.php</pre>
                        Returns List Solo Approvals
                      </div>
                    </div>
                  </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

    </section>
    <!-- /.content -->
  </div>

<?php include '../footer.php';?>