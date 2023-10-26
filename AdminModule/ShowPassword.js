function togglePassword() 
{
    const passwordField = document.getElementById("password");    // Find HTML element with the ID
    const showPassword = document.getElementById("show-pswd"); // Find HTML element with the ID ( Use to show password )
    
    if (passwordField.type == "password")  // Check whether it is a hidden password
    {
        passwordField.type = "text"; // Change the password to visible
        showPassword.classList.remove("fa-eye");
        showPassword.classList.add("fa-eye-slash");
    } 
    else 
    {
        passwordField.type = "password";
        showPassword.classList.remove("fa-eye-slash");
        showPassword.classList.add("fa-eye");
    }
}   