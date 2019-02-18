<?php
@session_start();
include 'config/connection.php';
include 'api/domain_checker.php';

//Get the title of the link

function page_title($url) {
    $fp = file_get_contents($url);
    if (!$fp) 
        return null;

    $res = preg_match("/<title>(.*)<\/title>/siU", $fp, $title_matches);
    if (!$res) 
        return null; 

    // Clean up title: remove EOL's and excessive whitespace.
    $title = preg_replace('/\s+/', ' ', $title_matches[1]);
    $title = trim($title);
    return $title;
}

// Add the domain to database

function add_domain($link)
{

	$title = @page_title($link);

	if(@domainAvailable($link) == "NO")
	{
		$available = "NO";

	}else if(@domainAvailable($link) == "YES")
	{
		$available = "YES";
		
	}else
	{
		$available = "UNKNOWN";
	}
	
	$link = @str_replace("https://", "", $link);
	$link = @str_replace("http://", "", $link);
	$user = $_SESSION['id'];

	$query = "insert into domains (user, link, title, available) values ('$user', '$link', '$title', '$available')";

	if(@mysqli_query($GLOBALS['connection'], $query))
	{
		return true;
	}

}

function remove_domain($id)
{

	$id = mysqli_escape_string($GLOBALS['connection'], $id);

	$query = "delete from domains where id = $id";

	if(@mysqli_query($GLOBALS['connection'], $query))
	{
		return true;
	}

}

function search_domain($id)
{

	$id = mysqli_escape_string($GLOBALS['connection'], $id);

	$query = "select * from domains where id = $id";

	$result = mysqli_query($GLOBALS['connection'], $query);

	$count = mysqli_num_rows($result);

	if($count > 0)
	{
		return true;
	}

}

?>