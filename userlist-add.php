<?php
ob_start();
session_start();
if($_SESSION['name']!='ams')
{
	header('location: login.php');
}
?>
<?php include('config.php'); ?>
<?php include('config.php');
$name1 = $_SESSION['name1'];
$username = $_SESSION['username'];
 ?>
<?php
include('config.php');
if(isset($_POST['form1'])) {
$sql1= mysql_query("SELECT username from tbl_login where username = '$_POST[username]'");
    
$row = mysql_fetch_array($sql1);
$check = $row['username'];
	try {

        if(empty($_POST['username'])) {
			throw new Exception('User name can not be empty');
        }
        
        if($_POST['username']==$check) {
			throw new Exception('User name already taken');
		}
	
		if(empty($_POST['name'])) {
			throw new Exception('Name can not be empty');
        }
        
        if(empty($_POST['emp_id'])) {
			throw new Exception('Employee ID can not be empty');
        }

        if(empty($_POST['password'])) {
			throw new Exception('Password can not be empty');
        }

        $pass = $_POST['password'];
        $p1 = "/[a-z]+/";
        $p2 = "/[A-Z]+/";
        $p3 = "/[0-9]+/";
        $p4 = "/[@#!$%^&?]+/";
        if(!preg_match($p4, $pass) || !preg_match($p1, $pass) || !preg_match($p2, $pass) || !preg_match($p3, $pass)){
            throw new Exception("New Password did not matched criteria");
        }
        
        if(empty($_POST['confirm_password'])) {
			throw new Exception('Confirm password can not be empty');
        }

        if($_POST['password'] != $_POST['confirm_password']) {
			throw new Exception("Confirm passwords does not match!");
		}

        if(empty($_POST['mobile'])) {
			throw new Exception('Mobile can not be empty');
        }
		
		if(empty($_POST['access_type'])) {
			throw new Exception('Please confirm type of user');
		} 
        
		$encript_pass = $_POST['password'];
		$encript_pass = md5 ($encript_pass);
		
		$result = mysql_query("insert into tbl_login (name, access_type, username, emp_id, password, designation, mobile, desk_location) values('$_POST[name]','$_POST[access_type]','$_POST[username]','$_POST[emp_id]', '$encript_pass', '$_POST[designation]', '$_POST[mobile]', '$_POST[desk_location]') ");
		
		$success_message = 'New user creation is Successful.';
		
	
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
        <title>AMS | Creat User Page</title>
        
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
                    <h3>Create User</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#">User Setup</a></li>
                            <li class="active">Create User</li>
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
                                    <form action="" method="post" class="form-horizontal col-md-7">
										
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">User Name <span style="color:red">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="username" class="form-control" id="input-help-block">
                                                <p class="help-block text-primary">Guideline : Alpha Numeric</p>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Full Name <span style="color:red">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" class="form-control" id="input-help-block">
                                                <p class="help-block text-primary">Guideline : Only Text</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Employee Id <span style="color:red">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="number" name="emp_id" class="form-control" id="input-help-block">
                                                <p class="help-block text-primary">Guideline : Only Numbers</p>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Password <span style="color:red">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password" class="form-control" id="password" onkeyup="showHintPassword(this.value)">
                                                <p id="hint_password"class="help-block text-danger">Guideline : Complex [Uppercase, Lowercase, Number, Special Character]</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Confirm Password <span style="color:red">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="password" name="confirm_password" class="form-control" id="confirm_password" onkeyup="showHintConfirmPassword(this.value)">
                                                <p id="hint_confirm_password" class="help-block text-danger">Guideline : Must matched with password</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Designation</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="designation" class="form-control" id="input-help-block">
                                                <p class="help-block text-primary">Guideline : Only Text</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Mobile <span style="color:red">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="number" name="mobile" class="form-control" id="input-help-block">
                                                <p class="help-block text-primary">Guideline : Only Numbers</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Desk Location</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="desk_location" class="form-control" id="input-help-block">
                                                <p class="help-block text-primary">Guideline : Alpha Numeric</p>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">User Type <span style="color:red">*</span></label>
                                            <div class="col-sm-10">
                                                <select name="access_type" class="form-control" id="input-help-block">			
												  <option value="">Please Select Below</option>
												  <option value="admin">Admin</option>
												  <option value="user">User</option>									  
												  <option value="guest">Guest</option>									  
												</select>
                                            </div>
                                        </div>
										
										
										<div class="form-group">
                                            <label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" name="form1" class="btn btn-primary btn-addon m-b-sm btn-lg"><i class="fa fa-plus"></i> Add User</button>
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
        <nav class="cd-nav-container" id="cd-nav">
            <header>
                <h3>Navigation</h3>
                <a href="#0" class="cd-close-nav">Close</a>
            </header>
            <ul class="cd-nav list-unstyled">
                <li class="cd-selected" data-menu="index">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li data-menu="profile">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <p>Profile</p>
                    </a>
                </li>
                <li data-menu="inbox">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-envelope"></i>
                        </span>
                        <p>Mailbox</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-tasks"></i>
                        </span>
                        <p>Tasks</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-cog"></i>
                        </span>
                        <p>Settings</p>
                    </a>
                </li>
                <li data-menu="calendar">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <p>Calendar</p>
                    </a>
                </li>
            </ul>
        </nav>
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