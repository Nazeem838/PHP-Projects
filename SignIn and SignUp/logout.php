<?php

session_start();
unset($_SESSION['name']);
header("location:signin.php");

?>