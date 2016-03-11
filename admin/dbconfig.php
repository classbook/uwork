<?php
error_reporting(0);
mysql_connect("localhost", "root", "Curryplant@04") or die(mysql_error());
$mydb = mysql_select_db("avi_real");
mysql_select_db("sitsolut_avi") or die(mysql_error());
?>