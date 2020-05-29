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
            <h3 class="heading">Upload Book</h3>
           <div class="center">
                <?php
                    if(isset($_POST["submit"])){
                        $target_dir="upload/";
                        $target_file=$target_dir.basename($_FILES["efile"]["name"]);
                        if(move_uploaded_file($_FILES["efile"]["tmp_name"],$target_file)){
                            $s="insert into book(BTITLE,KEYWORDS,FILE) values('{$_POST["bname"]}','{$_POST["keys"]}','{$target_file}')";
                            $db->query($s);
                            echo "<p class='success'>Book Uploaded Success</p>";
                        }else{
                            echo "<p class='error'>Error IN Upload</p>";

                        }
                    }

                ?>

           <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
           <label for="">Book Title</label>
           <input type="text" name="bname" required>
           <label for="">Keywords</label>
           <textarea name="keys" id="" cols="30" rows="10" required></textarea>
           <label for="">Upload File</label>
           <input type="file" name="efile" required>
           <button type="submit" name="submit">Upload book</button>
           </form>
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
