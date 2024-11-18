<?php

require "functions.php";

$errors= array();
if($_SERVER['REQUEST_METHOD']=="POST"){

    $errors= signup($_POST);
    if(count($errors)==0)
    {
        header("Location: login.php");
        die;
    }

}








?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    <h1>Signup</h1>

    <?php include('header.php')?>


    <div>
        <div>
            <?php if(count($errors)>0):?>
                <?php foreach($errors as $error):?>
                <?= $error?> <br>
                <?php endforeach;?>
                <?php endif;?>
        </div>
        <form method="post">
            <input type="text" name="username" placeholder="Username"><br>
            <input type="text" name="email" placeholder="Email"><br>
            <input type="text" name="password" placeholder="Password"><br>
            <input type="text" name="password2" placeholder="Retype password"><br>
            <br>
            <input type="submit" value="Signup">

        </form>
    </div>

</body>
</html>