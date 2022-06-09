<?php

session_start();
require __DIR__ . "../../includes/functions.php";



$_SESSION['tokenforserver'] = '';

redirect("../SelectServer");

?>