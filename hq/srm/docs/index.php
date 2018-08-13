<?php
error_reporting(0);
ini_set('display_errors', 0);
?>
<base href="http://hq.vatsimwa.com/" />

<?php include '../../header.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!-- Main content -->

    <!-- Main content -->
    <section class="content-header">
      <h3><rw1>
        Documents and Tools
      </h3></rw12>
    </section>

          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#policy" data-toggle="tab">Policy</a></li>
                  <li class="nav-item"><a class="nav-link" href="#atc" data-toggle="tab">ATC</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="policy">
                    <!-- Post -->
                     <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>Document Name</th>
                  <th>Author</th>
                  <th>Download</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                  <td>vACC Policy</td>
                  <td>Imal Mille</td>
                  <td><a href="http://4r-ipm.bid/vaccsrm/policy.html"><button type="button" class="btn btn-block btn-primary">Download</button> </td>
                </tr>
                  
                </tbody>
                <tfoot>
                </tfoot>
              </table>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="atc">
                   <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>Document Name</th>
                  <th>Author</th>
                  <th>Download</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>ATC Training</td>
                  <td>Imal Mille</td>
                  <td><a href="http://4r-ipm.bid/vaccsrm/train.html"><button type="button" class="btn btn-block btn-primary">Download</button> </td></a>
                </tr>
                
                </tbody>
                <tfoot>
                </tfoot>
              </table>
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

<?php include '../../footer.php';?>