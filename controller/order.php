<?php

include 'config/connection.php';

//Add new order

function add_order($user, $package)
{

    $user = mysqli_escape_string($GLOBALS['connection'], $user);
    $package = mysqli_escape_string($GLOBALS['connection'], $package);
    $order_date = date('Y-m-d');
    $status = "Unpaid";

    $query = "insert into orders (user, order_date, status, package) values ('$user', '$order_date', '$status', '$package')";

    if(@mysqli_query($GLOBALS['connection'], $query))
    {
        return true;
    }

}

//Remove order

function remove_order($id)
{

    $id = mysqli_escape_string($GLOBALS['connection'], $query);

    $query = "delete from orders where id = $id";

    if(@mysqli_query($GLOBALS['connection'], $query))
    {
        return true;
    }

}

//Change the status of an order to 'paid'

function paid_order($id)
{

    $id = mysqli_escape_string($GLOBALS['connection'], $query);

    $query = "update orders set status = 'paid' Where id = $id";

    if(@mysqli_query($GLOBALS['connection'], $query))
    {
        return true;
    }

}

//Search for an order

function search_order($id)
{

    $id = mysqli_escape_string($GLOBALS['connection'], $query);

    $query = "select * from orders where id = $id";
    $result = mysqli_query($GLOBALS['connection'], $query);
    $count = mysqli_num_rows($result);
    if($count > 0)
    {
        return true;
    }

}

?>