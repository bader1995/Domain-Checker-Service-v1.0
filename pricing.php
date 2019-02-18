<?php 
@session_start();
?>
<html>

	<head>
	
		     <style>
     
             /*=============================================================
            Authour URL: www.designbootstrap.com
            
            http://www.designbootstrap.com/
        
            License: MIT     
        ========================================================  */
        
        /*============================================================
        BACKGROUND COLORS
        ============================================================*/
        .db-bk-color-one {
            background-color: #f55039;
        }
        
        .db-bk-color-two {
            background-color: #46A6F7;
        }
        
        .db-bk-color-three {
            background-color: #47887E;
        }
        
        .db-bk-color-six {
            background-color: #F59B24;
        }
        /*============================================================
        PRICING STYLES
        ==========================================================*/
        .db-padding-btm {
            padding-bottom: 50px;
        }
        .db-button-color-square {
            color: #fff;
            background-color: rgba(0, 0, 0, 0.50);
            border: none;
            border-radius: 0px;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
        }
        
            .db-button-color-square:hover {
                color: #fff;
                background-color: rgba(0, 0, 0, 0.50);
                border: none;
            }
        
        
        .db-pricing-eleven {
            margin-bottom: 30px;
            margin-top: 50px;
            text-align: center;
            box-shadow: 0 0 5px rgba(0, 0, 0, .5);
            color: #fff;
            line-height: 30px;
        }
        
            .db-pricing-eleven ul {
                list-style: none;
                margin: 0;
                text-align: center;
                padding-left: 0px;
            }
        
                .db-pricing-eleven ul li {
                    padding-top: 20px;
                    padding-bottom: 20px;
                    cursor: pointer;
                }
        
                    .db-pricing-eleven ul li i {
                        margin-right: 5px;
                    }
        
        
            .db-pricing-eleven .price {
                background-color: rgba(0, 0, 0, 0.5);
                padding: 40px 20px 20px 20px;
                font-size: 60px;
                font-weight: 900;
                color: #FFFFFF;
            }
        
                .db-pricing-eleven .price small {
                    color: #B8B8B8;
                    display: block;
                    font-size: 12px;
                    margin-top: 22px;
                }
        
            .db-pricing-eleven .type {
                background-color: #52E89E;
                padding: 50px 20px;
                font-weight: 900;
                text-transform: uppercase;
                font-size: 30px;
            }
        
            .db-pricing-eleven .pricing-footer {
                padding: 20px;
            }
        
        .db-attached > .col-lg-4,
        .db-attached > .col-lg-3,
        .db-attached > .col-md-4,
        .db-attached > .col-md-3,
        .db-attached > .col-sm-4,
        .db-attached > .col-sm-3 {
            padding-left: 0;
            padding-right: 0;
        }
        
        .db-pricing-eleven.popular {
            margin-top: 10px;
        }
        
            .db-pricing-eleven.popular .price {
                padding-top: 80px;
            }
     
     </style>
     
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <script src="https://www.paypalobjects.com/api/checkout.js"></script>
	
    
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
                  <a class="navbar-brand" href="#">Domain Checker Tool</a>
               </div>
            
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="contact.php">Contact</a></li>
                  <li><a href="faqs.php">FAQs</a></li>
                  <li class="active"><a href="pricing.php">Pricing</a></li>
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
            
            <br>
            
            	<div class="jumbotron container">
            		
            		<center><h1>Choose what suits you.</h1></center>
            	
            	</div>
            
            <br>
	
	
		<div class="container">
	
        	<div class="row db-padding-btm db-attached">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="db-wrapper">
                            <div class="db-pricing-eleven db-bk-color-one">
                                <div class="price">
                                    <sup>$</sup>30
                                        
                                </div>
                                <div class="type">
                                    SMALL PLAN
                                </div>
                                <ul>
        
                                    <li><i class="glyphicon glyphicon-cog"></i>100 Domain verification </li>
                                    <li><i class="glyphicon glyphicon-cog"></i>100 domain search </li>
                                    <li><i class="glyphicon glyphicon-time"></i>24/7 Support</li>
                                </ul>
                                <div class="pricing-footer">
        
                                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="34ZYA64AEV228">
                                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                         <div class="db-wrapper">
                        <div class="db-pricing-eleven db-bk-color-two popular">
                            <div class="price">
                                <sup>$</sup>99
                                        
                            </div>
                            <div class="type">
                                MEDIUM PLAN
                            </div>
                            <ul>
        
                                <li><i class="glyphicon glyphicon-cog"></i>500 Domain verification </li>
                                <li><i class="glyphicon glyphicon-cog"></i>500 Domain search </li>
                                <li><i class="glyphicon glyphicon-time"></i>24/7 Support</li>
                            </ul>
                            <div class="pricing-footer">
        
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="SX7JD7VSJX826">
                            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                            </form>


                            </div>
                        </div>
                             </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                         <div class="db-wrapper">
                        <div class="db-pricing-eleven db-bk-color-three">
                            <div class="price">
                                <sup>$</sup>200+
                                        
                            </div>
                            <div class="type">
                                ADVANCE PLAN
                            </div>
                            <ul>
        
                                <li><i class="glyphicon glyphicon-cog"></i>1000+ Domain verification </li>
                                <li><i class="glyphicon glyphicon-cog"></i>1000+ Domain search </li>
                                <li><i class="glyphicon glyphicon-time"></i>24/7 Support</li>
                            </ul>
                            <div class="pricing-footer">
        
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="HZSE73TT7T2NU">
                            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                            </form>
                                
                            </div>


                            <!-- Paypal payment button -->

                            


                        </div>
                             </div>
        </div>
        
        </div>
	
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