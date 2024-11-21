<?php
 session_start();
 if(!isset ($_SESSION['username'])){
    header('location:login.php');
 }
?>
<h1>Welcome to Dashboard</h1>
<a href="logout.php">Logout</a>
