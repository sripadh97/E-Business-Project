<?php
session_start();
//print_r($_SESSION['user']);
include('database/database_connection.php');
if(!isset($_SESSION['user'])){ //if login in session is not set
    header("Location: e2_login.php");
}
?>
<?php include('e2_index-top-menu.php') ?>
<div class="container">     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">         
            <h1 align="center"> Reply </h1>
            <form action="e2_messege_send_proc.php" method="post"  style="border:2px solid grey;margin:70px 30%;padding:10px;padding:20px" >
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Send To</label>
                  <select disabled class="form-control" id="exampleFormControlSelect1">
                    <?php
                    $query="select * from user_t where user_id=".$_GET['user_id'];
                    $result=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <option value="<?php echo $row['user_id'] ?>"><?php echo $row['user_fullName'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <input type="hidden" name="send_to" value="<?php echo $_GET['user_id'] ?>" />
                </div>

                <div class="form-group">
                  <label for="exampleFormControlInput1">Subject</label>
                  <input type="text" name="subject" class="form-control" id="exampleFormControlInput1" placeholder="subject">
                </div>

                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Content</label>
                  <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="submit" value="Send Message"/>
                </div>
                
              </form>
            </div> 
            </div>
            </div>
            </section>