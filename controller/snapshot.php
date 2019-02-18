<?php
@session_start();
include 'config/connection.php';

function add_snapshot_db($link, $date)
{

	$link = mysqli_escape_string($GLOBALS['connection'], $link);

	$query = "select id from domains where link = '$link'";
	$result = @mysqli_query($GLOBALS['connection'], $query);
	$row = mysqli_fetch_row($result);
	$id = $row[0];
	$date = mysqli_escape_string($GLOBALS['connection'], $date);
	$get_date = date('Y-m-d');
	$spam = $_SESSION['spam_score'];
	$user = $_SESSION['id'];
	$snap_link = "http://web.archive.org/web/$date/$link";

	$query = "insert into snapshots(domain, snap_original_date, get_date, spam_score, user, snap_link) values ('$id', '$date', '$get_date', '$spam', '$user', '$snap_link')";

	mysqli_query($GLOBALS['connection'], $query);

}

function check_snapshot_existance($link, $date)
{

	$query = "select * from snapshots where domain = ( select id from domains where link = '$link' ) and snap_original_date = '$date'";

	$result = @mysqli_query($GLOBALS['connection'], $query);

	$count = @mysqli_num_rows($result);

	if($count > 0)
	{
		return true;
	}

}

?>