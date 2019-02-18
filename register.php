<?php
@session_start();
if(isset($_SESSION['logged']))
{
    header("Location: profil.php");
}
?>
<html>

	<head>
	
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Include the above in your HEAD tag -->
	
	</head>

	<body>
	
		     <nav class="navbar navbar-inverse">
            
              <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                  </button>
                  <a class="navbar-brand" href="index.php">Domain Checker Tool</a>
               </div>
            
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="contact.php">Contact</a></li>
                  <li><a href="faqs.php">FAQs</a></li>
                  <li><a href="pricing.php">Pricing</a></li>
                  <li class="active"><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                  <li><a href="<?php 
                      
                      if(isset($_SESSION['logged']))
                      {
                          
                        if($_SESSION['type'] == "administrator")
                        {
                          echo "admin.php";
                        }else
                        {
                          echo "profil.php";
                        }

                      }else
                      {
                          echo "login.php";
                      }
                      
                      ?>"><span class="glyphicon glyphicon-log-in"></span> <?php
                      
                      if(isset($_SESSION['logged']))
                      {
                          
                        if($_SESSION['type'] == "administrator")
                        {
                          echo "Admin";
                        }else
                        {
                          echo "Profil";
                        }

                      }else
                      {
                        echo "Login";
                      }
                      
                      ?></a></li>
                </ul>
              </div>
            </nav>
            
            <br>
            
            <?php

            if(isset($_POST['register']))
            {
                
                include 'controller/user.php';
                
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $address = $_POST['address'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $zip_code = $_POST['zip_code'];
                $email = $_POST['email'];
                $phone_number = $_POST['phone_number'];
                $password = md5($_POST['password']);
                
                if(!empty($first_name) && !empty($last_name) && !empty($address) && !empty($city) && !empty($state) && !empty($zip_code) && !empty($email) && !empty($phone_number) && !empty($password))
                {
                    if(@add_user($first_name, $last_name, $address, $city, $state, $zip_code, $email, $password, $phone_number))
                    {
                        echo "<div class='alert alert-success container'><strong>Success! </strong> The user has been successfull!y registered!</div>";
                    
                        // Sending email after registration

                        if(@mail($email, "Domain Checker Tool Service", "
                        
                        Hi, our team thank you for trying our service\n

                        If you have any question you can email us directly at : support@domainchecktool.com\n

                        Or you can use the form on our website to contact us.
                        
                        "))
                        {

                        }
                    
                    }else
                    {
                        echo "<div class='alert alert-warning container'><strong>Warning! </strong> Please fill all the required fields!</div>";
                    }
                }else
                {
                    echo "<div class='alert alert-danger container'><strong>Error! </strong> Problem inserting the user, please try again!</div>";
                }
                
            }
            
            ?>
            
            <br>
	
		<div class="container" style="max-width:500px">
        	<div class="row">
                <div class="col-md-12">
                    <form action="" method="post" id="fileForm" role="form">
                    <fieldset><legend class="text-center">Valid information is required to register. <span class="req"><small> required *</small></span></legend>
        
                    <div class="form-group">
                    <label for="phonenumber"><span class="req">* </span> First name : </label>
                            <input required type="text" name="first_name" id="phone" class="form-control phone" maxlength="28" onkeyup="validatephone(this);" /> 
                    </div>
        
                    <div class="form-group"> 	 
                        <label for="firstname"><span class="req">* </span> Last name: </label>
                            <input class="form-control" type="text" name="last_name" id = "txt" onkeyup = "Validate(this)" required /> 
                                <div id="errFirst"></div>    
                    </div>
        
                    <div class="form-group">
                        <label for="lastname"><span class="req">* </span> Address: </label> 
                            <input class="form-control" type="text" name="address" id = "txt" onkeyup = "Validate(this)" required />  
                                <div id="errLast"></div>
                    </div>
        
                    <div class="form-group">
                        <label for="email"><span class="req">* </span> City: </label> 
                            <input class="form-control" required type="text" name="city" id = "email"  onchange="email_validate(this.value);" />   
                                <div class="status" id="status"></div>
                    </div>
        
                    <div class="form-group">
                        <label for="username"><span class="req">* </span> State :</label> 
                            <input class="form-control" type="text" name="state" id = "txt" onkeyup = "Validate(this)" required />  
                                <div id="errLast"></div>
                    </div>
        
                    <div class="form-group">
                        <label for="password"><span class="req">* </span> Zip code :  </label>
                            <input required name="zip_code" type="text" class="form-control inputpass" id="pass1" /> </p>
        
                        <label for="password"><span class="req">* </span> Email :  </label>
                            <input required name="email" type="email" class="form-control inputpass"  id="pass2" />
                                <span id="confirmMessage" class="confirmMessage"></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="password"><span class="req">* </span> Password :  </label>
                            <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16"  id="pass1" /> </p>
        
                        <label for="password"><span class="req">* </span> Phone number :  </label>
                            <input required name="phone_number" type="text" class="form-control inputpass" id="pass2" />
                                <span id="confirmMessage" class="confirmMessage"></span>
                    </div>
                    
                    
        
                    <div class="form-group">
                    
                        <?php //$date_entered = date('m/d/Y H:i:s'); ?>
                        <input type="hidden" value="<?php //echo $date_entered; ?>" name="dateregistered">
                        <input type="hidden" value="0" name="activate" />
                        <hr>
        
                        <input type="checkbox" required name="terms" id="field_terms"> <label for="terms">I agree with the <a href="terms.php" title="You may read our terms and conditions by clicking on this link">terms and conditions</a> for Registration.</label><span class="req">* </span>
                    </div>
        
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name="register" value="Register">
                    </div>
                    
                    </fieldset>
                    </form><!-- ends register form -->
        

                </div><!-- ends col-6 -->
          
        
        	</div>
        </div>
	
	</body>
	
	<br />
		<hr>
	</br>
	
	<!-- Footer -->
	<section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
						<li><a href="https://wwwe.sunlimetech.com" title="Design and developed by"><i class="fa fa-angle-double-right"></i>Imprint</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-google-plus"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
				</hr>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p>National Transaction Corporation is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
					<p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
				</div>
				</hr>
			</div>	
		</div>
	</section>
	<!-- ./Footer -->

</html>