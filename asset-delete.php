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

if(isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
	
	$result = mysql_query("delete from tbl_assetinfo where sl_id='$id'");
		
	header('location: asset-view.php');
}
else {
	header('location: asset-view.php');
}