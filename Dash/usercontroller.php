<?php 

require __DIR__ . "../../includes/functions.php";
require __DIR__ . "../../includes/discord.php";
require __DIR__ . "../../config.php"; 
if(!isset($_SESSION['tokenforserver']) ){
    redirect("../SelectServer");
    
}
else if($_SESSION['tokenforserver'] == ''){
    redirect("../SelectServer");
}
?>