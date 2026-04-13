<?php
session_start();
include "phpSeparate.php";
$message = "";

$admin_user = "admin";
$admin_pass = "admin";


if (isset($_POST['login'])) {  

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == $admin_user && $password == $admin_pass) {
        $_SESSION['email'] = $email; // store admin email
        $_SESSION['name'] = "Admin"; // optional
        header("location: home.php");
        exit();
    }


    //SQL query
    $sql = "SELECT * FROM users
         WHERE email= '$email'
         AND password= '$password'";
    
    $result = mysqli_query($conn, $sql);

    //Check if user exist

    if (mysqli_num_rows($result)== 1) {
        $message = "Login successful";
    } else {
        $message = "Invalid username or password.";
    }

    if(mysqli_num_rows($result) == 1) {
        $fetch = mysqli_fetch_array($result);
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $fetch['name'];
        header("location: userhome.php");
        exit();
    }
}

if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact_number = $_POST['contact_number'];
    $confirm_password = $_POST['confirm_password'];

    // confirm password
    if ($password !== $confirm_password) {
        $message = "Passwords do not match!";
    } else {
        // Insert into database
        $sql = "INSERT INTO users (name, email, password, contact_number)
                VALUES ('$name', '$email', '$password', '$contact_number')";

        if (mysqli_query($conn, $sql)) {
            $message = "Registration successful!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Login/Register</title>

    <link rel="stylesheet" href="theme.css">
    <link rel="stylesheet" href="design.css">

</head>

<body>

<div class="main-container">

    <div id="loginForm">
    <form method="POST">
        <input type="text" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="login">Login</button>
        <!-- test -->  
    </form>

    <p>No account? <a href="#" onclick="showRegister()">Register</a></p>
    </div>

    <div id="registerForm" style="display:none;">
    <form method="POST">
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="text" name="contact_number" placeholder="Contact Number"><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>

        <button type="submit" name="register">Register</button>

    </form>

    <p>
    Already have an account? <a href="#" onclick="showLogin()">Login</a>
    </p>
    </div>

</div>

<?php if (!empty($message)) : ?>
    <div id="customMessageOverlay" style="
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    ">
        <div id="customMessageBox" style="
            background: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            max-width: 90%;
            font-size: 16px;
        ">
            <div style="margin-bottom: 20px;"><?php echo htmlspecialchars($message); ?></div>
            <button id="customMessageOk" style="
                padding: 8px 20px;
                border: none;
                background: #007BFF;
                color: white;
                border-radius: 5px;
                cursor: pointer;
                font-size: 14px;
            ">OK</button>
        </div>
    </div>

    <script>
        const overlay = document.getElementById('customMessageOverlay');
        const okButton = document.getElementById('customMessageOk');

        okButton.addEventListener('click', () => {
            overlay.remove(); // remove the message when OK is clicked
        });
    </script>
<?php endif; ?>

<script>
function showRegister() {
    document.getElementById("loginForm").style.display = "none";
    document.getElementById("registerForm").style.display = "block";
}

function showLogin() {
    document.getElementById("registerForm").style.display = "none";
    document.getElementById("loginForm").style.display = "block";
}
</script>


</body>
</html>
