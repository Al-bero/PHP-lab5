<?php 
session_start();
//disconnect
session_destroy();
//go to the home page
header ("location:index.php");
?>