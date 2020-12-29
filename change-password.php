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
$name1 = $_SESSION['name1'];
$username = $_SESSION['username'];
if(isset($_POST['form1'])) {

	try {
	
		if(empty($_POST['old_password'])) {
			throw new Exception("Old password field can not be empty");
		}
		
		if(empty($_POST['new_password'])) {
			throw new Exception("New password field can not be empty");
        }
        
        $pass = $_POST['new_password'];
        $p1 = "/[a-z]+/";
        $p2 = "/[A-Z]+/";
        $p3 = "/[0-9]+/";
        $p4 = "/[@#!$%^&?]+/";
        if(!preg_match($p4, $pass) || !preg_match($p1, $pass) || !preg_match($p2, $pass) || !preg_match($p3, $pass)){
            throw new Exception("New Password did not matched criteria");
        }
		
		if(empty($_POST['confirm_password'])) {
			throw new Exception("Confirm password field can not be empty");
		}
		
		// Checking old password
		$password = $_POST['old_password'];
		$password = md5($password);
		
		$num=0;
		$result = mysql_query("select * from tbl_login where password='$password'");
		$num = mysql_num_rows($result);
		if($num==0) {
			throw new Exception("Old password is wrong!");
		}
		
		
		if($_POST['new_password'] != $_POST['confirm_password']) {
			throw new Exception("New passwords does not match!");
		}
		
		$new_password = $_POST['new_password'];
		$new_password = md5($new_password);
		
		$result = mysql_query("update tbl_login set password='$new_password' where username='$username'");
		
		$success_message = 'Password is changed successfully.';
		
	
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
        <title>AMS | Change Password</title>
        
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
        <script src="assets/js/password.js"></script>
        
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
                    <h3>Change Password</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#">Settings</a></li>
                            <li class="active">Change Password</li>
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
									?>
									</h4>
									<h4 class="text-success">
									<?php
									if(isset($success_message)) {echo $success_message;}
									?>
									</h4>
									
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post" class="form-horizontal col-md-8">									
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-3 control-label"><span class="text-primary">User</span></label>
                                            <div class="col-sm-7">
                                                <input disabled type="text" name="name" value="<?php echo $name1.' '.'('.$username.')';?>" class="form-control" id="input-help-block">
                                                
                                            </div>
                                        </div>								
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-3 control-label"><span class="text-info">Old Password</span></label>
                                            <div class="col-sm-7">
                                                <input type="password" name="old_password" placeholder="Old Password" class="form-control" id="input-help-block">
                                                
                                            </div>
                                        </div>							
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-3 control-label"><span class="text-info">New Password</span></label>
                                            <div class="col-sm-7">
                                                <input id="password" type="password" name="new_password" placeholder="New Password" class="form-control" id="input-help-block" onkeyup="showHintPassword(this.value)">
                                                <p id="hint_password"class="help-block text-danger">Guideline : Complex [Uppercase, Lowercase, Number, Special Character]</p>
                                            </div>
                                        </div>								
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-3 control-label"> <span class="text-info">Confirm Password</span></label>
                                            <div class="col-sm-7">
                                                <input id="confirm_password" type="password" name="confirm_password" placeholder="Confirm Password" class="form-control" id="input-help-block" onkeyup="showHintConfirmPassword(this.value)">
                                                <p id="hint_confirm_password" class="help-block text-danger">Guideline : Must matched with new password</p>
                                                
                                            </div>
                                        </div>							
																				
										<div class="form-group">
                                            <label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" name="form1" class="btn btn-success btn-addon m-b-sm btn-lg"><i class="fa fa-eye"></i> Update Password</button>
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