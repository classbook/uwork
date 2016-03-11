<?php
include("dbconfig.php");
$id = $_REQUEST['fid'];
$r = mysql_query('delete from featured_project where id='.$id);
header('Location:featured_projects.php');

?>