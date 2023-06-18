<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="header"></div>
        <div class="signinFrm">
            <form action="logindata.php" method="post" class="form">
                <h1 class="title">Login</h1>

                <div class="inputContainer">
                    <input type="text" class="input" id="email" name="Email" maxlength="50" required placeholder="a">
                    <label for="email" class="label">Email</label>
                </div>
                <p class="validation" id="validEmail"></p>

                <div class="inputContainer">
                    <input type="password" class="inputi" id="pass" name="Pass" maxlength="16" placeholder="a" >
                    <label for="pass" class="label" id="passlabel">Password</label>
                    <i class="material-icons" id="passicon">visibility_off</i>
                </div>
                <p class="validation" id="validPass"></p>

                <div class="link">
                    <a href="recover_psw.php">Forgot Password?</a>
                </div>
        
                <input type="submit" class="submitBtn" name="Login" value="Login" id="submit">

                <div class="link hint">
                    <a href="regis.php">Don't have an account? Sign up now.</a>
                </div>
</body>
</html>