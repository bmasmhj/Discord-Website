<?php

require __DIR__ . "../../includes/functions.php";
require __DIR__ . "../../includes/discord.php";
require __DIR__ . "../../config.php"; 
print_r($_POST);

if(isset($_POST['serverid'])){
    $server_id = $_POST['serverid'];
    $_SESSION['tokenforserver'] = $server_id;
    redirect("Dashboard");

    

}else{
    redirect("Dashboard");

}
?>