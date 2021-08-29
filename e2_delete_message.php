<?php

session_start();

include('database/database_connection.php');

if(isset($_GET['message_id'])){

    $message_id=$_GET['message_id'];



    //echo $email; 



    $query="update message_t set message_status=3 WHERE message_id=".$message_id;

    //echo $query;

    $result=mysqli_query($connection,$query);

    if($result){

        header('location:e2_messages.php?msg=Your Message was Deleted successfully&type=success');

    }

    else{

        header('location:e2_messages.php?msg=Your Message was Deleted successfully&type=error');

    }

}

?>