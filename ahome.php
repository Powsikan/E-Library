<?php
session_start();
if(!isset($_SESSION["AID"])){
    header("location:alogin.php");
}
?> 