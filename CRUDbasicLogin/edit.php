<?php
$conn = new mysqli("localhost", "root", "", "logindb");

if(isset($_POST['update'])){
    $userid = $_POST['userid'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $contact_number = $_POST['contact_number'];

    $conn->query("UPDATE users SET email='$email', name='$name', contact_number='$contact_number' WHERE userid=$userid");

    header("Location: registered.php");
    exit;
}

$userid = $_GET['userid'];
$user = $conn->query("SELECT email, name, contact_number FROM users WHERE userid=$userid")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="editdesign.css">
    <link rel="stylesheet" href="theme.css">
</head>
<body>

<div class="edit-container">
    <form method="post">
        <input type="hidden" name="userid" value="<?= $userid ?>">
        
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?= $user['email'] ?>">
        </div>

        <div class="input-group">
            <label>Name</label>
            <input type="text" name="name" value="<?= $user['name'] ?>">
        </div>

        <div class="input-group">
            <label>Contact Number</label>
            <input type="text" name="contact_number" value="<?= $user['contact_number'] ?>">
        </div>

        <div class="button-group">
            <input type="submit" name="update" value="Update" class="btn-update">
            <a href="registered.php" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>