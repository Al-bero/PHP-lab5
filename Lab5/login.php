<?php
session_start();
if(isset($_REQUEST["username"]))
{$name =$_REQUEST["username"]; $_SESSION["Nmae"]=$name;}
?>
<?php
include ("DB.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //1- bring the value
    $unmae=$_POST["username"];
    $password=$_POST["password"];
    //Error msg if need
    $Err="";

    //2-DB
    //check if this name and password in the DB by using query

    $query="SELECT * FROM user WHERE Nmae ='$unmae' AND Password='$password'";
    //run
    $result = $conn-> query($query);
    //check if this user in our DB
    if($result->num_rows>0)
    {
        echo 'Your regidtration was successful ! :)';
        //go to the user page and show the table
        header("location:user.php");
    }

    else
    {
        $Err="<script> alert('Your password or name wrong')</script>";
    }//end else
}//end if 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>CS 314</title>
    <link href="style.css" type="text/css" rel="stylesheet">
    <style type="text/css">
h3{
  font-size:1.5em;
  color:#525252;}
.box{
  background:white;
  width:300px;
  border-radius:6px;
  margin: 30px;
  margin-left: 280px;
  padding: 10px 50px 90px 50px;
  border: black 2px solid; }
.email{
  background:#ecf0f1;
  border: #ccc 1px solid;
  border-bottom: #ccc 2px solid;
  padding: 8px;
  width:250px;
  color:#AAAAAA;
  margin-top:10px;
  font-size:1em;
  border-radius:4px;}
.btn{
  background:black;
  width:125px;
  padding-top:5px;
  padding-bottom:5px;
  color:white;
  border-radius:4px;
  border: #27ae60 1px solid;
  margin-top:20px;
  margin-bottom:20px;
  float:left;
  margin-left:16px;
  font-weight:800;
  font-size:0.8em;}
.btn:hover{
  background:#2CC06B; 
}
    </style>
</head>
<body>
    <div class="wrapper">
    <?php include 'header.php' ?>

    <form method="post" >
    <div class="box"> 
    <h3>Login Here</h3>

    <label for="username">Username</label>
    <input type="text" placeholder="Email or Phone" id="username" name="username" class="email" >
    
    <label for="password">Password</label>
    <input type="text" placeholder="password" id="password" name="password" class="email" >
    
    <input type="submit" name="submit" value="log in" id="button"class="btn" >
    </div>
    </form>
    
    <?php include 'footer.php' ?>
</div>
</body>
</html>