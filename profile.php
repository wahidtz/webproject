<?php
ob_start();
session_start();
if($_SESSION['name']!='ams')
{
	header('location: login.php');
}

?>
<?php include('config.php');
$name1 = $_SESSION['name1'];
$username = $_SESSION['username'];
 ?>
 


<?php
include('config.php');
$username = $_SESSION['username'];

if(isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
}
else {
	//header('location: testaccounts-view.php');
}

if(isset($_POST['form1'])) {

	try {
		
		$result = mysql_query("update tbl_login set name='$_POST[name]',desk_location='$_POST[desk_location]',emp_id='$_POST[emp_id]',designation='$_POST[designation]',mobile='$_POST[mobile]' where username='$username'");
		
		
		$success_message = 'Your data successfully updated in system';
		
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}

?>
<?php
	$result = mysql_query("select * from tbl_login where username='$username'");
	while($row=mysql_fetch_array($result)) 
	{
		$fullname = $row['name'];
		$username = $row['username'];
		$empid = $row['emp_id'];
		$designation = $row['designation'];
		$mobile = $row['mobile'];
		$desklocation = $row['desk_location'];
		$accesslevel = $row['access_type'];
	}
?>


<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>AMS | User Profile</title>
        
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
                <div class="profile-cover">
                    <div class="row">
                        <div class="col-md-3 profile-image">
                            <div class="profile-image-container">
                                <img src="assets/images/avatar4.png" alt="">
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 user-profile">
                            <h3 class="text-center" >(<?php echo $name1;?>)</h3>
                            <p class="text-center"><?php echo $designation?></p>
                            <hr>
                            <ul class="list-unstyled text-center">
                                <li><p><i class="fa fa-map-marker m-r-xs"></i><?php echo $desklocation?></p></li>
                                <li><p><i class="fa fa-mobile-phone m-r-xs"></i>+880<?php echo $mobile?></p></li>
                                <li><p><i class="fa fa-envelope m-r-xs"></i><a href="#"><?php echo $username?>@smartshopbd.com</a></p></li>
                            </ul>
                            <hr>
													
                        </div>
                        
                        <div class="col-md-6 m-t-lg">
                            <div class="panel-heading clearfix">
                                <h4 class="panel-title">Personal data</h4>
                            </div>				
							<div class="panel-body">
                                    <form action="" method="post" class="form-horizontal" >
										                                       
										<div class="form-group">
                                            <label for="input-placeholder" class="col-sm-4 control-label">Full Name</label>
                                            <div class="col-sm-8">
												<input name="name" type="text" value="<?php echo $name1?>" class="form-control">
											</div>
                                        </div>
										<div class="form-group">
                                            <label for="input-placeholder" class="col-sm-4 control-label">Username</label>
                                            <div class="col-sm-8">
                                                <input disabled name="username" type="text" value="<?php echo $username?>" class="form-control">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="input-placeholder" class="col-sm-4 control-label">Employee ID</label>
                                            <div class="col-sm-8">
                                                <input name="emp_id" type="text" value="<?php echo $empid?>" class="form-control">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="input-placeholder" class="col-sm-4 control-label">Designation</label>
                                            <div class="col-sm-8">
                                                <input name="designation" type="text" value="<?php echo $designation?>" class="form-control">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="input-placeholder" class="col-sm-4 control-label">Mobile No.</label>
                                            <div class="col-sm-8">
                                                <input name="mobile" type="text" value="<?php echo $mobile?>" class="form-control">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="input-placeholder" class="col-sm-4 control-label">Desk Location</label>
                                            <div class="col-sm-8">
                                                <input name="desk_location" type="text" value="<?php echo $desklocation?>" class="form-control">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="input-placeholder" class="col-sm-4 control-label">Access Level</label>
                                            <div class="col-sm-8">
                                                <input disabled type="text" value="Your access level set as <?php echo $accesslevel?>" class="form-control">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <button  type="submit" name="form1" class="btn btn-primary btn-addon m-b-sm btn-lg"><i class="glyphicon glyphicon-check"></i> Update My Info.</button>
                                            </div>
                                        </div>										
                                    </form>
                                </div>
							
                        </div>
                        <div class="col-md-3 m-t-lg">
                                                                                    
                        </div>
                    </div>
					
					
					
					
                </div>
                <div class="page-footer">
                    <p class="no-s">MIT 21<sup>st</sup> Batch, Institute of Information Technology, University of Dhaka.</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        
	

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
        <script src="assets/js/modern.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzjeZ1lORVesmjaaFu0EbYeTw84t1_nek"></script>
        <script src="assets/js/pages/profile.js"></script>
        
    </body>
</html>