<?php
session_start();
include  "database.php";



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
        <h3 class="heading">New User Register</h3>
            <div class="center">
            <?php
                    if(isset($_POST["submit"])){
                            $s="insert into student(NAME,PASS,MAIL,DEP) values ('{$_POST["uname"]}','{$_POST["upass"]}','{$_POST["mail"]}','{$_POST["dep"]}')";
                            $db->query($s);
                            echo "<p class='success'>User Registration Success</p>";
                    }

                ?>


            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <label for="">Name</label>
                <input type="text" name="uname" required>
                <label for="">Email</label>
                <input type="email" name="mail" required>
                <label for="">Password</label>
                <input type="password" name="upass" required>
                <select name="dep" id="">
                <option value="">Select</option>
                <option value="SE">SE</option>
                <option value="MIT">MIT</option>
                <option value="ENCM">ENCM</option>
                <option value="PS">PS</option>
                </select>
                <button type="submit">Login Now</button>
            </form>
            </div>
        </div> 
        <div id="navi">
           <?php
           include "sideBar.php";
           ?>
        </div>
        <div id="footer">
           <p>Copyright &copy; Powsikan 2020</p>
        </div>
    </div>   
</body>
</html>
