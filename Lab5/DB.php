<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="user";

//create the connection
$conn= new mysqli($servername,$username,$password,$dbname);
//check the connection
if($conn->connect_error){
    die("Connection failed:" . $conn->connect_error);
}
?>