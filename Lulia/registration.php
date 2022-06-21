<?php

session_start();
header('location:index.php');

$con = mysqli_connect('localhost','root','123456');

mysqli_select_db($con, 'userregistration');

$name = $_POST['user'];
$pass = $_POST['password'];
$email = $_POST['email'];
$number = $_POST['number'];

$s = " select * from  usertable where name = '$name'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num ==1){
    echo" Username Already Taken";
}else{
    $reg= "insert into usertable (name , password , number , email) values ('$name' , '$pass' , '$number' , '$email')";
    mysqli_query($con, $reg);
    echo" Registration Successful";
}



?>