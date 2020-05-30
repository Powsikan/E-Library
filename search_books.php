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
            <h3 class="heading">Search Book</h3>
           <div class="center">
              

           <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
           <label for="">Enter Book Name Or Keywords</label>
           <input type="text" name="name"  required></input>
           <button type="submit" name="submit">Search Now</button>
           </form>
           </div>
           <?php
           if(isset($_POST["submit"])){
            $sql="select * from book where BTITLE like '%{$_POST["name"]}%' and keywords like '%{$_POST["name"]}%'";
            $res=$db->query($sql);
            if($res->num_rows>0){
                echo "<table>
                    <tr>
                       <th>SNO</th>
                       <th>BOOK NAME</th>
                       <th>KEYWORDS</th>
                       <th>VIEW</th>
                    </tr>
                ";
                $i=0;
                while($row=$res->fetch_assoc()){
                    $i++; 
                    echo "<tr>";
                    echo "<td>{$i}</td>";
                    echo "<td>{$row["BTITLE"]}</td>";
                    echo "<td>{$row["KEYWORDS"]}</td>";
                    echo "<td><a href='{$row["FILE"]}' target='_blank'>View</a></td>";
                    echo "<td><a href='comment.php?id={$row["BID"]}'>Go</a></td>";

                    echo "</tr>";
                }
                echo "</table>";
            }else{
                echo "<p class='error'>No Books Record Found</p>";
            }
        }
            ?>
           
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
