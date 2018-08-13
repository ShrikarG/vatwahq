<?php
error_reporting(0);
ini_set('display_errors', 0);
?>
<base href="http://hq.vatsimwa.com/" />

<?php include '../../header.php';?>
<?php
require '../../admin/connect.php';

$records = array();

if($result = $db->query("SELECT * FROM news ORDER BY id DESC LIMIT 5"));
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

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!-- Main content -->

    <!-- Main content -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">News</h3>
            </div>
				   <div class="card-body">
            <table id="example1" class="table table-bordered table-hover table-striped">
		<thead>
		<thead>
			<tr>
				<th>News</th>
			</tr>
		</thead>
		<tbody>

			<?php
			foreach($records as $cont)
			{
			?>

			<tr>
				<td>
				<?php
			     if($cont->type=='new_ctrl')
			     {
			         echo "<b>$cont->fname $cont->lname</b> joined as an $cont->status Air Traffic Controller in $cont->vacc";
			     }
			     elseif($cont->type=='upd_auth')
			     {
			         echo "<b>$cont->fname $cont->lname</b> is now authorised to control as a $cont->auth Controller!";
			     }
			     elseif($cont->type=='rating')
			     {
			         echo "Congratulations to <b>$cont->fname $cont->lname</b> for his Rating Upgrade to <b>$cont->rating</b> Rating!";
			     }
			     elseif($cont->type=='event')
			     {
			         echo "$cont->vacc is hosting <b>$cont->fname</b> Event on <b>$cont->lname</b>";
			     }
			     
			     ?>
			    </td>
			
			</tr>

			<?php
			}
			?>
		</tbody>
	</table>

		     </div>
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