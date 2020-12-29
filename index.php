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

<?php include('dashboard_query.php');
	//echo $tabletCount;
 ?>

    <!DOCTYPE html>
    <html>

    <head>

        <!-- Title -->
        <title>AMS | Admin Dashboard</title>

        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />

        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet" />
        <link href="assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet" />
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css" />

        <link href="assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css" />

        <!-- Theme Styles -->
        <link href="assets/css/modern.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/themes/white.css" class="theme-color" rel="stylesheet" type="text/css" />
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />

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
        <!-- Search Form -->
        <main class="page-content content-wrap">
            <?php
			include('top-nav.php');
			?>
                <?php
			include('sidebar.php');
			?>

                    <div class="page-inner">
                        <div class="page-title">
                            <h3>
                                <dashboard></dashboard>
                            </h3>
                            <div class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                        <div id="main-wrapper">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="panel info-box panel-white">
                                        <div class="panel-body">
                                            <div class="info-box-stats">
                                                <p class="counter">
                                                    <?php echo $apple_count.' Assets';?>
                                                </p>
                                                <span class="info-box-title"><span class="text text-primary">Apple</span></span>
                                            </div>
                                            <div class="info-box-icon">
                                                <i class="fa fa-apple"></i>
                                            </div>
                                            <div class="info-box-progress">
                                                <div class="progress progress-xs progress-squared bs-n">
                                                    <div class="progress-bar progress-bar-active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="panel info-box panel-white">
                                        <div class="panel-body">
                                            <div class="info-box-stats">
                                                <p class="counter">
                                                    <?php echo $samsung_count.' Assets';?>
                                                </p>
                                                <span class="info-box-title"><span class="text text-primary">Samsung</span></span>
                                            </div>
                                            <div class="info-box-icon">
                                                <i class="fa fa-mobile"></i>
                                            </div>
                                            <div class="info-box-progress">
                                                <div class="progress progress-xs progress-squared bs-n">
                                                    <div class="progress-bar progress-bar-active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="panel info-box panel-white">
                                        <div class="panel-body">
                                            <div class="info-box-stats">
                                                <p class="counter">
                                                    <?php echo $xiaomi_count.' Assets';?>
                                                </p>
                                                <span class="info-box-title"><span class="text text-primary">Xiaomi</span></span>
                                            </div>
                                            <div class="info-box-icon">
                                                <i class="fa fa-mobile"></i>
                                            </div>
                                            <div class="info-box-progress">
                                                <div class="progress progress-xs progress-squared bs-n">
                                                    <div class="progress-bar progress-bar-active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="panel info-box panel-white">
                                        <div class="panel-body">
                                            <div class="info-box-stats">
                                                <p class="counter">
                                                    <?php echo $oppo_count.' Assets';?>
                                                </p>
                                                <span class="info-box-title"><span class="text text-primary">Oppo</span></span>
                                            </div>
                                            <div class="info-box-icon">
                                                <i class="fa fa-mobile"></i>
                                            </div>
                                            <div class="info-box-progress">
                                                <div class="progress progress-xs progress-squared bs-n">
                                                    <div class="progress-bar progress-bar-active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p></p>
                                <p></p>

                            </div>
                            <!-- Row 1 -->
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="panel info-box panel-white">
                                        <div class="panel-body">
                                            <div class="info-box-stats">
                                                <p class="counter">
                                                    <?php echo $mobile_count;?>
                                                </p>
                                                <span class="info-box-title">Mobile Count</span>
                                            </div>
                                            <div class="info-box-icon">
                                                <i class="fa  icon-screen-smartphone"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="panel info-box panel-white">
                                        <div class="panel-body">
                                            <div class="info-box-stats">
                                                <p class="counter">
                                                    <?php echo $wearable_count;?>
                                                </p>
                                                <span class="info-box-title">Wearable Count</span>
                                            </div>
                                            <div class="info-box-icon">
                                                <i class="fa icon-disc"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="panel info-box panel-white">
                                        <div class="panel-body">
                                            <div class="info-box-stats">
                                                <p class="counter">
                                                    <?php echo $vr_count;?>
                                                </p>
                                                <span class="info-box-title">VR Count</span>
                                            </div>
                                            <div class="info-box-icon">
                                                <i class="fa fa-binoculars"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="panel info-box panel-white">
                                        <div class="panel-body">
                                            <div class="info-box-stats">
                                                <p><span class="counter"><?php echo $tablet_count;?></span></p>
                                                <span class="info-box-title">Tablet Count</span>
                                            </div>
                                            <div class="info-box-icon">
                                                <i class="icon-usd"></i>
                                                <i class="fa icon-screen-tablet"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <p></p>
                                <p></p>

                            </div>
                            <!-- Row 2-->

                            <div class="row">

                                <div class="col-lg-3 col-md-6">
                                    <div class="panel info-box panel-white">
                                        <div class="panel-body">
                                            <div class="info-box-stats">
                                                <p class="counter">
                                                    <?php echo $total_count;?>
                                                </p>
                                                <span class="info-box-title">Total Assets</span>
                                            </div>
                                            <div class="info-box-icon">
                                                <i class="fa fa-calculator"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="panel info-box panel-white">
                                        <div class="panel-body">
                                            <div class="info-box-stats">
                                                <p class="counter">
                                                    <?php echo $unfit_count;?>
                                                </p>
                                                <span class="info-box-title"><span class="text text-danger">Unfit Assets</span></span>
                                            </div>
                                            <div class="info-box-icon">
                                                <i class="fa fa-frown-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="panel info-box panel-white">
                                        <div class="panel-body">
                                            <div class="info-box-stats">
                                                <p class="counter">
                                                    <?php echo $borrow_lost_count;?>
                                                </p>
                                                <span class="info-box-title"><span class="text text-danger">Borrowed/Lost Assets</span></span>
                                            </div>
                                            <div class="info-box-icon">
                                                <i class="fa icon-call-out"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="panel info-box panel-white">
                                        <div class="panel-body">
                                            <div class="info-box-stats">
                                                <p class="counter">
                                                    <?php echo $sold_count;?>
                                                </p>
                                                <span class="info-box-title">Sold Assets</span>
                                            </div>
                                            <div class="info-box-icon">
                                                <i class="fa fa-shopping-cart"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- Main Wrapper -->
                        <div class="page-footer">
                            <p class="no-s">MIT 21<sup>st</sup> Batch, Institute of Information Technology, University of Dhaka.</p>
                        </div>
                    </div>
                    <!-- Page Inner -->
        </main>
        <!-- Page Content -->
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
        <script src="assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="assets/plugins/jquery-counterup/jquery.counterup.min.js"></script>
        <script src="assets/plugins/toastr/toastr.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="assets/plugins/metrojs/MetroJs.min.js"></script>
        <script src="assets/js/modern.js"></script>
        <script src="assets/js/pages/dashboard.js"></script>

    </body>

    </html>