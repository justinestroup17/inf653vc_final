<?php
if(isset($login_message)) {
    echo($login_message);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy Admin</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
</head>
<body>
<h1>Zippy's Autos<br/>Login Page</h1>
<form action="." method="POST" class="register_form">
    <input type="hidden" name="action" value="login">
    <label for="username">Username: </label>
    <input type="text" id="username" name="username" maxlength="50" required><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" maxlength="50" required><br>
    <input type="submit" value="Login" class="button blue">
</form>   
</body>
</html>