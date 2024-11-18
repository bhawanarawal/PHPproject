<?php

function signup($data){
    $errors=array();

    echo "<pre>";
    print_r($data);

    //validate
    if(!preg_match('/^[a-zA-Z]+$/', $data['username'])){
        $errors[]="Please enter a valid username";
    }
    if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
        $errors[]="Please enter a valid email";
    }
    if(strlen(trim($data['password']))<4){
        $errors[]="Password must be atleast 4 chars long";
    }
    if($data['password']!=$data['password2']){
        $errors[]="Passwords must match";
    }

    //save
    if(count($errors)==0){
        $arr['username']=$data['username'];
        $arr['email']=$data['email'];
        $arr['password']=password_hash($data['password'],PASSWORD_DEFAULT);
        $arr['date']=date("y-m-d H:i:s");

$query ="insert into users(username,email,password,date) values
(:username,:email,:password,:date)";
database_run($query,$arr);
    }
    return $errors;
}

function database_run($query,$vars=array()){

    $string = "mysql:host=localhost;dbname=verify_db";
    $con=new PDO($string,'root','');
    if(!$con){
    return false;
}
    $stm= $con->prepare($query);
    $check= $stm->execute($vars);

    if($check){
        $data=$stm->fetchALL(PDO::FETCH_OBJ);
        if(count($data)>0){
            return $data;
        }
    }
    return false;
}
