<?php


require "functions.php";
check_login();



?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
    <?php include('header.php');?>
    <h1>profile</h1>


    <?php if(check_login(false)):?>
        Hi, <?=$_SESSION['USER']->username?>
    <br><br>
    <?php if(!check_verified()):?>
        <a href="verify.php">
            <button >Verify Profile</button>
        </a>
        <?php endif;?>
        <?php endif;?>

</body>
</html>