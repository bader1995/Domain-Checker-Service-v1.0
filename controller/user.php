<?php

include 'config/connection.php';

//Adding new user to the users table

function add_user($first_name, $last_name, $address, $city, $state, $zip_code, $email, $password, $phone_number)
{

    $first_name = mysqli_escape_string($GLOBALS['connection'], $first_name);
    $last_name = mysqli_escape_string($GLOBALS['connection'], $last_name);
    $address = mysqli_escape_string($GLOBALS['connection'], $address);
    $city = mysqli_escape_string($GLOBALS['connection'], $city);
    $state = mysqli_escape_string($GLOBALS['connection'], $state);
    $zip_code = mysqli_escape_string($GLOBALS['connection'], $zip_code);
    $email = mysqli_escape_string($GLOBALS['connection'], $email);
    $password = md5($password);
    $phone_number = mysqli_escape_string($GLOBALS['connection'], $phone_number);
    $credit = "0";
    $registration_date = date('Y-m-d');
    $type = "user";

    $query = "insert into users (first_name, last_name, address, city, state, zip_code, email, password, phone_number, credit, registration_date, type) values ('$first_name', '$last_name', '$address', '$city', '$state', '$zip_code', '$email', '$password', '$phone_number', '$credit', '$registration_date', '$type')";

    if(@mysqli_query($GLOBALS['connection'], $query))
    {
        return true;
    }

}

//Updating the user

function update_user($id, $first_name, $last_name, $address, $city, $state, $zip_code, $email, $phone_number)
{

    $id = mysqli_escape_string($GLOBALS['connection'], $id);
    $first_name = mysqli_escape_string($GLOBALS['connection'], $first_name);
    $last_name = mysqli_escape_string($GLOBALS['connection'], $last_name);
    $address = mysqli_escape_string($GLOBALS['connection'], $address);
    $city = mysqli_escape_string($GLOBALS['connection'], $city);
    $state = mysqli_escape_string($GLOBALS['connection'], $state);
    $zip_code = mysqli_escape_string($GLOBALS['connection'], $zip_code);
    $email = mysqli_escape_string($GLOBALS['connection'], $email);
    $password = md5(mysqli_escape_string($GLOBALS['connection'], $password));
    $phone_number = mysqli_escape_string($GLOBALS['connection'], $phone_number);
    $credit = "0";
    $registration_date = date('Y-m-d');
    $type = "user";

    $query = "update users set first_name = '$first_name', last_name = '$last_name', address='$address', city='$city', state='$state', zip_code='$zip_code', email='$email', password = '$password', phone_number='$phone_number', credit='$credit', registration_date='$registration_date', type='$type' where id = $id";

    if(@mysqli_query($GLOBALS['connection'], $query))
    {
        return true;
    }

}

//removing the user

function remove_user($id)
{

    $id = mysqli_escape_string($GLOBALS['connection'], $id);

    $query = "delete from users where id = $id";

    if(@mysqli_query($GLOBALS['connection'], $query))
    {
        return true;
    }

}

//Searching for a user

function search_user($id)
{
    $id = mysqli_escape_string($GLOBALS['connection'], $id);

    $query = "select * from users where id = $id";

    $result = mysqli_query($GLOBALS['connection'], $query);

    $count = mysqli_num_rows($result);

    if($count > 0)
    {
        return true;
    }

}

//Login

function login($email, $password)
{

    $email = @mysqli_escape_string($GLOBALS['connection'], $email);
    $password = @md5($password);

    $query = "select * from users where email = '$email' and password = '$password'";

    $result = @mysqli_query($GLOBALS['connection'], $query);

    $count = @mysqli_num_rows($result);

    if($count > 0)
    {

        return true;

    }

}

//Change password

function change_password($email, $password)
{

    $email = mysqli_escape_string($GLOBALS['connection'], $email);
    $password = md5(mysqli_escape_string($globals['connection'], $password));

    $query = "update users set password = '$password' where email = '$email'";

    if(@mysqli_query($GLOBALS['connection'], $query))
    {
        return true;
    }

}

//Check Credit

function check_credit($email)
{
	
	$query = "select credit from users where email = '$email'";
	
	$result = @mysqli_query($GLOBALS['connection'], $query);
	
	$row = mysqli_fetch_row($result);
	
	$credit = $row[0];
	
	return $credit;
	
}

//Decrease credit

function decrease_credit($email)
{
    
    $query = "update users set credit = credit - 1 where email = '$email'";
    
    if(@mysqli_query($GLOBALS['connection'], $query))
    {
        return true;
    }
       
}

?>