<?php
session_start();
include('database/database_connection.php');
if(!isset($_SESSION['user'])){ //if login in session is not set
    header("Location: login.php");
}

if(isset($_GET['message_id'])){
  
}
else{
  die();
}
?>
<?php include('e2_index-top-menu.php') ?>
<div class="container">     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">  
         
          <h1 align="center"> View Message </h1>
          <div style="border:2px solid grey;margin:70px 30%;padding:30px;">                  
                  <?php
                  $query="select * from message_t where message_id=".$_GET['message_id'];
                  $result=mysqli_query($connection,$query);
                  $cond=false;
                  while($row=mysqli_fetch_assoc($result)){
                    $cond=true;
                    if($row['message_receiver']==$_SESSION['user'][0]){
                      $query3="update message_t set message_status=2 where message_id=".$_GET['message_id'];
                      $result3=mysqli_query($connection,$query3);
                    }
                  ?>
                    <?php
                      $query2="select * from user_t where user_id=".$row['message_sender'];
                      $result2=mysqli_query($connection,$query2);
                      $row2=mysqli_fetch_row($result2);
                    ?>
                    
                    <h2> <?php echo $row['message_subject']; ?></h2> 
              
                    <p><?php echo $row['message_contents']; ?></p>
                    
                    <p>Sender: <?php echo $row2['4'] ?></p>
                    
                    <a  class="btn btn-primary" href="e2_messages.php">View All Messages</a>
                  
                  <?php
                  }
                  ?> 
                  </div>
                  </div>
                  </div>
                  </section>
                