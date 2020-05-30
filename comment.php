<?php
session_start();
include  "database.php";



if(!isset($_SESSION["ID"])){
    header("location:ulogin.php");
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
            <h3 class="heading">Send Your Comment </h3>
            <?php
                $sql="select * from book where BID=".$_GET["id"];
                $res=$db->query($sql);
                if($res->num_rows>0){

                }
            ?>
           <div class="center">
           <form action="">
           <label for="">Your Comment</label>
           <textarea name="mes" id="" required></textarea>
           <button type="submit" name="submit">Post Now</button>
           </form>
              
           </div>
        </div> 
        <div id="navi">
           <?php
           include "userSideBar.php";
           ?>
        </div>
        <div id="footer">
           <p>Copyright &copy; Powsikan 2020</p>
        </div>
    </div>   
</body>
</html>
