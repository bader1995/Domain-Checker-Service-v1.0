<?php

//Database credentials

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "domain_checker_tool";

if(@mysqli_connect($servername, $username, $password, $db_name))
{
	$connection = mysqli_connect($servername, $username, $password, $db_name);

}else
{
	echo "Error connecting to database";
}

?>