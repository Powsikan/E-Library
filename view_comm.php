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
            <h3 class="heading">View Comment Details</h3>
           
            <?php
            $sql="select b.btitle,s.name,c.comm,c.logs from  comment c inner join book b on b.bid=c.bid inner join student s on c.sid=s.id";
            $res=$db->query($sql);
            if($res->num_rows>0){
                echo "<table>
                    <tr>
                       <th>SNO</th>
                       <th>BOOK NAME</th>
                       <th>STUDENT NAME</th>
                       <th>COMMENT</th>
                       <th>DATE</th>
                    </tr>
                ";
                $i=0;
                while($row=$res->fetch_assoc()){
                    $i++; 
                    echo "<tr>";
                    echo "<td>{$i}</td>";
                    echo "<td>{$row["btitle"]}</td>";
                    echo "<td>{$row["name"]}</td>";
                    echo "<td>{$row["comm"]}</td>";
                    echo "<td>{$row["logs"]}</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }else{
                echo "<p class='error'>No Comment Found</p>";
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
