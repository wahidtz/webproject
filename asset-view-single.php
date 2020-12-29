<?php
ob_start();
session_start();
if($_SESSION['name']!='ams')
{
	header('location: login.php');
}
?>
<?php
include('config.php');
$username = $_SESSION['username'];

if(isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
}
else {
	header('location: index.php');
}
//echo $sl_id;
?>

<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>AMS | Asset Details</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
        
        <!-- Theme Styles -->
        <link href="assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/themes/white.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
		
		<script>
		function confirm_delete() {
			return confirm('Are you sure? This data will be permanently deleted from database.');
		}
		</script>
        
    </head>
    <body class="page-header-fixed">
        <div class="overlay"></div>
		

        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s1">
            <h3><span class="pull-left">Chat</span><a href="javascript:void(0);" class="pull-right" id="closeRight"><i class="fa fa-times"></i></a></h3>
		</nav>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
            <h3><span class="pull-left">Sandra Smith</span> <a href="javascript:void(0);" class="pull-right" id="closeRight2"><i class="fa fa-angle-right"></i></a></h3>
		</nav>
        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                        <a href="index.php" class="logo-text"><span>AMS~MIT</span></a>
                    </div><!-- Logo Box -->
                    <div class="search-button">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="topmenu-outer">
                         <?php include('top-nav.php');?>
						<!-- Top Menu -->
                    </div>
                </div>
            </div><!-- Navbar -->
            <?php include('sidebar.php');?>
			
			<!-- Page Sidebar -->
            <div class="page-inner">
                <div class="page-title">
                    <h3>Asset Page</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#">Asset</a></li>
                            <li class="active">Details</li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
						    <div class="panel panel-white">
                                
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="table table-data" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            
                                        </thead>
                                        <tbody>
												
											   
                                         </tbody>
                                    </table>  
									<?php
									
										$result = mysql_query("SELECT* FROM tbl_assetinfo INNER JOIN tbl_devicelist ON tbl_assetinfo.model_name = tbl_devicelist.model_name WHERE sl_id='$id'");
										while($row=mysql_fetch_array($result)) 
										{
											
											$asset_code = $row['asset_code'];
											$company = $row['company'];
											$device_type = $row['device_type'];
											$model_name = $row['model_name'];
											$operating_system = $row['operating_system'];
											$color = $row['color'];
											$availability = $row['availability'];
											$storage_location = $row['storage_location'];
											$checkin_date = $row['checkin_date'];
											$price = $row['price'];
											$remarks = $row['remarks'];

										}

										?>


										
										<table class="table ">
											<tr > 
											<td></td>
											<td><span class="pull-right"><a class="btn btn btn-primary" type="submit" href="asset-view-single-update.php?id=<?php echo $id; ?>"><span class="glyphicon glyphicon-edit"></span> </a>
														<a onclick="return confirm_delete();" type="submit" class="btn btn btn-danger" href="asset-delete.php?id=<?php echo $id; ?>"><span class="glyphicon glyphicon-trash"></span> </a>&nbsp;&nbsp;&nbsp;
												</span>
												</td>
											</tr>
											
                                            <tr>
												<td><b>Asset Code</b></td>
												<td class="text-info"><?php echo $asset_code; ?></td>
											</tr>
											<tr>
												<td><b>Company Name</b></td>
												<td ><?php echo $company; ?></td>
											</tr>
                                            <tr>
												<td><b>Device Type</b></td>
												<td ><?php echo $device_type; ?></td>
											</tr>
                                            <tr>
												<td><b>Model Name</b></td>
												<td ><?php echo $model_name; ?></td>
											</tr>
                                            <tr>
												<td><b>Operating System</b></td>
												<td ><?php echo $operating_system; ?></td>
											</tr>
                                            <tr>
												<td><b>Color</b></td>
												<td ><?php echo $color; ?></td>
											</tr>
                                            <tr>
												<td><b>Availability</b></td>
												<td ><?php echo $availability; ?></td>
											</tr>
                                            <tr>
												<td><b>Storage Location</b></td>
												<td ><?php echo $storage_location; ?></td>
											</tr>
                                            <tr>
												<td><b>Check In Date</b></td>
												<td ><?php echo $checkin_date; ?></td>
											</tr>
                                            <tr>
												<td><b>Price</b></td>
												<td ><?php echo $price; ?></td>
											</tr>
                                            <tr>
												<td><b>Remarks</b></td>
												<td ><?php echo $remarks; ?></td>
											</tr>
											
											
										</table>   
									   
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                <p class="no-s">MIT 21<sup>st</sup> Batch, Institute of Information Technology, University of Dhaka.</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        <div class="cd-overlay"></div>
	

        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.1.3.min.js"></script>
        <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/plugins/pace-master/pace.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="assets/plugins/waves/waves.min.js"></script>
        <script src="assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="assets/plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
        <script src="assets/plugins/moment/moment.js"></script>
        <script src="assets/plugins/datatables/js/jquery.datatables.min.js"></script>
        <script src="assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="assets/js/modern.min.js"></script>
        <script src="assets/js/pages/table-data.js"></script>
        
    </body>
</html>