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

if(isset($_POST['form1'])) {

	try {
				
        $result = mysql_query("update tbl_assetinfo set color='$_POST[color]',availability='$_POST[availability]',storage_location='$_POST[storage_location]',remarks='$_POST[remarks]' where sl_id='$id'");
		
		
		$success_message = 'Your data successfully updated in system';
		
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
        <title>AMS | Asset Update Page</title>
        
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
                    <h3>Update Asset</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#">Asset</a></li>
                            <li class="active">Update</li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
									<h4 class="text-success">
									<?php  
									if(isset($error_message)) {echo $error_message;}
									if(isset($success_message)) {echo $success_message;}
									?>
									</h4>
                                </div>
								
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
								
                                <div class="panel-body">
                                    <form action="" method="post" class="form-horizontal col-md-7">
																				
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Asset Code<span class="text-danger"></span></label>
                                            <div class="col-sm-10">
                                                <input disabled type="text" name="asset_code" class="form-control" id="input-help-block" value="<?php echo $asset_code; ?>">
                                            </div>
                                        </div>
																				
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Company Name<span class="text-danger"></span></label>
                                            <div class="col-sm-10">
                                                <input disabled type="text" name="company" class="form-control" id="input-help-block" value="<?php echo $company; ?>">
                                            </div>
                                        </div>
																				
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Device Type<span class="text-danger"></span></label>
                                            <div class="col-sm-10">
                                                <input disabled type="text" name="device_type" class="form-control" id="input-help-block" value="<?php echo $device_type; ?>">
                                            </div>
                                        </div>
																				
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Model Name<span class="text-danger"></span></label>
                                            <div class="col-sm-10">
                                                <input disabled type="text" name="model_name" class="form-control" id="input-help-block" value="<?php echo $model_name; ?>">
                                            </div>
                                        </div>
																				
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Operating System<span class="text-danger"></span></label>
                                            <div class="col-sm-10">
                                                <input disabled type="text" name="operating_system" class="form-control" id="input-help-block" value="<?php echo $operating_system; ?>">
                                            </div>
                                        </div>
																				
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Color<span class="text-danger"></span></label>
                                            <div class="col-sm-10">
                                                <select class="js-states form-control" name="color">
                                                    <option>Please Specify Below</option>
                                                    <option <?php if($color == "Black") echo "selected"?>>Black</option>
                                                    <option <?php if($color == "Silver") echo "selected"?>>Silver</option>
                                                    <option <?php if($color == "Blue") echo "selected"?>>Blue</option>
                                                    <option <?php if($color == "White") echo "selected"?>>White</option>
                                                </select>
                                            </div>
                                        </div>
																				
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Availability<span class="text-danger"></span></label>
                                            <div class="col-sm-10">
                                                <select class="js-states form-control" name="availability">
                                                    <option>Please Specify Below</option>
                                                    <option <?php if($availability == "In Stock") echo "selected"?>>In Stock</option>
                                                    <option <?php if($availability == "Borrowed") echo "selected"?>>Borrowed</option>
                                                    <option <?php if($availability == "Sold") echo "selected"?>>Sold</option>
                                                </select>
                                            </div>
                                        </div>
																				
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Storage Location<span class="text-danger"></span></label>
                                            <div class="col-sm-10">
                                                <select class="js-states form-control" name="storage_location">
                                                    <option>Please Specify Below</option>
                                                    <option <?php if($storage_location == "Cabinet 1") echo "selected"?>>Cabinet 1</option>
                                                    <option <?php if($storage_location == "Cabinet 2") echo "selected"?>>Cabinet 2</option>
                                                    <option <?php if($storage_location == "Cabinet 3") echo "selected"?>>Cabinet 3</option>
                                                    <option <?php if($storage_location == "Display 1") echo "selected"?>>Display 1</option>
                                                    <option <?php if($storage_location == "Display 2") echo "selected"?>>Display 2</option>
                                                    <option <?php if($storage_location == "Others") echo "selected"?>>Others</option>
                                                </select>
                                            </div>
                                        </div>
																				
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Check In Date<span class="text-danger"></span></label>
                                            <div class="col-sm-10">
                                                <input disabled type="text" name="checkin_date" class="form-control" id="input-help-block" value="<?php echo $checkin_date; ?>">
                                            </div>
                                        </div>
																				
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Price<span class="text-danger"></span></label>
                                            <div class="col-sm-10">
                                                <input disabled type="text" name="price" class="form-control" id="input-help-block" value="<?php echo $price; ?>">
                                            </div>
                                        </div>
																				
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Remarks<span class="text-danger"></span></label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" rows="10" name="remarks"><?php echo $remarks; ?></textarea>
                                            </div>
                                        </div>							
										<div class="form-group">
                                            <label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" name="form1" class="btn btn-success btn-addon m-b-sm btn-lg"><i class="fa fa-edit"></i> Update</button>
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