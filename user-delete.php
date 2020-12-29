<?php
ob_start();
session_start();
if($_SESSION['name']!='rst')
{
	header('location: login.php');
}
?>
<?php
include('config.php');

if(isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
	
	$result = mysql_query("delete from tbl_login where id='$id'");
		
	header('location: userlist-view.php');
}
else {
	header('location: userlist-view.php');
}