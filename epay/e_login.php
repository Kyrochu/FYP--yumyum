<?php include ("../connection_sql.php") ?>



<!DOCTYPE html>
<html>
    <head>
        <title>LogIn</title>
        <link rel="stylesheet" href="../css/elog.css">
        <style>
            #place
            {
                margin-left: 8px;
            }
          
        </style>
        
    </head>
    <body>
        <header> 
    
        
            <!-- <h1 class="Welcome" style="background-color:dimgrey;"> <span class="W">W</span>elcome to <span class="F">F</span>antastos <span class="H">H</span>otel </h1> -->
        
                <div class="navbar" style="background-color:black;padding-bottom:30px;"> 
                    
                    <img src="../img/daypay logo.png" alt="No Image" >
                    
                    <ul style="margin-left:700px;">
                        <li> <a href="Homepage.php"> Home </a> </li>

                    </ul>
                    
                </div>
        
        </header>

        
        <div class="form_page">
            <div class="btn_anime">
                <div id="btn" ></div>
                <button type="button" class="LG_RE_btn"  onclick="login()" style="color: rgb(255, 252, 255);">Log In</button>
                <button type="button" class="LG_RE_btn" id="place" onclick="register()" style="color: rgb(255, 252, 255);">Register</button>
            </div>
            
            <!-- log side -->
            <form id="log" class="input_group" action="loginphp.php" method="POST" >
                <br><br><br><br><br>    
                <input type="text" class="input_place" name="user_email" placeholder="User Email" required>
                
                <input type="password" class="input_place" name="user_password" placeholder="Password" required>

                <button type="submit" class="submit_btn" name="logbtn" style="color: rgb(255, 252, 255);">Log in</button>
            </form>

            

            <!-- register side -->
            <form id="reg" class="input_group" action="e_register.php" method="POST">
            
                <span id="nameError"  ></span>     
                <input type="text" class="input_place" name="name" placeholder="Name" required >
                <span id="contactNumberFormat"></span>
                <span id="contactNumberError"></span>
                <input type="text" class="input_place" name="contact" placeholder="Contact Number " required >
                <input type="email" class="input_place" name="email" placeholder="Email" required >
                <input type="password" class="input_place" name="new_password" placeholder="Create Password" required>
                <input type="password" class="input_place" name="com_password" placeholder="Comfirm Password" required>
                
                <button type="submit" class="submit_btn" name="regbtn" style="color: rgb(255, 252, 255);">Register</button>
                
            </form>
        </div>

        
        <script>
            var x = document.getElementById("log");
            var y = document.getElementById("reg");
            var z = document.getElementById("btn");


            function login()
            {
                x.style.left = "50px";
                y.style.left = "450px";
                z.style.left = "0px";
            }

            function register()
            {
                x.style.left = "-400px";
                y.style.left = "50px";
                z.style.left = "110px";
            }
            const nameInput = document.querySelector('input[name="name"]');
            const nameError = document.getElementById('nameError');

            nameInput.addEventListener('input', function () {
                let name = this.value.trim(); // Trim leading and trailing whitespaces

                // Check if the input contains only letters
                if (/^[a-zA-Z]+$/.test(name)) {
                    if (name === '') {
                        nameError.textContent = 'Please enter a valid name.';
                        nameError.style.color = 'red';
                    } else {
                        // Check if the first letter is uppercase
                        const firstLetter = name.charAt(0);
                        if (firstLetter !== firstLetter.toUpperCase()) {
                            nameError.textContent = 'First letter must be uppercase.';
                            nameError.style.color = 'red';
                        } else {
                            // Clear the error message if the input is valid
                            nameError.textContent = '';
                            nameError.style.color = '';
                        }
                    }
                } else {
                    nameError.textContent = 'Only character are allowed.';
                    nameError.style.color = 'red';
                }
            });

        const contactNumberInput = document.querySelector('input[name="contact_number"]');
        const contactNumberError = document.getElementById('contactNumberError');
        const contactNumberFormat = document.getElementById('contactNumberFormat');
        const contactNumberRegex = /^[0-9\-]+$/; 

            contactNumberInput.addEventListener('input', function () {
            let contactNumber = this.value;

            
            contactNumberInput.addEventListener('input', function () {
            let contactNumber = this.value;

            
            contactNumber = contactNumber.replace(/[^\d\-]/g, '');
            contactNumber = contactNumber.replace(/[^\d\-]|-(?=[^-]*-)/g, '');

            if (contactNumber === '' || contactNumber === '-') {
                contactNumberError.textContent = 'Please enter a valid contact number.';
                contactNumberError.style.color = 'red';
                contactNumberFormat.textContent = '';
            } else {
                const formattedContactNumber = contactNumber.replace(/(\d{3})-?(\d+)/, '$1-$2');

                if (formattedContactNumber !== this.value) {
                    // 如果格式不匹配，显示提示信息
                    contactNumberError.textContent = 'Contact number should be in the format: xxx-xxxxxxx';
                    contactNumberError.style.color = 'red';
                    contactNumberFormat.textContent = '';
                } else {
                    // 格式匹配时清空错误信息
                    contactNumberError.textContent = '';
                    contactNumberError.style.color = '';
                }
            }

            // 更新输入框的值
            this.value = contactNumber;
            });
        });
    
        </script>

    </body>
</html>
