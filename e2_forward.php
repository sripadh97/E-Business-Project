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
          <h1 align="center"> Forward </h1>
          <form action="e2_messege_send_proc.php" method="post"  style="border:2px solid grey;margin:70px 30%;padding:10px;padding:20px">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Send To</label>
                <select  name="send_to" class="form-control" id="exampleFormControlSelect1">
                  <?php
                  $query="select * from user_t where user_id!=".$_SESSION['user'][0];
                  $result=mysqli_query($connection,$query);
                  while($row=mysqli_fetch_assoc($result)){
                  ?>
                  <option value="<?php echo $row['user_id'] ?>"><?php echo $row['user_fullName'] ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              
              <?php
                $query="select * from message_t where message_id=".$_GET['msg_id'];
                $result=mysqli_query($connection,$query);
                $row=mysqli_fetch_assoc($result);
              ?>

              <div class="form-group">
                <label for="exampleFormControlInput1">Subject</label>
                <input type="text" value="<?php echo $row['message_subject']; ?>" name="subject" class="form-control" id="exampleFormControlInput1" placeholder="subject">
              </div>

              <div class="form-group">
                <label for="exampleFormControlTextarea1">Content</label>
                <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"><?php echo $row['message_contents']; ?></textarea>
              </div>

              <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Forward Messege"/>
              </div>
              
            </form> 
            </div>
            </div>
            </div>
            </section>

