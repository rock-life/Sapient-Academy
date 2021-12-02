<?php  
session_start();
require_once("config/DB.php");
require_once("models/User.php");
require_once("models/Album.php");
require_once("components/Validator.php");
require_once("layout/header.php");
$album=new Album();
if(isset($_GET["action"])&&file_exists("views/".$_GET["action"].".php"))
require_once("views/".$_GET["action"].".php");
else if(isset($_GET["action"])&&file_exists("components/".$_GET["action"].".php"))
require_once("components/".$_GET["action"].".php");
else
require_once("views/main.php");
require_once("layout/footer.php");
?>