<?php

include 'config/connection.php';

//Add new package

function add_package($label, $credit, $price)
{

	$label = mysqli_escape_string($GLOBALS['connection'], $label);
	$credit = mysqli_escape_string($GLOBALS['connection'], $credit);
	$price = mysqli_escape_string($GLOBALS['connection'], $price);

	$query = "insert into packages (label, credit, price) values ('$label', '$credit', '$price')";

	if(@mysqli_query($GLOBALS['connection'], $query))
	{
		return true;
	}

}

//Remove a package

function remove_package($id)
{

	$id = mysqli_escape_string($GLOBALS['connection'], $id);
	$query = "delete from packages where id = $id";

	if(mysqli_query($GLOBALS['connection'], $query))
	{
		return true;
	}

}

//Search for a package

function search_package($id)
{

	$id = mysqli_escape_string($GLOBALS['connection'], $id);
	$query = "select * from packages where id = $id";

	if(mysqli_query($GLOBALS['connection'], $query))
	{
		return true;
	}

}

?>