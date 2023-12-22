function random_code() 
{
    var random_string = "";
    var characters = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";

    for(var i = 0; i < 6; i++) {
        random_string += characters.charAt(Math.floor(Math.random() * characters.length));
    }

    console.log(random_string);
    return random_code;

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
