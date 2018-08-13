<base href="http://hq.vatsimwa.com/" />
<?php include '../header.php';?>

<?php
 
if ($role=='0'||$role=='1'||$role=='2')
  {
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!-- Main content -->

    <!-- Main content -->
    <section class="content-header">
      <h3><rw1>
        Staff Documents
      </h3></rw12>
    </section>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Documents</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>Documnet</th>
                  <th>Version</th>
                  <th>Download</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                  <td>OTS Template - Student 2</td>
                  <td>v1.0
                  </td>
                  <td><a href="https://drive.google.com/open?id=1f7U90yL1vANHkAV-nTrlyhjnU8IvRc7Y"><button type="button" class="btn btn-block btn-primary">Download</button> </td>
                </tr>
                <tr>
                  <td>OTS Template - Student 3</td>
                  <td>v1.0
                  </td>
                  <td><a href="https://drive.google.com/open?id=1ecvS0f3iJRYpxCCKlld3fHabZDCjzMKm"><button type="button" class="btn btn-block btn-primary">Download</button> </td>
                </tr>
                  <tr>
                  <td>OTS Template - Controller 1</td>
                  <td>v1.0
                  </td>
                  <td><a href="https://drive.google.com/open?id=1SLP9IIfjKFJD3aRqZAOtyXdu7ANfxCbH"><button type="button" class="btn btn-block btn-primary">Download</button> </td>
                </tr>
                <tr>
                  <td>Events - Flights Template</td>
                  <td>v1.0
                  </td>
                  <td><a href="https://drive.google.com/open?id=1c7PnsOo0xYyRy9FlFytwV3b-Oduhrgg6"><button type="button" class="btn btn-block btn-primary">Download</button> </td>
                </tr>
                 
                </tbody>
                <tfoot>
                </tfoot>
              </table>
                  
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
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