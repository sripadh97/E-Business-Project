<?php
session_start();
session_destroy();
header('location:e2_login.php');

?>