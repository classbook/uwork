<?php

session_start();

function is_logged()
{
	if (isset($_SESSION["user_logged"]))
		return true;
	else
		return false;
}