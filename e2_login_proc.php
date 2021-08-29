<?php

session_start();

include('database/database_connection.php');

$email=$_POST['email'];





//echo $email;



$query="SELECT * FROM user_t WHERE user_loginName='".$email."'";

//echo $query;

$result=mysqli_query($connection,$query);



$row=mysqli_fetch_row($result);

if($row){

    $_SESSION['user']=$row;

    

    header('location:e2_messages.php');

}

else{

    header('location:e2_login.php?msg=Invalid User');

}



?>

