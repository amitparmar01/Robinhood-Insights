<?php
session_start();

print("<pre>");
print("\n dashboard:\n");
if (count($_SESSION['txns']) > 0) 
{
	    print_r(sprintf('%d trades found in your account.', count($_SESSION['txns'])));
		print("\n");
		$txns = &$_SESSION['txns'];
		$cols = array_keys($_SESSION['txns'][0]);
		print_r(json_encode($cols));

		print("\n End array keys\n");
}
print("\nWriting to txns.json...\n");
$fp = fopen('txns.json', 'w');
fwrite($fp, json_encode($_SESSION['txns']));
fclose($fp);
print("\nFinished writing to txns.json\n");

/*
echo "<table>";
array_walk($_SESSION['txns'], 'print_row');
echo "</table>";
*/
//echo "<script type='text/javascript'>";
//$txns = json_encode($_SESSION['txns']);
//echo "var txns_js = ". $txns . ";\n";
//echo </script>
print("</pre>");
?>
<html>
	<head>
		<script src="https://code.jquery.com/jquery-1.12.4.js" ></script>
		<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" ></script>
   <!-- Bootstrap Core JavaScript -->
    <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
	<!-- Bootstrap-table JavaScript -->
	<script src="vendors/bower_components/bootstrap-table/dist/bootstrap-table.min.js"></script>
	<!-- Data table CSS -->
	<link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">

	</head>

<body>
	<script type="text/javascript">
	var txns_js = <?php echo json_encode($_SESSION['txns']); ?>;
$(document).ready(function() {
	$('#example').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
	} );
} );

 
</script>
<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Export</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="#"><span>table</span></a></li>
						<li class="active"><span>Export</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="example" class="table table-hover display  pb-30" >
												<thead>
													<tr>
													
													</tr>
												</thead>

												<tfoot>
													<tr>
													
													</tr>
												</tfoot>
												<tbody>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
				<!-- /Row -->
			</div>
			
		</div>
		<!-- /Main Content -->

													

		<table id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
				
				</tr>
			</thead>
			<tfoot>
				<tr>
				
				</tr>
			</tfoot>
	</table>
</body>
</html>