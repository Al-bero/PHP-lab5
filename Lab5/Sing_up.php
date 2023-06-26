<?php
include 'DB.php' ?>

<?php

$nameError="";
$passError="";
//CHECK.................................................
//TO START THE VALIDATION ONCE THE USER CLICK ON THE BUTTON OF SIGN IN NOT BEFOR THAT 
if($_SERVER["REQUEST_METHOD"]=="POST")
{
// 1- USER NAME validation
if(empty($_POST["username"]))
{$nameError="Name is reqired pleass enter your correct name";}
elseif(!preg_match("/^[a-zA-Z]*$/",$_POST["username"]))
{$nameError="Only letters and white space allowed";}

//2- password validation
elseif(empty($_POST["password"]))
{$passError="password is reqired";}
//strlen== string length
elseif(strlen($_POST["password"])<5)
{$passError="your password less than 5";}

else{
  //ready to insert in my DB
  $name=$_POST["username"]; 
  $password=$_POST["password"];  
  
  //query to check if the user registered or not 
  $check_name_query="select * from user WHERE Nmae ='$name'";
  $run_query=mysqli_query($conn,$check_name_query);

  if(mysqli_num_rows($run_query)>0)
  {
    echo "<script> alert('Name $name is aready exist in our Database, please try another one !')</script>";
exit();
  }
$query="insert into user (Nmae,password) values ('$name','$password')";
$sql=mysqli_query($conn,$query)or die ("Could Not Perform the Query");
// to go to the log in page
header ("Location: login.php?status=success");
}
}//end if
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>CS 314</title>
    <link href="style.css" type="text/css" rel="stylesheet">
    <style type="text/css">
        h1{text-align: center; padding: 20px}

        *{
    margin: 0;
    padding: 0;
    font-family: 'poppins',sans-serif;
}
section{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    width: 100%;
    background-position: center;
    background-size: cover;
}
.form-box{
    position: relative;
    width: 400px;
    height: 450px;
    background: transparent;
    border: 1px solid rgba(255,255,255,0.5);
    border-radius: 20px;
    display: flex;
    justify-content: center;
    align-items: center;

}

h3{
    font-size: 2em;
    color: purple;
    text-align: center;
}
.inputbox{
    position: relative;
    margin: 30px 0;
    width: 310px;
    border-bottom: 2px solid #fff;
}
.inputbox label{
    position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    color: purple;
    font-size: 1em;
    pointer-events: none;
    transition: .5s;
}



.inputbox input {
    width: 100%;
    height: 50px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    padding:2px 35px 0 5px;
    transform: translateY(100%);
    
    
}
.inputbox ion-icon{
    position: absolute;
    right: 8px;
    color: purple;
    font-size: 1.2em;
    top: 20px;
}
    </style>
</head>
<body>
<div class="wrapper">
    <?php include 'header.php' ?>
   
<section>
    <div class="form-box">
    <div class="form-value"> 

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
    <h3>Register Here</h3>

<div class="inputbox">
    <ion-icon name="person-outline"></ion-icon>
    <label for="username">User Name</label>
    <input type="text" id="username" name="username">
    <p class="error">*<?php echo $nameError ?>   </p>
</div>

<div class="inputbox">
    <ion-icon name="lock-open-outline"></ion-icon>
    <label for="password">Password</label>
    <input type="text" id="password" name="password">
    <p class="error">*<?php echo $passError;?></p>
</div>

<div class="signup">
    <input type="submit" name="submit" value="Sign up" id="button">
    </div>
    </form>

</div>
</div>
</section>  
    <?php include 'footer.php' ?>
</div>
<!-- to make icons work /apear-->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>