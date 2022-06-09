<?php 

require 'connection.php';

if(isset($_POST['deletecstmcmnd'])){
    // echo 'success';
    $id = $_POST['deletecstmcmnd'];

    $delete = "DELETE FROM customcmnd WHERE id = '$id' ";
    if ($con->query($delete)) {
    echo 'success';
    }
    else{
        die("Update failed $con->error");
    }
}

?>