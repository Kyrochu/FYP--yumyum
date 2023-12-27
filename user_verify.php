<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>                                     
<body>
    
    <form method="post" action="php/verify_token.php">
        <label for="entered_code">Verification Code</label>
        <input type="text" name="entered_code" id="entered_code" required>
        <button type="submit">Verify</button>
    </form>

</body>
</html>
