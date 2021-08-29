<?php
session_start();
include('database/database_connection.php');
if(!isset($_SESSION['user'])){ //if login in session is not set
    header("Location: index.php");
}?>
<?php include('e2_index-top-menu.php') ?>
<div class="container">     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12"> 
<?php

      $query="select * from message_t where message_id=".$_GET['message_id'];
      $result=mysqli_query($connection,$query);
      $row=mysqli_fetch_assoc($result);
      ?>
    <h1 align="center"> Edit Message </h1>
    <form action="e2_update_message.php" method="post"  style="border:2px solid grey;margin:70px 30%;padding:10px;padding:20px">
 
      <div class="form-group"> 
        <label for="exampleFormControlInput1">Subject</label>
        <input type="text" name="subject" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['message_subject'] ?>" placeholder="subject">
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Content</label>
        <textarea   class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"><?php echo $row['message_contents'] ?></textarea>
      </div>

      <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" value="Update Message"/>
      </div>
      <input type="hidden" name="message_id" value="<?php echo $row['message_id'] ?>" />         
    </form>
    </div>
            </div>
            </div>
            </section>  
