<?php
session_start();
include('database/database_connection.php');
?>
        <h1 align="center"> Send Message </h1>
          <form action="e2_messege_send_proc.php" method="post">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Send To</label>
                <select name="send_to"  id="exampleFormControlSelect1">
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

              <div class="form-group">
                <label for="exampleFormControlInput1">Subject</label>
                <input type="text" name="subject"  id="exampleFormControlInput1" placeholder="subject">
              </div>

              <div class="form-group">
                <label  for="exampleFormControlTextarea1">Content</label>
                <textarea name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>

              <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Send Message"/>
              </div>
              
            </form>
            <!--Message form working-->
