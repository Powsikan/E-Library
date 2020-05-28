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
            <h3 class="heading">View Book Details</h3>
           
            <?php
            $sql="select * from book";
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
                    echo "</tr>";
                }
                echo "</table>";
            }else{
                echo "<p class='error'>No Books Record Found</p>";
            }
            ?>
            
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
