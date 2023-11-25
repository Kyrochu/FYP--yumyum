<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/popup.css">


</head>
<body>

    <h1 style="color: orange;">test button for pop</h1>

    <button class="btn btn-primary " onclick="pop()">pop up</button>

    <div id="overlay" class="overlay"></div>
    <div id="popup" class="popup">
        <textarea name="text" id="" cols="20"  placeholder="your name"></textarea>
        <textarea name="pass" id="" cols="20"  placeholder="your password"></textarea>
        <textarea name="text" id="" cols="20"  placeholder="your name"></textarea>  

        <div class="checkbox-group">
            <input type="checkbox" name="checkboxGroup" value="option1"> Option 1
            <br>
            <input type="checkbox" name="checkboxGroup" value="option2"> Option 2
            <br>
            <input type="checkbox" name="checkboxGroup" value="option3"> Option 3
        </div>
        <button type="button" onclick="submitForm()">Submit</button>
        <button type="button" onclick="closePopup()">close</button>
    </div>

    <script>
        function pop() {
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('popup').style.display = 'block';

            setTimeout(function () {
                document.getElementById('popup').classList.add('visible');
            }, 10);
        }

        function closePopup() {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('popup').classList.remove('visible');

            setTimeout(function () {
                document.getElementById('popup').style.display = 'none';
            }, 500);
        }

        function submitForm() 
        {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('popup').classList.remove('visible');

            setTimeout(function () {
                document.getElementById('popup').style.display = 'none';
            }, 500);

            // Get the selected checkbox values
            var checkboxes = document.querySelectorAll('input[name="checkboxGroup"]:checked');
            var checkboxValues = Array.from(checkboxes).map(checkbox => checkbox.value);

            // Get the values from textareas
            var nameValue = document.querySelector('textarea[name="text"]').value;
            var passwordValue = document.querySelector('textarea[name="pass"]').value;

            // Display the values (you can do whatever you want with these values)
            console.log('Checkbox Values:', checkboxValues);
            console.log('Name Value:', nameValue);
            console.log('Password Value:', passwordValue);
        }
    </script>

    <script src="js/main.js"></script>
</body>
</html>
