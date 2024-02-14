
<!DOCTYPE html>

<html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<head>
  <title> Forgot Password </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>


<body>
  <div class="container mt-5">
    <div class="row justify-content-center mt-5">
      <div class="col-sm-4">
        <form action="forgot_process.php" method="POST" class="login_form">
          <div class="form-group text-center">
            <?php if (isset($_GET['err']) && $_GET['err'] === 'invalidemail') {
              echo '<p class="errmsg">Invalid email address. Please provide a valid email.</p>';
            } ?>
            <label class="label_txt">Username or Email </label>
            <input type="text" name="email" class="form-control" required="">
            <br>
            <button type="submit" name="subforgot" class="btn btn-primary btn-group-lg form_btn" id="sendLinkBtn">Send Link</button>
          </div>
          <p class="text-center">Don't have an account? or Have an account?<a href="Login.php">Login/Signup</a></p>
        </form>
      </div>
    </div>
  </div>

</body>

</html>
<?php
    if (isset($_GET['success']) && $_GET['success'] == '1') {
        echo '<script>alert("Email sent successfully. Please check your email.");</script>';
    } elseif (isset($_GET['error']) && $_GET['error'] == '1') {
        echo '<script>alert("Email not found.");</script>';
    }
  ?>
