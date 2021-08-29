<?php
session_start();
//print_r($_SESSION['user']);
include('database/database_connection.php');
if(!isset($_SESSION['user'])){ //if login in session is not set
    header("Location: login.php");
}
?>
<?php include('e2_index-top-menu.php') ?>
<div class="container">
 <div class="mail-box">
                  <aside class="sm-side">
                     
                      <div class="inbox-body">
                          <a href="#myModal" data-toggle="modal"  title="Compose"    class="btn btn-compose">
                              Compose
                          </a>
                          <!-- Modal -->
                          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                          <h4 class="modal-title">Compose</h4>
                                      </div>
                                      <div class="modal-body">
                                      <button class="btn btn-info" onclick="mtype('mtm');" >Send alert message</button>   <button  class="btn btn-info" onclick="mtype('mtf');" >Send Message</button>
                                      <div class="sam">  
                                          <form action="e2_alert_messege_send_proc.php" method="post" role="form" class="form-horizontal">
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Send To</label>
                                                  <div class="col-lg-10">
                                                  <select name="send_to" class="form-control" id="exampleFormControlSelect1">
                                                    <option value="">Select</option>
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
                                              </div>

                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Email</label>
                                                  <div class="col-lg-10">
                                                  <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="email">
                                                  </div>
                                              </div>

                                             
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Subject</label>
                                                  <div class="col-lg-10">
                                                  <input type="text" name="subject" class="form-control" id="exampleFormControlInput1" placeholder="subject">
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Content</label>
                                                  <div class="col-lg-10">
                                                      <textarea rows="10" cols="30" name="content" class="form-control" id="" name=""></textarea>
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                  <input  class="btn btn-primary" type="submit" name="submit" value="Send Message"/>
                                                  </div>
                                              </div>
                                          </form>
                                          </div><!--  close sam -->

                                          <div class="mtf" style="display:none;" >  
                                          <form action="e2_messege_send_proc.php"  method="post" role="form" class="form-horizontal">
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Send To</label>
                                                  <div class="col-lg-10">
                                                  <select name="send_to" class="form-control" id="exampleFormControlSelect1">
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
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Subject</label>
                                                  <div class="col-lg-10">
                                                  <input type="text" name="subject" class="form-control" id="exampleFormControlInput1" placeholder="subject">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Content</label>
                                                  <div class="col-lg-10">
                                                  <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                  </div>
                                              </div>
                                            

                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                  <input  class="btn btn-primary" type="submit" name="submit" value="Send Message"/>
                                                  </div>
                                              </div>
                                          </form>
                                          </div><!--  close ams -->

                                      </div>
                                  </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->




                          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal_send" class="modal fade" style="display: none;">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                          <h4 class="modal-title">send alert message</h4>
                                      </div>
                                      <div class="modal-body">
                                    
                                      <div class="">  
                                          <form action="e2_alert_messege_send_proc.php" method="post" role="form" class="form-horizontal">
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Send To</label>
                                                  <div class="col-lg-10">
                                                  <select name="send_to" class="form-control" id="exampleFormControlSelect1">
                                                    <option value="">Select</option>
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
                                              </div>

                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Email</label>
                                                  <div class="col-lg-10">
                                                  <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="email">
                                                  </div>
                                              </div>

                                             
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Subject</label>
                                                  <div class="col-lg-10">
                                                  <input type="text" name="subject" class="form-control" id="exampleFormControlInput1" placeholder="subject">
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Content</label>
                                                  <div class="col-lg-10">
                                                      <textarea rows="10" cols="30" name="content" class="form-control" id="" name=""></textarea>
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                  <input  class="btn btn-primary" type="submit" name="submit" value="Send Message"/>
                                                  </div>
                                              </div>
                                          </form>
                                          </div><!--  close sam -->

                                         
                                      </div>
                                  </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->


  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal_send_alert" class="modal fade" style="display: none;">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                          <h4 class="modal-title">Send Message</h4>
                                      </div>
                                      <div class="modal-body">
                                     
                                          <div class="" >  
                                          <form action="e2_messege_send_proc.php"  method="post" role="form" class="form-horizontal">
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Send To</label>
                                                  <div class="col-lg-10">
                                                  <select name="send_to" class="form-control" id="exampleFormControlSelect1">
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
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Subject</label>
                                                  <div class="col-lg-10">
                                                  <input type="text" name="subject" class="form-control" id="exampleFormControlInput1" placeholder="subject">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Content</label>
                                                  <div class="col-lg-10">
                                                  <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                  </div>
                                              </div>
                                            

                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                  <input  class="btn btn-primary" type="submit" name="submit" value="Send Message"/>
                                                  </div>
                                              </div>
                                          </form>
                                          </div><!--  close ams -->

                                      </div>
                                  </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->



                      </div>
                      <ul class="inbox-nav inbox-divider">
                          <li class="active">
                              <a href="#" onclick="tab_left('inbox')"  ><i class="fa fa-inbox"></i> Inbox </a>

                          </li>
                          <li>
                              <a href="#"  onclick="tab_left('sent')" ><i class="fa fa-envelope-o"></i> Sent Mail</a>
                          </li>

                          
                         

                   

                  </aside>
                  <aside class="lg-side">
                    
                      <div class="inbox-body">
                    <?php if(isset($_GET['msg'])){?>
                      <div class="alert <?php if($_GET['type']=="success"){ echo 'alert-success';} else { echo 'alert-danger'; }?>
                      " role="alert">
                        <?php
                                echo $_GET['msg'];
                            
                        ?>
                        </div> 
                    <?php } ?>
                         <div class="inbox" <?php   if(isset($_GET['msg'])){
                                echo 'style="display:none;"'; 
                            } else{
                                    echo 'style="display:block;"';
                                }
                             ?>>   
                          <table class="table table-inbox table-hover">
                            <tbody>
                            <?php 
                            $query="select * from message_t ";
                            $result=mysqli_query($connection,$query);
            
                            while($row=mysqli_fetch_assoc($result)){
                 
                            }?>
                            <thead> 
                                <tr> 
                                <th>Sender</th>
                                <th>Receiver</th>
                                <th>Subject</th> 
                                <th>Contents</th> 
                                <th>Date</th>
                                <th>Action</th>
                                </tr>  
                            </thead> 
                        <tbody>
                            <?php
                            $query="select * from message_t where (message_receiver=".$_SESSION['user'][0].") and (message_status=1 OR message_status=2) order by message_id desc";
                            $result=mysqli_query($connection,$query);
                            $cd = 0;
                            while($row=mysqli_fetch_assoc($result)){
                            $cd = 1;
                                /*$q="select * from seen_message where message_id=".$row['message_id']." and user_id=".$_SESSION['user'][0];
                                $r=mysqli_query($connection,$q);
                                $ro=mysqli_fetch_assoc($r);
                                //var_dump($ro);*/     
                             //   echo $row['message_type']; 
                              //  echo $row['message_status']; 
                                if($row['message_type']==1){ 
                                    $setcolor= "style='background-color:darkred;color:black;'"; 
                                  //  echo $setcolor;
                                   }    
    
                                   elseif($row['message_type']==2 && $row['message_status']==1){ 
                                    $setcolor= "style='background-color:grey;color:black;'"; 
                                  //  echo $setcolor;
                                   }
                
                                else { 
                                    $setcolor=  "style='background-color: rgba(0,0,0,.05);color:black;'"; 
                                  //  echo $setcolor;
                                    } ?> 

<tr <?php if($row['message_type']==1){ echo "style='background-color:darkred;color:white'"; } ?> <?php if($row['message_status']==2){ echo "style='background-color:grey;;color:white'"; } ?>>
                            <?php
                                $query2="select * from user_t where user_id=".$row['message_sender'];
                                $result2=mysqli_query($connection,$query2);
                                $row2=mysqli_fetch_row($result2);
                            ?>
                            <?php
                                $query3="select * from user_t where user_id=".$row['message_receiver'];
                                $result3=mysqli_query($connection,$query3);
                                $row3=mysqli_fetch_row($result3);
                                $phpdate =  $row['createddate'];
                            ?>
                            <td> <?php  echo $row2['4']; ?> </td>
                            <td> <?php echo $row3['4']; ?> </td>
                            <td> <?php echo $row['message_subject']; ?> </td>
                            <td> <?php echo $row['message_contents']; ?> </td>
                            <td> <?php echo  $phpdate ; ?> </td>
                            
                            <td>
                            <?php
                            //if($_SESSION['user'][1]==$row['message_receiver']){
                                ?> 
                                <a href="e2_reply_to.php?user_id=<?php echo $row['message_sender'];  ?>" <?php if($row['message_type']==2 || $row['message_status']==2){ echo "style='color:black'"; } ?>>Reply</a> |
                                <?php
                            //  }
                            ?>
  
                        <a href="e2_view_message.php?message_id=<?php echo $row['message_id']; ?>" <?php if($row['message_type']==1 || $row['message_status']==2){ echo "style='color:black'"; } ?>> View </a> |
                        <a href="e2_forward.php?msg_id=<?php echo $row['message_id'] ?>" <?php if($row['message_type']==1 || $row['message_status']==2){ echo "style='color:black'"; } ?> >Forward</a> |
                      <?php
                      if($_SESSION['user'][1]==2){
                      ?>
                       <a href="e2_edit_message.php?message_id=<?php echo $row['message_id']; ?>" <?php if($row['message_type']==1 || $row['message_status']==2){ echo "style='color:black'"; } ?>> Edit </a> | <a href="e2_delete_message.php?message_id=<?php echo $row['message_id']; ?>" <?php if($row['message_type']==1 || $row['message_status']==2){ echo "style='color:black'"; } ?>> Delete </a> | 
                      <?php
                      }
                      ?> 
                      <!-- <a href="#myModal_send_alert" data-toggle="modal"     <?php if($row['message_type']==1 || $row['message_status']==2){ echo "style='color:black'"; } ?>> Send Message </a> |  
                      <a href="#myModal_send" data-toggle="modal"   <?php if($row['message_type']==1 || $row['message_status']==2){ echo "style='color:black'"; } ?> > Send Alert Message </a> -->
                      </td>
                    </tr> 
                    <?php 
                    }  
                    if($cd == 0){ ?> 
                    <tr>
                    <td></td> 
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align:center">
                     <a href="#myModal_send_alert" data-toggle="modal" <?php if($row['message_type']==1 || $row['message_status']==2){ echo "style='color:white'"; } ?>> Send Message </a> |
                      <a href="#myModal_send" data-toggle="modal" <?php if($row['message_type']==1 || $row['message_status']==2){ echo "style='color:white'"; } ?> > Send Alert Message </a>
                      </td>
                    </tr>
                  <?php  }
                    ?>
                    </tbody>
                          </table>
                         </div> <!-- end inbox -->

                         <div class="sent"  <?php   if(isset($_GET['msg'])){
                                echo 'style="display:block;"'; } else{
                                    echo 'style="display:none;"';
                                }
                             ?> >
                          <table class="table table-inbox table-hover">
                            <tbody>
                            
                            <thead>
                                <tr>
                                <th>Sender</th>
                                <th>Receiver</th>
                                <th>Subject</th> 
                                <th>Contents</th> 
                                <th>Date</th>
                                <th>Action</th>
                                </tr>  
                            </thead>
                        <tbody> 
                            <?php
                          $query="select * from message_t where (message_sender=".$_SESSION['user'][0].") and (message_status=1 OR message_status=2) order by message_id desc";
                          $result=mysqli_query($connection,$query);
                            $cd = 0;
                            while($row=mysqli_fetch_assoc($result)){
                            $cd = 1; 
                                /*$q="select * from seen_message where message_id=".$row['message_id']." and user_id=".$_SESSION['user'][0];
                                $r=mysqli_query($connection,$q);
                                $ro=mysqli_fetch_assoc($r);
                                //var_dump($ro);*/     
                            //  echo $row['message_type']; 
                             //   echo $row['message_status'];
                               if($row['message_type']==1){ 
                                $setcolor= "style='background-color:darkred;color:black;'"; 
                              //  echo $setcolor;
                               }

                               elseif($row['message_type']==2 && $row['message_status']==1){ 
                                $setcolor= "style='background-color:grey;color:black;'"; 
                              //  echo $setcolor;
                               }
                                
                            else { 
                                $setcolor=  "style='background-color: rgba(0,0,0,.05);color:black;'"; 
                              //  echo $setcolor;
                                } ?>
                           
  
                           <tr <?php if($row['message_type']==1){ echo "style='background-color:darkred;color:white'"; } ?> <?php if($row['message_status']==2){ echo "style='background-color:grey;;color:white'"; } ?>>
                            <?php 
                                $query2="select * from user_t where user_id=".$row['message_sender'];
                                $result2=mysqli_query($connection,$query2);
                                $row2=mysqli_fetch_row($result2);
                            ?>
                            <?php 
                                $query3="select * from user_t where user_id=".$row['message_receiver'];
                                $result3=mysqli_query($connection,$query3);
                                $row3=mysqli_fetch_row($result3);
                                $phpdate =  $row['createddate'];
                            ?> 
                            <td> <?php echo $row2['4'];  ?> </td>
                            <td> <?php echo $row3['4']; ?> </td>
                            <td> <?php echo $row['message_subject']; ?> </td>
                            <td> <?php echo $row['message_contents']; ?> </td>
                            <td> <?php echo $phpdate ; ?> </td>
                             
                            <td>
                            <?php
                            //if($_SESSION['user'][1]==$row['message_receiver']){
                                ?> 
                                <a href="e2_reply_to.php?user_id=<?php echo $row['message_sender'];  ?>" <?php if($row['message_type']==2 || $row['message_status']==2){ echo "style='color:black'"; } ?>>Reply</a> |
                                <?php
                            //  }
                            ?>
  
                        <a href="e2_view_message.php?message_id=<?php echo $row['message_id']; ?>" <?php if($row['message_type']==1 || $row['message_status']==2){ echo "style='color:black'"; } ?>> View </a> |
                        <a href="e2_forward.php?msg_id=<?php echo $row['message_id'] ?>" <?php if($row['message_type']==1 || $row['message_status']==2){ echo "style='color:black'"; } ?> >Forward</a> |
                      <?php
                      if($_SESSION['user'][1]==2){    
                      ?>
                       <a href="e2_edit_message.php?message_id=<?php echo $row['message_id']; ?>" <?php if($row['message_type']==1 || $row['message_status']==2){ echo "style='color:black'"; } ?>> Edit </a> | <a href="delete_message.php?message_id=<?php echo $row['message_id']; ?>" <?php if($row['message_type']==1 || $row['message_status']==2){ echo "style='color:black'"; } ?>> Delete </a> | 
                      <?php
                      }
                      ?>
                      <a href="#myModal_send_alert" data-toggle="modal" <?php if($row['message_type']==1 || $row['message_status']==2){ echo "style='color:black'"; } ?>> Send Message </a> |
                      <a href="#myModal_send" data-toggle="modal" <?php if($row['message_type']==1 || $row['message_status']==2){ echo "style='color:black'"; } ?> > Send Alert Message </a>
                      </td>
                    </tr> 
                    <?php
                    } 
                    if($cd == 0){ ?>
                    <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align:center">
                     <a onclick="messegeform();" href="#" <?php if($row['message_type']==1 || $row['message_status']==2){ echo "style='color:black'"; } ?>> Send Message </a> |
                      <a onclick="alertmessegeform();" href="#" <?php if($row['message_type']==1 || $row['message_status']==2){ echo "style='color:black'"; } ?> > Send Alert Message </a>
                      </td>
                    </tr>
                  <?php  }
                    ?>
                    </tbody>
                          </table>
                         </div> 
                      </div>
                  </aside>
              </div>
</div>
</div>
<script>
$(function() {
    
    $(".inbox-nav li a").click(function(){
  $(".inbox-nav li ").removeClass("active");
  $(this).addClass("active");
});

});    
  
function mtype(cname){ 

  if(cname=="mtm"){
  $('.sam').show();
  $('.mtf').hide();
  } 
  else{ 
    $('.mtf').show(); 
    $('.sam').hide(); 
  }
}  

</script>

<script>

 
function tab_left(left_side){ 

  if(left_side=="inbox"){
  $('.inbox').show();
  $('.sent').hide();
  }
  else{
    $('.inbox').hide();
    $('.sent').show();
  }
}  

$( ".alertmessegeform" ).click(function() {
    $('.myModal_send_alert').show();
});

$( ".messegeform" ).click(function() {
    $('.myModal_send').show();
});

</script>


