<!DOCTYPE html>
<html>
<style>

body {font-family: Arial, Helvetica, sans-serif;
background-color: #a8babd;}

* {box-sizing: border-box}

.container {
	background-color: #c1e2e8;
	border-radius: 10px;
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 1500px;
	max-width: 100%;
	min-height: 150px;
	margin: 0 auto; /* Center the container horizontally */
}


form {
	background-color:grey;
	display: flex;
	flex-direction: column; /* Change to column layout for input fields */
	align-items: center; /* Center items horizontally */
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 60%;
}

hr {
  border: 1px solid black;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #658576;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Float cancel and signup buttons and add an equal width */
.signupbtn {
  float: right;
  width: 20%;
}

.backbtn{
  float: left;
  width: 20%;
}


/* Add padding to container elements */
.container {
  padding: 50px;
  width: 1000px;
}

/* Center the "Sign Up" text */
h1 {
  text-align: center;
}

p {
  text-align: center;
}

</style>
<body>

<div class="container">
  <h1>Sign Up</h1>
  <p>Please fill in this form to create an account.</p>
  <hr>
  <div class="container" id="container">
    <div class="form-container sign-up-container">
      <input type="text" placeholder="Name" id="name" />
      <input type="text" placeholder="Contact Number" id="contact" />
      <input type="email" placeholder="Email" id="email" />
      <input type="password" placeholder="Password" id="password" />
      <input type="password" placeholder="Confirm Password" id="confirmPassword" />
    </div>
  </div>
  <div class="clearfix">

      <button type="submit" class="signupbtn" onclick="validateForm()">Sign Up</button>
      <button type="button" class="backbtn" onclick="goBack()">Back</button>

  </div>

</div>

<script>
function validateForm() {
  const name = document.getElementById("name").value;
  const contact = document.getElementById("contact").value;
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirmPassword").value;
  const confirmPasswordError = document.getElementById("confirmPasswordError");


  if (name === "" || contact === "" || email === "" || password === "" || confirmPassword === "") {
    alert("Please fill in all fields.");
    return false;
  }

  if (password !== confirmPassword) {
    confirmPasswordError.textContent = "Passwords do not match";
    return false;
  } else {
    confirmPasswordError.textContent = ""; // 清除错误消息
  }

  window.location.href = "login.php";


}
function goBack() {
  window.history.back(); 
}
</script>

</body>
</html>
