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
        <h3 class="heding">User Login Here</h3>
            <div class="center">
            <form action="">
                <label for="">Name</label>
                <input type="text" name="uname" required>
                <label for="">Password</label>
                <input type="password" name="upass" required>
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