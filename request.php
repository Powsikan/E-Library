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
            <h3 class="heading">New Book Request</h3>
           <div class="center">
                <?php
                    if(isset($_POST["submit"])){
                        $sql="insert into request(ID,MES,LOGS) values({$_SESSION["ID]},'{$_POST["mess"]}',now())";
                        $db->query($sql);
                       echo "<p class='success'>Request send Success</p>";
                       
                    }
                ?>

           <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
           <label for="">Message</label>
           <textarea name="mess" id="" cols="30" rows="10" required></textarea>
           <button type="submit" name="submit">Send Request</button>
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
