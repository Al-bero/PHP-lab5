<?php
session_start();
include ("DB.php");
?>
<?php
//save the sesstion varibles in variables to use it in retrieve data from DB
$name=$_SESSION["Nmae"];
?>

<?php
//Db query
$view_user_query="SELECT * FROM user WHERE Nmae ='$name'";
$run=mysqli_query($conn,$view_user_query); //here run the sql query.
$row=mysqli_fetch_array($run);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>CS 314</title>
    <link href="style.css" type="text/css" rel="stylesheet">
    <style type="text/css">
        h1{ padding: 10px;}
p{padding: 5px;
}
    .styled-table 
    {
    border-collapse: collapse;
    margin: 10px;
    
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    align-
    }
    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }
    .styled-table thead tr
     {
    background-color: black;
    color: #ffffff;
    text-align: left;
    }
    .styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }
    .styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009479;
    }

    </style>
</head>
<body>
    <div class="wrapper">
    <?php include 'header.php' ?>
    <br>
    <br>
    <br>
    <h1 > Your Profile</h1>
    <br>
    <p ><?php echo "Welcome  " . $_SESSION["Nmae"]."."; ?> </p>
    <table  class="styled-table">
    <thead>
        <tr class="active-row">
            <th> User ID</th>
            <th> User Nmae</th>
            <th> User Password</th>
        </tr>
        </thead>
          <tbody>  
        <tr>
           <td><?php  echo $row[0];?></td>
           <td><?php  echo $row[1];?></td>
           <td><?php  echo $row[2];?></td>

        </tr>
</tbody>
    </table>
    
    <?php include 'footer.php' ?>
</div>
</body>
</html>