<?php
$correct_username = "admin";
$correct_password = "123";

$message = "";

if (isset($_POST["login"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == $correct_username && $password == $correct_password)
    {
        $message = "Login successful! Welcome! ". $username;
    } else {
        $message = "Invalid username or password. ";
    }
}

?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Simple PHP Login </title>
<body>

<h2>Login Form </h2>

<form method= "POST">
    <label> Username:</label><br>
    <input type = "text" name= "username" required><br><br>

    <label>Password:</label><br>
    <input type = "password" name= "password" required><br><br>

    <input type="submit" name="login" value="Login">
</form>

<p><?php echo $message; ?></p>

</body>
</html>