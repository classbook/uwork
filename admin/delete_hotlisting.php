<?php
include("dbconfig.php");
$id = $_REQUEST['fid'];
$r = 'delete from hot_losting where id='.$id;
mysql_query($r);
header('Location:hotlistings.php');

?>