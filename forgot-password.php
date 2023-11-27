<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Online Shopping</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
		<link type="text/css" rel="stylesheet" href="css/accountbtn.css"/>
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <style>
        #navigation {
          background: rgb(40, 37, 37);  /* fallback for old browsers */

          
        }
		#header {
    background: #000000;
}

#top-header {
    background: rgb(40, 37, 37);
}

        #footer 
		{
            background: rgb(40, 37, 37); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


          color: white;
        }
        #bottom-footer 
		{

            background: linear-gradient(to right, #348AC7, #7474BF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
          

        }
        .footer-links li a {
          color: red;
        }
        .mainn-raised {
            
            margin: -7px 0px 0px;
            border-radius: 6px;
            box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);

        }
       
        .glyphicon{
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    }
    .glyphicon-chevron-left:before{
        content:"\f053"
    }
    .glyphicon-chevron-right:before{
        content:"\f054"
    }
        

        </style>

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->

      <!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-">
								<a href="index.php" class="">
									<img src="img\typlogo.png"style="max-width: 80px; max-height: auto"; >
								</a>
							</div>
						</div>
						<!-- /LOGO -->



						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">

						

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
		
			<!-- /TOP HEADER -->
      <!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">

					<ul class="header-links pull-right">
                    <li><?php
                            
                            if(isset($_SESSION["uid"])){
                              $id=$_SESSION['uid'];
                              $sql = "SELECT * FROM user_info where user_id=$id";//WHERE user_email = '$email' AND password = '$password'
                              $run_query = mysqli_query($con,$sql);
                              $count = mysqli_num_rows($run_query);
                              $row = mysqli_fetch_assoc($run_query);
                                
                                echo '
                               <div class="dropdownn">
                                  <a href="" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> HI '.$row["first_name"].'</a>
                                  <div class="dropdownn-content">
                                    <a href="myprofile.php" ><i class="fa fa-user-circle" aria-hidden="true" ></i> My Profile</a>
                                    <a href="logout.php"  ><i class="fa fa-sign-in" aria-hidden="true"></i> Log out</a>
                                    
                                  </div>
                                </div>';
                            }
                                ?>
                               
                                </li>				
             </ul>
             
           </div>
         </div>
<body>
  <p> </p>
    <div class="container p-3 border border-5 rounded-3" style="width: 35%;">
        <h1 class="display-6 text-center p-2 bg-light">Password Reset</h1>
        <form action="forgot_password_process.php" method="post">
            <div class="row mb-3 justify-content-md-center">
                <div class="col-10">
                    <input type="email" name="user_email" placeholder="Email address" class="form-control">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary" name="reset">Reset</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php



include "footer.php";
?>