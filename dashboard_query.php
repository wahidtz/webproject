<?php
// Counting MSCA days
$link = mysql_connect("localhost", "root", "");
mysql_select_db("asset_ms_db");

$result = mysql_query("SELECT* FROM tbl_assetinfo INNER JOIN tbl_devicelist ON tbl_assetinfo.model_name = tbl_devicelist.model_name WHERE company = 'Apple' and availability = 'In Stock'");
$apple_count = mysql_num_rows($result);

$result = mysql_query("SELECT* FROM tbl_assetinfo INNER JOIN tbl_devicelist ON tbl_assetinfo.model_name = tbl_devicelist.model_name WHERE company = 'Samsung' and availability = 'In Stock'");
$samsung_count = mysql_num_rows($result);

$result = mysql_query("SELECT* FROM tbl_assetinfo INNER JOIN tbl_devicelist ON tbl_assetinfo.model_name = tbl_devicelist.model_name WHERE company = 'Xiaomi' and availability = 'In Stock'");
$xiaomi_count = mysql_num_rows($result);

$result = mysql_query("SELECT* FROM tbl_assetinfo INNER JOIN tbl_devicelist ON tbl_assetinfo.model_name = tbl_devicelist.model_name WHERE company = 'Oppo' and availability = 'In Stock'");
$oppo_count = mysql_num_rows($result);

$result = mysql_query("SELECT* FROM tbl_assetinfo INNER JOIN tbl_devicelist ON tbl_assetinfo.model_name = tbl_devicelist.model_name WHERE device_type = 'Phone' and availability = 'In Stock'");
$mobile_count = mysql_num_rows($result);

$result = mysql_query("SELECT* FROM tbl_assetinfo INNER JOIN tbl_devicelist ON tbl_assetinfo.model_name = tbl_devicelist.model_name WHERE device_type = 'Wearable' and availability = 'In Stock'");
$wearable_count = mysql_num_rows($result);

$result = mysql_query("SELECT* FROM tbl_assetinfo INNER JOIN tbl_devicelist ON tbl_assetinfo.model_name = tbl_devicelist.model_name WHERE device_type = 'Tablet' and availability = 'In Stock'");
$tablet_count = mysql_num_rows($result);

$result = mysql_query("SELECT* FROM tbl_assetinfo INNER JOIN tbl_devicelist ON tbl_assetinfo.model_name = tbl_devicelist.model_name WHERE device_type = 'VR' AND availability = 'In Stock'");
$vr_count = mysql_num_rows($result);

$result = mysql_query("SELECT* FROM tbl_assetinfo INNER JOIN tbl_devicelist ON tbl_assetinfo.model_name = tbl_devicelist.model_name WHERE availability = 'In Stock'");
$total_count = mysql_num_rows($result);

$result = mysql_query("SELECT* FROM tbl_assetinfo INNER JOIN tbl_devicelist ON tbl_assetinfo.model_name = tbl_devicelist.model_name WHERE availability = 'In Stock' and fitness IS NOT NULL");
$unfit_count = mysql_num_rows($result);

$result = mysql_query("SELECT* FROM tbl_assetinfo INNER JOIN tbl_devicelist ON tbl_assetinfo.model_name = tbl_devicelist.model_name WHERE availability = 'Borrowed' OR availability = 'Lost'");
$borrow_lost_count = mysql_num_rows($result);

$result = mysql_query("SELECT* FROM tbl_assetinfo INNER JOIN tbl_devicelist ON tbl_assetinfo.model_name = tbl_devicelist.model_name WHERE availability = 'Sold'");
$sold_count = mysql_num_rows($result);


?>

