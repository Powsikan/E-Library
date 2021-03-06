<?php
session_start();
include  "database.php";

function countRecord($sql,$db)
{
    $res=$db->query($sql);
    return $res->num_rows;
}

if(!isset($_SESSION["AID"])){
    header("location:alogin.php");
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="Container">
        <div id="header">
             <h1>E-Library Management System</h1>
        </div>  
        <div id="wrapper">
            <h3 class="heading">Welcome Admin</h3>
            <div class="center">
            <ul class="record">
                <li>Total Students : <?php echo countRecord("select * from student",$db) ?></li>
                <li>Total Books : <?php echo countRecord("select * from book",$db) ?></li>
                <li>Total Request : <?php echo countRecord("select * from request",$db) ?></li>
                <li>Total Comments : <?php echo countRecord("select * from comment",$db) ?></li>

            </ul>
            </div> 
        </div> 
        <div id="navi">
           <?php
           include "adminSideBar.php";
           ?>
        </div>
        <div id="footer">
           <p>Copyright &copy; Powsikan 2020</p>
        </div>
    </div>   
</body>
</html>
