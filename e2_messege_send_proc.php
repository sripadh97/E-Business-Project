<?php

session_start();

include('database/database_connection.php');



if(isset($_POST['submit'])){

//print_r($_POST);

$send_to=$_POST['send_to'];

$sender=$_SESSION['user'][0];

$subject=$_POST['subject'];

$content=$_POST['content'];



$query="insert into message_t(message_sender,message_receiver,message_subject,message_contents,message_type) values('".$sender."','".$send_to."','".$subject."','".$content."',2)";

//echo $query;



$result=mysqli_query($connection,$query);



if($result){

    header('location:e2_messages.php?msg=Your Message was sent successfully&type=success');

}



else{

    header('location:e2_messages.php?msg=Your Message was not sent successfully&type=error');

}



}



?>