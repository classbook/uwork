<?php

mysql_connect("localhost", "root", "Curryplant@04") or die("Couldn't connect");
$theirdb = mysql_select_db("sitsolut_avi");
mysql_select_db("avi_real");
include "session.php";
include "validator.php";
include 'Image.php';
include 'domains.php';

function createQuery($string)
{
	$n_args = func_num_args();
	
	for ($i=1; $i<$n_args; $i++)
	{
		$value = func_get_arg($i);
		if (gettype($value)=="string")
			$value = mysql_escape_string ($value);
		$string = str_replace("{".$i."}", $value, $string);
	}
	return $string;
}
