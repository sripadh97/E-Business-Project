<?php

session_start();

include('database/database_connection.php');



if(isset($_POST['message_id'])){

    
 
  //  print_r($_POST);

    $message_id=$_POST['message_id'];

    $subject=$_POST['subject'];

    $content=$_POST['content'];



    //echo $email;



    $query="update message_t set message_subject='".$subject."',message_contents='".$content."' WHERE message_id=".$message_id;

    //echo $query;

    $result=mysqli_query($connection,$query);

    if($result){

        
        header('location:e2_messages.php?msg=Your Message was updated successfully&type=success');

    }

    else{ 

       
        header('location:e2_messages.php?msg=Your Message was not updated successfully&type=error');

    }



}

?>