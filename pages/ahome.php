<?php
session_start();
if(!isset($_SESSION["AID"])){
    header("location:./auth/alogin.php");
}
?> 