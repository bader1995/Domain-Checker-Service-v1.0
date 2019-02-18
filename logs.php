<?php
@session_start();

include 'api/archive-api.php';

//Check logged user

if(!isset($_SESSION['logged']))
{
    header('Location: index.php');
}

if(isset($_POST['logout']))
{
   session_destroy();
   header("Location: login.php");
}

if(isset($_POST['myBtn']))
{
  header("Location: pricing.php");
}

?>

<html>

	<head>
	
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
		<style>
		
		  /***
            User Profile Sidebar by @keenthemes
            A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
            Licensed under MIT
            ***/
            
            body {
              background: #F1F3FA;
            }
            
            /* Profile container */
            .profile {
              margin: 20px 0;
            }
            
            /* Profile sidebar */
            .profile-sidebar {
              padding: 20px 0 10px 0;
              background: #fff;
            }
            
            .profile-userpic img {
              float: none;
              margin: 0 auto;
              width: 50%;
              height: 50%;
              -webkit-border-radius: 50% !important;
              -moz-border-radius: 50% !important;
              border-radius: 50% !important;
            }
            
            .profile-usertitle {
              text-align: center;
              margin-top: 20px;
            }
            
            .profile-usertitle-name {
              color: #5a7391;
              font-size: 16px;
              font-weight: 600;
              margin-bottom: 7px;
            }
            
            .profile-usertitle-job {
              text-transform: uppercase;
              color: #5b9bd1;
              font-size: 12px;
              font-weight: 600;
              margin-bottom: 15px;
            }
            
            .profile-userbuttons {
              text-align: center;
              margin-top: 10px;
            }
            
            .profile-userbuttons .btn {
              text-transform: uppercase;
              font-size: 11px;
              font-weight: 600;
              padding: 6px 15px;
              margin-right: 5px;
            }
            
            .profile-userbuttons .btn:last-child {
              margin-right: 0px;
            }
                
            .profile-usermenu {
              margin-top: 30px;
            }
            
            .profile-usermenu ul li {
              border-bottom: 1px solid #f0f4f7;
            }
            
            .profile-usermenu ul li:last-child {
              border-bottom: none;
            }
            
            .profile-usermenu ul li a {
              color: #93a3b5;
              font-size: 14px;
              font-weight: 400;
            }
            
            .profile-usermenu ul li a i {
              margin-right: 8px;
              font-size: 14px;
            }
            
            .profile-usermenu ul li a:hover {
              background-color: #fafcfd;
              color: #5b9bd1;
            }
            
            .profile-usermenu ul li.active {
              border-bottom: none;
            }
            
            .profile-usermenu ul li.active a {
              color: #5b9bd1;
              background-color: #f6f9fb;
              border-left: 2px solid #5b9bd1;
              margin-left: -2px;
            }
            
            /* Profile Content */
            .profile-content {
              padding: 20px;
              background: #fff;
              min-height: 460px;
            }
		
		</style>
		
		<style>
		
		.modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
        
        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }
        
        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
		
		</style>
		
			<style type="text/css">
		
		#container
		{
			width:450px;
			height:300px;
			margin:0 auto;
			text-align:center;
			margin-top:20%;
		}

		input[name="domain"]
		{
			width:400px;
			height:40px;
			padding-left:10px;
			border:solid 1px gray;
			border-radius:5px;
		}

		input[name="search"]
		{
			width:150px;
			height:30px;
			font-weight:bold;
		}
		
		input[name="verify"]
		{
			width:150px;
			height:30px;
			border:none;
			font-weight:bold;
		}

    #loading
    {
      width:150px;
      height:100px;
    }

	</style>
	
	</head>

	<body style="width:1280px">
	
			     <nav class="navbar navbar-inverse">
            
                  <div class="container-fluid">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                      </button>
                      <a class="navbar-brand" href="#">Domain Checker Tool</a>
                   </div>
                
                  <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                      <li class="active"><a href="index.php">Home</a></li>
                      <li><a href="contact.php">Contact</a></li>
                      <li><a href="faqs.php">FAQs</a></li>
                      <li><a href="pricing.php">Pricing</a></li>
                      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
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
	
		<div class="container">
            <div class="row profile">
        		<div class="col-md-3">
        			<div class="profile-sidebar">
        				<!-- SIDEBAR USERPIC -->
        				<div class="profile-userpic">
        					<img src="https://png.pngtree.com/element_origin_min_pic/16/11/25/f2db5b1fae65676bfd1ecae1dbfdc3a2.jpg" style="height:100px" class="img-responsive" alt="">
        				</div>
        				<!-- END SIDEBAR USERPIC -->
        				<!-- SIDEBAR USER TITLE -->
        				<div class="profile-usertitle">
        					<div class="profile-usertitle-name">
        						<?php 
        						
        						  include 'config/connection.php';
        						  
        						  $query = "select first_name, last_name, credit from users where email = '".$_SESSION['logged']."'";
        						  
        						  $result = mysqli_query($connection, $query);
        						  
        						  $row = mysqli_fetch_row($result);
        						
        						  $first_name = $row[0];
        						  $last_name = $row[1];
        						  $credit = $row[2];
        						  
        						  echo $first_name." ".$last_name;
        						  
        						?>
        					</div>
        					<div class="profile-usertitle-job">
        						<?php echo "Credit : ".$credit;?>
        					</div>
        				</div>
        				<!-- END SIDEBAR USER TITLE -->
        				<!-- SIDEBAR BUTTONS -->
        				<div class="profile-userbuttons">
        				<form method="post">
                  <button type="submit"  class="btn btn-success btn-sm" name="myBtn">Buy Credit</button>
        					<button type="submit" name="logout" class="btn btn-danger btn-sm">Logout!</button>
							
        				</form>
        				</div>
        				
        				<!-- The Modal -->
                        <div id="myModal" class="modal">
                        
                          <!-- Modal content -->
                          <div class="modal-content">
                            <span class="close">&times;</span>
                            
                            <div class="container">
                            
                            	<div class="form-group">
                            	
                            		<label>Amount : <input type="text" name="credit_amount" class="form-control"/></label>
                            		<label>Method : <input type="text" name="method" class="form-control"/></label>
                            	
                            	</div>
                            
                            </div>
                            
                          </div>
                        
                        </div>
        				
        				<!-- END SIDEBAR BUTTONS -->
        				<!-- SIDEBAR MENU -->
        				<div class="profile-usermenu">
        					<ul class="nav">
        						<li>
        							<a href="profil.php">
        							<i class="glyphicon glyphicon-home"></i>
        							Overview </a>
        						</li>
        						<li>
        							<a href="blacklist.php">
        							<i class="glyphicon glyphicon-user"></i>
        							Manage Black List </a>
        						</li >
        						<li class="active">
        							<a href="logs.php">
        							<i class="glyphicon glyphicon-ok"></i>
        							Logs </a>
        						</li>
        						<li>
        							<a href="#">
        							<i class="glyphicon glyphicon-flag"></i>
        							Help </a>
        						</li>
        					</ul>
        				</div>
        				<!-- END MENU -->
        			</div>
        		</div>
        		<div class="col-md-9">
                    <div class="profile-content" style="text-align:center">
        			   
                        <form method="post">

                          <div id="result" class="container-fluid">

                              <table class="table table-bordered table-striped">

                                  <th>#</th> <th>Domain ID</th> <th>Snapshot Date</th> <th>Search date</th> <th>Spam Score</th> <th>Snapshot Link</th>

                                  <?php
                                      
                                    //Show all the information

                                      $id = $_SESSION['id'];
                                        
                                      $query = "select * from snapshots where user = '$id'";
                                        
                                      $result = mysqli_query($GLOBALS['connection'], $query);
                                        
                                      if($result !== false)
                                      {
                                        
                                        while($row = mysqli_fetch_row($result))
                                        {
                                          $id = $row[0];
                                          
                                                                                  if($row[4] > 30)
                                                                                  {
                                                                                      $status = "<span style='color:red;font-weight:bold'>SPAMED</span>";
                                                                                  }else
                                                                                  {
                                                                                      $status = "<span style='color:green;font-weight:bold'>NOT SPAMED</span>";
                                                                                  }
                                          
                                                                                  echo "<tr>";
                                                                                  echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#$id'>Details</button></td><td>".$row[1]."</td> <td>".$row[2]."</td> <td>".$row[3]."</td> <td>".$row[4]."</td> <td>".$row[6]."</td>";
                                                                                  echo "</tr>";
                                          
                                                                                  echo '
                                                                                  
                                                                                  <!-- Modal -->
                                                                                  <div id="'.$id.'" class="modal fade" role="dialog" style="text-align:left">
                                                                                  <div class="modal-dialog">
                                                                              
                                                                                      <!-- Modal content-->
                                                                                      <div class="modal-content">
                                                                                      <div class="modal-header">
                                                                                          <center><h4 class="modal-title">Details :</h4></center>
                                                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                      </div>
                                                                                      <div class="modal-body">
                                                                                                  
                                                                                                  <p><b>Snap Original Date : </b>'.$row[2].'</p>
                                                                              
                                                                                                  <p><b>Spam Score         : </b>'.$row[4].'</p>
                                                                              
                                                                                                  <p><b>Snapshot Link      : </b><a href='.$row[6].'>'.$row[6].'</a></p>
                                                                              
                                                                                                  <p><b>Status             : </b>'.$status.'</p>
                                                                              
                                                                              
                                                                                      </div>
                                                                                      <div class="modal-footer">
                                                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                      </div>
                                                                                      </div>
                                                                              
                                                                                  </div>
                                                                                  </div>
                                                                                  
                                                                                  ';
                                        }
                                        
                                        
                                      }

                                  ?>

                              </table>

                            </div>
                        
                        </form>

                            <!-- Modal -->
                            <div id="win32" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                  <p>Some text in the modal.</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>

                            </div>
                            </div>
        		</div>
        	</div>
        </div>
        
        <script>

     // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        function loading()
        {
          document.getElementById('loading').style = "display:block";
        }

        </script>
	
	</body>
	<br>
	<br>
	<hr>
	<br>
	<br>
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