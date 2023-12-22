<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <script src="script.js" defer></script>
</head>
<body>
    <h1>Email Verification</h1>
    <form id="emailForm">
        <label for="email">Enter your email:</label>
        <input type="email" id="email" name="email" required>
        <button type="button" onclick="generateToken()">Generate Token</button>
    </form>

    <form id="verifyForm" style="display: none;">
        <label for="token">Enter the token:</label>
        <input type="text" id="token" name="token" required>
        <button type="button" onclick="verifyToken()">Verify Token</button>
    </form>

    <p id="message"></p>
</body>
</html>