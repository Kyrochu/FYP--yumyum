function generateToken() 
{
    var email = document.getElementById("email").value;

    // Implement your logic to send the email and generate a token on the server
    // For simplicity, we assume the server sends a fixed token "123456"
    
    document.getElementById("emailForm").style.display = "none";
    document.getElementById("verifyForm").style.display = "block";
}

function verifyToken() 
{
    var email = document.getElementById("email").value;
    var token = document.getElementById("token").value;

    // Send the token to the server for verification
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "verify.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            var response = JSON.parse(xhr.responseText);
            document.getElementById("message").innerText = response.message;
            if (response.success) {
                // Implement your logic for successful verification
            }
        }
    };
    xhr.send("email=" + email + "&token=" + token);
}
