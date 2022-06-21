<?php

session_start();

$con = mysqli_connect('localhost','root','123456');

mysqli_select_db($con, 'userregistration');

$name = @$_POST['user'];
$pass = @$_POST['password'];

$s = " select * FROM  usertable WHERE name = '$name' AND password = '$pass'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

    if(empty($username) || empty($password)){

        echo '<script>alert("Please fill in all the data");</script>';

    }
    else{

        header('location:login.php');
    
    }
    if($num == 1){

        setcookie("user" , $user , time()+60*60*24);
        setcookie("login" , 1 , time()+60*60*24);
        echo '<script>alert("correct login");</script>';
        header('location:checkout.php');

    }






?>