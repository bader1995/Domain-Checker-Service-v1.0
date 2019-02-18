<?php

include 'config/connection.php';

//Add a new word

function add_word($text)
{

	$text = mysqli_escape_string($GLOBALS['connection'], $text);
	$add_date = date('Y-m-d');
	$length = strlen($text);

	$query = "insert into bad_words (text, add_date, length) values ('$text', '$add_date', '$length')";

	if(@mysqli_query($GLOBALS['connection'], $query))
	{
		return true;
	}

}

//Remove a word

function remove_word($id)
{

	$id = mysqli_escape_string($GLOBALS['connection'], $id);

	$query = "delete from bad_words where id = $id";

	if(@mysqli_query($GLOBALS['connection'], $query))
	{
		return true;
	}

}

//Search for a word

function search_word($id)
{

	$id = mysqli_escape_string($GLOBALS['connection'], $id);

	$query = "select * from bad_words where id = $id";

	if(@mysqli_query($GLOBALS['connection'], $query))
	{
		return true;
	}	

}

//get all words

function get_words()
{
    $bad_words = array();
    
    $query = "select text from bad_words";
    
    $result = mysqli_query($GLOBALS['connection'], $query);
    
    while($row = mysqli_fetch_row($result))
    {
        $bad_words[] = $row[0];
    }
    
    return $bad_words;
}

?>