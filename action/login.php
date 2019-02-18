<?php

session_start();

include '../controller/user.php';

if(isset($_SESSION['logged']))
{
	header("Location: index.php");
}

if(isset($_POST['login']))
{

	$email = $_POST['email'];
	$password = $_POST['password'];

	if(!empty($email) && !empty($password))
	{

		if(login($email, $password))
		{
			$_SESSION['logged'] = $email;
			header("Location: index.php");
		}else
		{
			echo "<script type='text/javascript'>alert('Email / password, Incorrect!')</script>";
			echo "<script>window.location.replace('../index.php')</script>";
		}

	}else
	{
		echo "<script>alert('Please fill all the required fields!')</script>";
		header("Location: ../index.php");
	}

}

?>