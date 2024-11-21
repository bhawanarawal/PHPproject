<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require 'Database.php';
$db=new Database();
$conn=$db->getConnection();

// var_dump($conn);
    

if ($_POST){
    $username=$_POST['username'];
    $password=md5($_POST['password']); //encrypt the password using md5

    
    $result=$conn->prepare("select * from users where username = :username and password= :pass");
    $result->bindParam(':username',$username);
    $result->bindParam(':pass',$password);
    $result->execute();

    $data =$result->fetch(PDO::FETCH_ASSOC);

    if ($result->rowCount()>0){
        if($data['role']=='admin'){
            $_SESSION ['username']=$username;
            $_SESSION['is_admin']=true;
            header('location:/admin/dashboard.php');
        }else{
            $_SESSION['username']=$username;
            $_SESSION['is_user']=true;
            header("Location:dashboard.php");
        }
        
    }else{
        echo "invalid username or password";
    }
    exit;

}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login page</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="main">
            <form action="" method="post">
                <ul>
                    <li>username:<input type="text" name="username"></li>
                    <li>password:<input type="text" name="password"> </li>
                    <li><input type="submit" value="login"></li>
                </ul>
            </form>
        </div>
        
    </body>
</html>