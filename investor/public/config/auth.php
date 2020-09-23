<?php
//require_once("config.php");

session_start();
if(!isset($_SESSION["staffname"])){
header("Location: index.php");
exit(); 
}

?>