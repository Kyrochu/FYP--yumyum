<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="login.css">
    <style>

        .right-panel-active .overlay-left {
            transform: translateX(-50%);
        }
    
        .right-panel-active .overlay-right {
            transform: translateX(0); 
        }
        
    </style>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#">
                <h1>Sign Up</h1>
            
           
                <input type="text" placeholder="Name" />
                <input type="text" placeholder="Contact Number" />
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <input type="password" placeholder="Comfirm Password" />
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#">
                <h1>Sign in</h1>
              
       
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <div class="forgot-line">
                    <a href="forgot-password.php">Forgot your password?</a>
                </div>
                
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay" style="background-image: url('chef.jpg');"></div>
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    
    
</body>
</html>

<script>

        document.addEventListener("DOMContentLoaded", function () {
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');
        const passwordInput = document.getElementById('passwordInput');
        const eyeIcon = document.getElementById('eyeIcon');
        
        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });

        passwordInput.addEventListener('focus', () => {
            if (passwordInput.value.length > 0) {
                eyeIcon.style.opacity = '1';
                eyeIcon.style.pointerEvents = 'auto';
            }
        });

        passwordInput.addEventListener('blur', () => {
            eyeIcon.style.opacity = '0';
            eyeIcon.style.pointerEvents = 'none';
        });

        eyeIcon.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = '<i class="fas fa-eye"></i>'; // Update this line
            }
        });
    });
</script>
