<?php
    session_start();

    include  "database.php";
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
            <h3 class="heading">User Login Here</h3>
            <div class="center">
            <?php
               if(isset($_POST["submit"]))
               {
                   $sql="select * from student where NAME='{$_POST["uname"]}'and PASS='{$_POST["upass"]}'";
                  $res=$db->query($sql);
                  if($res->num_rows>0)
                  {
                      $row=$res->fetch_assoc();
                      $_SESSION["ID"]=$row["ID"];
                      $_SESSION["NAME"]=$row["NAME"];
                      header("location:uhome.php");
                  }
                  else{
                      echo "<p class='error'>Invalid User Details</p>";
                  }
               }
            ?>

            <form action="ulogin.php" method="post">
                <label for="">Name</label>
                <input type="text" name="uname" required>
                <label for="">Password</label>
                <input type="password" name="upass" required>
                <button type="submit" name="submit">Login Now</button>
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
