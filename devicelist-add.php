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

if(isset($_POST['form1'])) {
$sql1= mysql_query("SELECT model_name from tbl_devicelist where model_name = '$_POST[model_name]'");
$row = mysql_fetch_array($sql1);
$check = $row['model_name'];
	try {

        if(empty($_POST['company'])) {
			throw new Exception('Company name can not be empty');
		}
	
		if(empty($_POST['device_type'])) {
			throw new Exception('Device type can not be empty');
		}
	
	
		if(empty($_POST['model_name'])) {
			throw new Exception('Model name can not be empty');
		}
		
		if($_POST['model_name']==$check) {
			throw new Exception('Already exist');
        }
        
        if(empty($_POST['price'])) {
			throw new Exception('Price can not be empty');
		}
		
		$result = mysql_query("insert into tbl_devicelist (company,device_type,model_name,operating_system,init_price) values('$_POST[company]','$_POST[device_type]','$_POST[model_name]','$_POST[operating_system]','$_POST[price]') ");
		
		$success_message = 'Data successfully inserted in database.<a href="devicelist-view.php">Review List</a>';
		
		
	
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}

?>

<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>AMS | Model Setup Page</title>
        
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
        <link href="assets/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css"/>
        
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
        
    </head>
    <body class="page-header-fixed">
        <div class="overlay"></div>
        <main class="page-content content-wrap">
           <?php
			include('top-nav.php');
			?><?php
			include('sidebar.php');
			?> 
            
            <div class="page-inner">
                <div class="page-title">
                    <h3>Device List</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#">Asset Setup</a></li>
                            <li class="active">New Device</li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
									<h4 class="text-danger">
									<?php  
									if(isset($error_message)) {echo $error_message;}
                                    if(isset($success_message)) {echo $success_message;
                                    }
									?>
									</h4>
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post" class="form-horizontal col-md-7">
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Company <span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <select name="company" class="form-control" id="input-help-block">
                                                <option>Please Specify Below</option>			
												  <option value="Samsung">Samsung</option>
												  <option value="Apple">Apple</option>
												  <option value="Oppo">Oppo</option>
												  <option value="Xiaomi">Xiaomi</option>										  
												</select>
                                                <p class="help-block text-info">Example : Samsung</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Device Type <span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
												<select class="js-states form-control" name="device_type" id="input-help-block">
												<option>Please Specify Below</option>
												<option>Phone</option>
												<option>Tablet</option>
												<option>Wearable</option>
                                                <option>Headphone</option>
                                                <option>Power Bank</option>
												<option>VR</option>
												<option>Others</option>
											    </select>
                                                <p class="help-block text-info">Example : Phone</p>
                                            </div>
                                        </div>
								
										<div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Model Name <span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="model_name" class="form-control" id="input-help-block">
                                                <p class="help-block text-info">Example : Galaxy Note5</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Operating System </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="operating_system" class="form-control" id="input-help-block">
                                                <p class="help-block text-info">Example : Android 10</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Price <span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="number" name="price" class="form-control" id="input-help-block">
                                                <p class="help-block text-info">Example : 20000</p>
                                            </div>
                                        </div>
										
										
										
										
										<div class="form-group">
                                            <label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" name="form1" class="btn btn-primary btn-addon m-b-sm btn-lg"><i class="fa fa-plus"></i> Add To System</button>
                                            </div>
                                        </div>										
                                    </form>
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
        <script src="assets/plugins/summernote-master/summernote.min.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <script src="assets/js/modern.min.js"></script>
        <script src="assets/js/pages/form-elements.js"></script>
        
    </body>
</html>