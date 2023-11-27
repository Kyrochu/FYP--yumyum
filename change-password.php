<?php
session_start();
include "data_connection.php";
  ?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="style.css">
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
<div class="row justify-content-center">
  <div class="col-sm-10">
  </div>
  <div class="col-sm-6">
    <form action="" method="POST">
      <div class="login_form">
      <?php 
if(isset($_POST['change_password'])){
    $currentPassword=$_POST['currentPassword']; 
    $password=$_POST['password'];  
    $passwordConfirm=$_POST['passwordConfirm']; 
    $userid=$_SESSION['uid'];
    $sql="SELECT password from user_info where user_id=$userid";
  
    $res=mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($res);
          
    if (isset($_POST['change_password'])) {
      $currentPassword = $_POST['currentPassword'];
      $password = $_POST['password'];
      $passwordConfirm = $_POST['passwordConfirm'];
      $userid = $_SESSION['uid'];
      $sql = "SELECT password from user_info where user_id = $userid";
    
      $res = mysqli_query($con, $sql);
      $row = mysqli_fetch_assoc($res);
            
      if ($currentPassword == $row['password']) {
          if ($currentPassword == $password) {
              $error[] = '<span style="color: red;"><strong>Current Password and New Password cannot be the same.</strong></span>';
          }
          elseif ($passwordConfirm == '') {
              $error[] = '<span style="color: red;"><strong>Please confirm the password.</strong></span>';
          }
          elseif ($password != $passwordConfirm) {
              $error[] = '<span style="color: red;"><strong>New Password and Confirm Password should match.</strong></span>';
          }
          elseif (strlen($password) < 15) {
              $error[] = '<span style="color: red;"><strong>Password is weak. Password should be at least 15 characters long.</strong></span>';
          }
          elseif (!preg_match('/[A-Z]/', $password)) {
              $error[] = '<span style="color: red;"><strong>The password must contain at least one uppercase letter.</strong></span>';
          }
          elseif (!preg_match('/[!@#$%^&*(),.?\":{}|<>]/', $password)) {
              $error[] = '<span style="color: red;"><strong>The password must contain at least one symbol.</strong></span>';
          }
          
          if (!isset($error)) {
              $options = array("cost" => 4);
                    
              $result = mysqli_query($con, "UPDATE user_info SET password='$password' WHERE user_id = $userid");
              if ($result) {
                  ?> 
                  <script>
                      window.location.href = "myprofile.php";
                  </script>
                  <?php 
              }
              else {
                  $error[] = '<span style="color: red;"><strong>Something went wrong.</strong></span>';
              }
          }
      } 
      else {
          $error[] = '<span style="color: red;"><strong>Current password does not match.</strong></span>'; 
      }   
  }
  
  if (isset($error)) { 
      foreach ($error as $err) { 
          echo '<p class="errmsg">'.$err.'</p>'; 
      }
  }
}
  
        ?> 
        <form method="post" enctype='multipart/form-data' action="">
          <div class="form-group">
            <div class="row justify-content-center">
              <div class="col-10">
                <label>Current Password:</label>
                <input type="password" name="currentPassword" class="form-control">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row justify-content-center">
              <div class="col-10">
                <label>New Password:</label>
                <input type="password" name="password" class="form-control">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row justify-content-center">
              <div class="col-10">
                <label>Confirm New Password:</label>
                <input type="password" name="passwordConfirm" class="form-control">
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-10">
              <button class="btn btn-success" name="change_password">Change Password</button>
            </div>
          </div>
        </form>
      </div>
    </form>
  </div>
</div>


 
  


</body>
</html>

<?php


include "footer.php";
?>
		