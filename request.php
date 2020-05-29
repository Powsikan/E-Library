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
            <h3 class="heading">Change Password</h3>
           <div class="center">
                <?php
                    if(isset($_POST["submit"])){
                        $sql="select * from student where pass='{$_POST["opass"]}' and id='{$_SESSION["ID"]}'";
                        $res=$db->query($sql);
                        if($res->num_rows>0){
                            $s="update student set pass='{$_POST["npass"]}' where id=".$_SESSION["ID"];
                            $db->query($s);
                            echo "<p class='success'>Password Changed Success</p>";
                        }else{
                            echo "<p class='error'>Invalid Password</p>";

                        }
                    }

                ?>

           <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
           <label for="">Old Password</label>
           <input type="password" name="opass" required>
           <label for="">New Password</label>
           <input type="password" name="npass" required>
           <button type="submit" name="submit">Update Password</button>
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
