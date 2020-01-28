 <?php 
  include 'connect.php';
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Project | Manager</title>

	<!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

	<!-- Styles -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/lib/themify-icons/themify-icons.css">
    <link href="http://zebratheme.com/html/fooadmin/assets/css/lib/datatable/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="http://zebratheme.com/html/fooadmin/assets/css/lib/datatable/buttons.bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/lib/mmc-chat.css" rel="stylesheet" />
    <link href="assets/css/lib/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/unix.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

<?php include 'nav.php';
include 'header.php';?>

    <!-- END chat Sidebar-->

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-0">
                        <div class="page-header">
							<div class="page-title">
								<h1>Dashboard </h1>
							</div>
						</div>
                    </div>
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
							<div class="page-title">
								<ol class="breadcrumb text-right">
									<li><a href="home.php">Dashboard</a></li>
									<li class="active">Topics</li>
								</ol>
							</div>
						</div>
                    </div>
                </div>
				<div class="main-content">
					<div class="row">
						<div class="col-lg-12">
							<div class="card alert">
								<div class="card-header">
									<h4>Project Topics List </h4>
									<div class="card-header-right-icon">
                                    <ul>
											<li class="card-close"><a href="add_topic.php"><i class="ti-plus"></i>Add Topic </a></li>
										</ul>
									</div>
								</div>
								<div class="bootstrap-data-table-panel">
									<table id="bootstrap-data-table" class="table table-success table-responsive text-wrap text-muted">
										<thead>
											<tr class="table-responsive" >
                                                <th>S/N</th>
                                                <th>Student Name</th>
                                                <th>Matric Number</th>
                                                <th>Supervisor Name</th>
                                                <th>Project Topic </th>
                                                <th>Project Platform</th>
                                                <th>Level</th>
                                                <th>Users</th>
                                                <th>Date Registered</th>
											</tr>
										</thead>
										<tbody>
                                    <?php
                                     $select_query = "SELECT  *  FROM `topics` ";
                                    $my_select = mysqli_query($mycon,$select_query);
                                         $count = 0;
                                             while($data = mysqli_fetch_array($my_select)){
                                    $count++;

                                
                                      ?>
											<tr><td><?php echo $count; ?></td>
                                                <td><?php echo $data["studentname"]; ?></td>
                                                <td><?php echo $data["matricnumber"]; ?></td>
                                                <td><?php echo $data["supervisor"]; ?></td>
                                                <td><?php echo $data["projecttopic"]; ?></td>
                                                <td><?php echo $data["projectplatform"]; ?></td>
                                                <td><?php echo $data["level"]; ?></td>
                                                <td><?php echo $data["users"]; ?></td>
                                                <td><?php echo $data["date"]; ?></td>
											</tr>
                    <?php  } ?>
										</tbody>
									</table>
								</div>
							</div><!-- /# card -->
						</div><!-- /# column -->
					</div><!-- /# row -->
				</div><!-- /# main content -->
            </div><!-- /# container-fluid -->
        </div><!-- /# main -->
    </div><!-- /# content wrap -->







    <script src="assets/js/lib/jquery.min.js"></script><!-- jquery vendor -->
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script><!-- nano scroller -->
    <script src="assets/js/lib/sidebar.js"></script><!-- sidebar -->
    <script src="assets/js/lib/bootstrap.min.js"></script><!-- bootstrap -->

    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="http://zebratheme.com/html/fooadmin/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="http://zebratheme.com/html/fooadmin/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>


    <script src="assets/js/lib/mmc-common.js"></script>
    <script src="assets/js/lib/mmc-chat.js"></script>
    <script src="assets/js/scripts.js"></script><!-- scripit init-->

	<script type="text/javascript">
$(document).ready(function() {
    $('#bootstrap-data-table-export').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
	</script>




</body>

</html>
