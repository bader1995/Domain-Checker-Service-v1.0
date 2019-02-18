<?php
@session_start();
?>
<html>

	<head>
	
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        
        <style>
        @import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css);
        @import url("http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700");
        @import url("http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600|Roboto Mono");
        @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css");
        @font-face {
          font-family: 'Dosis';
          font-style: normal;
          font-weight: 300;
          src: local('Dosis Light'), local('Dosis-Light'), url(http://fonts.gstatic.com/l/font?kit=RoNoOKoxvxVq4Mi9I4xIReCW9eLPAnScftSvRB4WBxg&skey=a88ea9d907460694) format('woff2');
        }
        @font-face {
          font-family: 'Dosis';
          font-style: normal;
          font-weight: 500;
          src: local('Dosis Medium'), local('Dosis-Medium'), url(http://fonts.gstatic.com/l/font?kit=Z1ETVwepOmEGkbaFPefd_-CW9eLPAnScftSvRB4WBxg&skey=21884fc543bb1165) format('woff2');
        }
        body {
          
            font-family: 'Source Sans Pro', 'Helvetica Neue', Arial, sans-serif,  Open Sans;
            font-size: 14px;
            line-height: 1.42857;
            height: 350px;
            padding: 0;
            margin: 0;
        }
        
        .faqHeader {
            font-size: 27px;
            margin: 20px;
        }
        
        .panel-heading [data-toggle="collapse"]:after {
            font-family: 'FontAwesome';
            content: "\f078"; /* "play" icon */
            float: right;
            color: #F58723;
            font-size: 18px;
            line-height: 22px;
            /* rotate "play" icon from > (right arrow) to down arrow */
        /*    -webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
            -ms-transform: rotate(-90deg);
            -o-transform: rotate(-90deg);
            transform: rotate(-90deg); */
        }
        
        .panel-heading [data-toggle="collapse"].collapsed:after {
            /* rotate "play" icon from > (right arrow) to ^ (up arrow) */
        /*    -webkit-transform: rotate(90deg);
            -moz-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            -o-transform: rotate(90deg);
            transform: rotate(90deg); */
            color: #454444;
        }
        
        .faq_num {
            background: #007715;
            text-align: center;
            width: 50px;
            padding: 10px 0px;
            color: #FFFFFF;
            font-size: 32px;
            float: left;
        }
        .faq_question{
        margin-top: 0px;    
        }
        
        
        </style>
	
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
                  <li class="active"><a href="faqs.php">FAQs</a></li>
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
        <br />
        <br />
        <br />
    
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">�</span><span class="sr-only">Close</span></button>
            This section contains a wealth of information, related to <strong>PrepBootstrap</strong> and its store. If you cannot find an answer to your question, 
            make sure to contact us. 
        </div>
    
        <br />
        <div class="row site_content">
        
            <div class="col-md-1 faq_num">1</div>
            <div class="col-md-10 faq">
                <h3 class="faq_question">How do I apply?</h3>
                 <div class="faq_answer">
                 <p>
                     You can apply online to PTCL after searching for openings/vacancies relevant to your area of interest. 
                     However, if there is no opening/vacancy, currently, to your area of interest, you can still leave your information with us by clicking on My Profile.
                 </p>
                 </div> 
            </div>
            <div class="clearfix"></div>
           	
           	<div class="col-md-1 faq_num">2</div>
            <div class="col-md-10 faq">
                <h3 class="faq_question">I cannot find a suitable job on your website. Can I still apply?</h3>
                 <div class="faq_answer">
                 <p>Yes. You can update your profile in the My Profile section and specify you area of interest(s) according to your desired role. Once you save your profile, your information will be saved into our Talent Pool and a member of our Talent Acquisition team will contact you with relevant opportunities as they arise.
                 </p>
                 </div> 
            </div>
            <div class="clearfix"></div>
            
            <div class="col-md-1 faq_num">3</div>
            <div class="col-md-10 faq">
                <h3 class="faq_question">If I submit an application or submit my details, will PTCL keep me on file?</h3>
                 <div class="faq_answer">
                 <p>Yes. After you apply on our website at www.ptcl.com.pk/careers or create your profile, your information will be saved into our Talent Pool.
                 </p>
                 </div> 
            </div>
            <div class="clearfix"></div>
        
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