<?php
$conn = new mysqli("localhost", "root", "", "logindb");

// Delete user directly
$userid = $_GET['userid'];
$conn->query("DELETE FROM users WHERE userid = $userid");

header("Location: registered.php");
exit;
?>