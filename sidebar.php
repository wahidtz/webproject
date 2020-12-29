<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("asset_ms_db");
	$username = $_SESSION['username'];
	$statement = "select access_type from tbl_login where username='$username'";
	$result = mysql_query($statement);
	while($row=mysql_fetch_array($result))
	{
		$temp = $row['access_type'];
	}
	$userlevl=$temp;
	IF ($userlevl=='user') { 
	  $visbility='hidden';
	} 
	ELSE { 
	  $visbility='';
	}
?>

<div class="page-sidebar sidebar">
    <div class="page-sidebar-inner slimscroll">
        <div class="sidebar-header">
            <div class="sidebar-profile">
                    <div class="sidebar-profile-image">
                        <img src="assets/images/avatar1.png" class="img-circle img-responsive" alt="">
                    </div>
                    <div class="sidebar-profile-details">
                        <span><?php echo $name1;?><br><small>Welcome</small></span>
                    </div>
            </div>
        </div>
        <ul class="menu accordion-menu">
            <li class=""><a href="index.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>                
            <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Users</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li><a href="userlist-view.php">List</a></li>
                    <li <?php echo $visbility;?>><a href="userlist-add.php">Register</a></li>
                </ul>
            </li>                 
            <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon fa fa-mobile-phone"></span><p>Asset</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li <?php echo $visbility;?>><a href="asset-add.php">New</a></li>
                    <li><a href="asset-view.php">View All</a></li>
                </ul>
            </li> 

            <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon fa fa-book"></span><p>View</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li><a href="asset-view-in-stock.php">In Stock Devices</a></li>
                    <li><a href="asset-view-sold.php">Sold Devices</a></li>
                    <li><a href="asset-view-fitness.php">Device Fitness</a></li>
                    <li><a href="asset-view-borrow.php">Borrow Or Lost</a></li>
                </ul>
            </li> 

            <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon fa fa-cog"></span><p>Actions</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li><a href="asset-soldout.php">Sell Asset</a></li>
                    <li><a href="asset-borrow-lost-others.php">Register Borrow Or Lost</a></li>
                    <li><a href="asset-modify-fitness.php">Modify Device Fitness</a></li>
                </ul>
            </li> 
            
            <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon fa fa-android"></span><p>Device Model</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li><a href="devicelist-view.php">View</a></li>
                    <li><a href="devicelist-add.php">Add</a></li>
                </ul>
            </li>
            
        </ul>
    </div><!-- Page Sidebar Inner -->
</div><!-- Page Sidebar -->