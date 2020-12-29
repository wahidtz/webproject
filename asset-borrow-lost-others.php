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

if(isset($_POST['form1'])){

	try {
	
		if(empty($_POST['asset_code'])) {
			throw new Exception('Asset code is empty.');
        }
        
        if(empty($_POST['activity'])) {
			throw new Exception('Activity is empty.');
        }
        
        if(empty($_POST['details'])) {
			throw new Exception('Details is empty.');
		}
    
        $date = (new DateTime())->format('Y-m-d H:i:s');
		
		
		$result = mysql_query("insert into tbl_borrow_lost_others (asset_code, user_id, activity, details, date) values('$_POST[asset_code]','$username','$_POST[activity]','$_POST[details]', '$date')");
		$success_message = 'Asset activity changed successful.';
        header("LOCATION:asset-borrow-lost-others.php");
        
        $availability = "In Stock";
        if($_POST['activity'] == "Borrow") $availability = "Borrowed";
        if($_POST['activity'] == "Lost") $availability = "Lost";

        $query = mysql_query("update tbl_assetinfo set availability='$availability', storage_location='Not defined', remarks='$_POST[details]' where asset_code='$_POST[asset_code]'");

        if($_POST['activity'] == "Received" || $_POST['activity'] == "Found")
        $query = mysql_query("update tbl_assetinfo set storage_location='$_POST[storage_location]' where asset_code='$_POST[asset_code]'");

	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}

?>

<script>
    function setValue(activity){
        var xhttp;
        document.getElementById("asset_code").selectedIndex = 0;
        document.getElementById("storage_selector").selectedIndex = 0;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              var asset_codes = this.responseText;
              var asset_code = asset_codes.split(',');
              var str = "";
              for (var item of asset_code) {
                str += "<option>" + item + "</option>";
              }
              str += "</select>";
              document.getElementById("asset_code").innerHTML = str;
              if(activity === "Received" || activity === "Found"){
                document.getElementById("storage_selector").disabled = false;
              }else{
                document.getElementById("storage_selector").disabled = true;
              }


            }
        };
        xhttp.open("GET", "ajax/get-asset-code.php?q="+activity, true);
        xhttp.send();   
    }
    

function setDevice(str) {
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var result = this.responseText;
        res = result.split(',');
        document.getElementById("company").innerHTML = "Company: "+res[1];
        document.getElementById("device_type").innerHTML = "Type: "+res[0];
        document.getElementById("model_name").innerHTML = "Model: "+res[2];
    }
    };
    xmlhttp.open("GET", "ajax/get-device.php?q=" + str, true);
    xmlhttp.send();
  }
</script>
<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>AMS | Register Borrow, Lost & Others</title>
        
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
            <div class="chat-write">
                <form class="form-horizontal" action="javascript:void(0);">
                    <input type="text" class="form-control" placeholder="Say something">
                </form>
            </div>
		</nav>
        <main class="page-content content-wrap">
           <?php include('top-nav.php');?>
			<?php include('sidebar.php');?>
            <div class="page-inner">
                <div class="page-title">
                    <h3>Register Borrow Or Lost Asset</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#">Asset</a></li>
                            <li class="active">Borrow Or Lost</li>
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
									//if(isset($success_message)) {echo $success_message;}
									?>
									</h4>
									<h4 class="text-success">
									<?php  
									//if(isset($error_message)) {echo $error_message;}
									if(isset($success_message)) {echo $success_message;}
									?>
									</h4>
									<form action="" method="post" >
										<div class="form-horizontal col-md-6"> 

                                            <h4 class="no-m m-b-sm m-t-lg">Select Activity<span class="text-danger">*</span></h4>	
                                            <select name="activity" class="js-states form-control" style="display: none; width: 100%" onchange="setValue(this.value);">
													<option value="">Please Select Activity</option>
                                                    <option value="Borrow">Borrow</option>
                                                    <option value="Received">Received [Borrow]</option>
                                                    <option value="Lost">Lost</option>
                                                    <option value="Found">Found [Lost]</option>
                                            </select>

											<h4 class="no-m m-b-sm m-t-lg">Asset Code <span class="text-danger">*</span></h4>
											<select name="asset_code" id = "asset_code" class="js-states form-control" style="display: none; width: 100%" onchange="setDevice(this.value);"></select>
											<p id='company' class="help-block text-info"></p>
                                            <p id='device_type' class="help-block text-info"></p>	
                                            <p id='model_name' class="help-block text-info"></p>

                                            <h4 id='storage_location' class="no-m m-b-sm m-t-lg">Storage Location<span class="text-danger">*</span></h4>
											<select disabled id='storage_selector' class="js-states form-control" name="storage_location" style="display: none; width: 100%">
												<option>Please Specify Below</option>
												<option>Cabinet 1</option>
												<option>Cabinet 2</option>
												<option>Cabinet 3</option>
												<option>Display 1</option>
												<option>Display 2</option>
                                                <option>Others</option>
											</select>			

                                            <h4 class="no-m m-b-sm m-t-lg">Details<span class="text-danger">*</span></h4>
                                            <textarea name  = "details" class="form-control" rows="10" name="details"></textarea>
											 
											<h4 class="no-m m-b-sm m-t-lg">Date</h4>
											<input disabled type="text" name = "date" class="form-control" id="input-help-block" placeholder="<?php echo (new \DateTime())->format('Y-m-d H:i:s');?>">
												
										</div>
							
										</div>
										<div class="form-horizontal col-md-12">
										<br />
										<br />
											<button name="form1" type="submit" class="btn btn-success btn-addon m-b-sm btn-lg"><i class="fa fa-android"></i>Register</button>
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