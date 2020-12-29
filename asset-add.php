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
date_default_timezone_set('Asia/Dhaka');
$username = $_SESSION['username'];
if(isset($_POST['form1'])) {
$sql1= mysql_query("SELECT asset_code from tbl_assetinfo where asset_code = '$_POST[asset_code]'");
$row = mysql_fetch_array($sql1);
$check = $row['asset_code'];

$sql2= mysql_query("SELECT sl_id from tbl_assetinfo where asset_code = '$_POST[asset_code]'");
$row = mysql_fetch_array($sql2);
$sl_display = $row['sl_id'];

	try {
	
		if(empty($_POST['model_name'])) {
			throw new Exception('Model Name can not be empty');
        }
        
        if(empty($_POST['asset_code'])) {
			throw new Exception('Asset Code can not be empty');
        }

        $pattern = "/^S[0-9]{11}/";
        $str = $_POST['asset_code'];
        if(!preg_match($pattern, $str) & strlen($str) != 12) {
            throw new Exception('Asset Code must have 11 digit following S');
        }
        if($_POST['asset_code']==$check) {
			throw new Exception('Asset Code already exist');
        }
        
        $price = intval($_POST['price']);
        $storage_location = $_POST['storage_location'];
        $color = $_POST['color'];
        if($_POST['storage_location'] == "Please Specify Below"){
            $storage_location = "Not defined";
        }
        if($_POST['color'] == "Please Specify Below"){
            $color = "Not defined";
        }
		$checkin_date = (new DateTime())->format('Y-m-d H:i:s');
		$result = mysql_query("insert into tbl_assetinfo (model_name, storage_location, availability, color, asset_code, checkin_date, price, remarks) values('$_POST[model_name]','$storage_location','In Stock','$color','$_POST[asset_code]','$checkin_date','$price','$_POST[remarks]')");
		
		echo $sl_display;
		$success_message = 'Data successfully inserted in database.';
		
		
	
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}

?>
<?php 
include('config.php');
$sql = "SELECT row_model FROM tbl_devicelist";
$result = mysql_query($sql);
?>
<script>
    function setValue(str) {
        if (str.length == 0) {
            document.getElementById("device_type").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var result = this.responseText;
                var hash = result.indexOf("#")
                var device_type = result.substring(14, hash);
                result = result.slice(hash+1);
                document.getElementById("device_type").value = device_type;
                var hash = result.indexOf("#")
                var company = result.substring(8, hash);
                result = result.slice(hash+1);
                document.getElementById("company").value = company;
                var hash = result.indexOf("#")
                var operating_system = result.substring(17, hash);
                result = result.slice(hash+1);
                document.getElementById("operating_system").value = operating_system;
                var price = result.substring(6, hash);
                document.getElementById("price").value = price;
            }
            };
            xmlhttp.open("GET", "ajax/get-values.php?q=" + str, true);
            xmlhttp.send();
  }
}

function showHint(str) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("txtHint").innerHTML = "Asset Code can not be empty";
    document.getElementById("form1").disabled = true;
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
      if(this.responseText === ""){
        document.getElementById("form1").disabled = false;
      }
    }
  };
  xhttp.open("GET", "ajax/gethint.php?q="+str, true);
  xhttp.send();   
}

</script>
<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>AMS | Add Asset</title>
        
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
        <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
        
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
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s1">
            <h3><span class="pull-left">Chat</span><a href="javascript:void(0);" class="pull-right" id="closeRight"><i class="fa fa-times"></i></a></h3>
		</nav>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
            <h3><span class="pull-left">Sandra Smith</span> <a href="javascript:void(0);" class="pull-right" id="closeRight2"><i class="fa fa-angle-right"></i></a></h3>
		</nav>
        <main class="page-content content-wrap">
           <?php include('top-nav.php');?>
			<?php include('sidebar.php');?>
            <div class="page-inner">
                <div class="page-title">
                    <h3>Insert Asset</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#">Insert</a></li>
                            <li class="active">Asset</li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
									<h4 class="text-danger">
									<?php  
									if(isset($error_message)) {echo $error_message;}
									if(isset($success_message)) {echo $success_message;}
									?>
									</h4>
									<form action="" method="post" >
										<div class="form-horizontal col-md-6"> 
											 <h4 class="no-m m-b-sm m-t-lg">Model Name <span class="text-danger">*</span></h4>
											 <?php 
												# here database details      
												mysql_connect('localhost','root','') or die('cannot connect to the server');
												mysql_select_db('asset_ms_db') or die('cannot select database');

												$sql = "SELECT model_name FROM tbl_devicelist";
												$result = mysql_query($sql);?>
												<select id="model_name" name="model_name" class="js-states form-control" style="display: none; width: 100%" onchange="setValue(this.value);">
													<option value="">Please Specify Below</option>
												<?php
													while ($row = mysql_fetch_array($result)) {
															
															echo "<option value='" . $row['model_name'] ."'>" . $row['model_name'] ."</option>";
													}

													echo "</select>";
												?>
												
											 
											<h4 class="no-m m-b-sm m-t-lg">Device Type</h4>
											<input disabled id="device_type" type="text" class="form-control" id="input-help-block" placeholder="Able to automatically determine, from Model Name field.">
											<p class="help-block text-info">Example : Phone/Tablet</p>
											
											<h4 class="no-m m-b-sm m-t-lg">Company</h4>
											<input disabled id="company" type="text"  class="form-control" id="input-placeholder" placeholder="Company Name">
											<p class="help-block text-info">Example : Samsung/Apple</p>
											
											<h4 class="no-m m-b-sm m-t-lg">Operating System</h4>
											<input disabled id="operating_system" type="text" class="form-control" id="input-placeholder" placeholder="Operating System">
											<p class="help-block text-info">Example : Android 10.0</p>
											
											<h4 class="no-m m-b-sm m-t-lg">Price</h4>
											<input id="price" name="price" type="number" class="form-control" id="input-help-block" placeholder="Able to automatically determine, from Model Name field.">
											<p class="help-block text-info">Example : 20000</p>
								
												
										</div>
										
										<div class="form-horizontal col-md-6">
											
											<h4 class="no-m m-b-sm m-t-lg">Storage Location</h4>
											<select class="js-states form-control" name="storage_location">
												<option>Please Specify Below</option>
												<option>Cabinet 1</option>
												<option>Cabinet 2</option>
												<option>Cabinet 3</option>
												<option>Display 1</option>
												<option>Display 2</option>
                                                <option>Others</option>
											</select>
											
											<h4 class="no-m m-b-sm m-t-lg">Availability</h4>
											<input disabled id="availability" name="availability" type="text" class="form-control" id="input-help-block" value="In Stock">
											<p class="help-block text-info">Default: In Stock</p>

                                            <h4 class="no-m m-b-sm m-t-lg">Color</h4>
											<select class="js-states form-control" name="color">
												<option>Please Specify Below</option>
												<option>Black</option>
												<option>Silver</option>
                                                <option>Blue</option>
                                                <option>White</option>
											</select>
											
											<h4 class="no-m m-b-sm m-t-lg">Asset Code <span class="text-danger">*</span></h4>
											<input type="text" name="asset_code" class="form-control" id="input-placeholder" placeholder="Example : S20201204001" onkeyup="showHint(this.value)">
											<p class="help-block text-danger"><span id="txtHint"></span></p>
																															
											<h4 class="no-m m-b-sm m-t-lg">CheckIn Date<span class="text-danger">*</span></h4>
											<input disabled type="text" name ="checkin_date" class="form-control date-picker" placeholder="<?php echo (new \DateTime())->format('Y-m-d H:i:s');?>">

                                            <h4 class="no-m m-b-sm m-t-lg">Remarks</h4>
											<textarea class="form-control" rows="10" name="remarks"></textarea>
							
										</div>
										<div class="form-horizontal col-md-12">
										<br />
										<br />
											<button id="form1" name="form1" type="submit" class="btn btn-primary btn-addon m-b-sm btn-lg"><i class="fa fa-plus"></i> Add To List</button>
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
        <script>
            document.getElementById("txtHint").innerHTML = "Asset Code can not be empty";
            document.getElementById("form1").disabled = true;
        </script>
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
        <script src="assets/plugins/select2/js/select2.min.js"></script>
        <script src="assets/js/modern.min.js"></script>
        <script src="assets/js/pages/form-select2.js"></script>
        
    </body>
</html>