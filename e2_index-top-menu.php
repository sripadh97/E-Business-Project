<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Messages</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
  <!-- custom style -->
  <link rel="stylesheet" href="style.css">
  <style>
    .sam{
    margin-top: 20px;
    }
    .mtf{
        margin-top: 20px;
    }
  </style>
 </head> 


<BODY>
        <H3> <CENTER> <u> Collaborative Online System (COS) </u></CENTER> </H3>

<?php 
if(!empty($_SESSION["username"])){
echo "<div align=\"right\">User = <font color=\"red\">";
echo htmlspecialchars($_SESSION["username"]); 
echo "</font> </h3></div>";
}
?> 
	
        <HR> <RIGHT><b>
		
		 <a href="e2_logout.php" target="BOT">LOGOUT</a> </CENTER>
	<HR>
	<p>
   </BODY> 
</html>