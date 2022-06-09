<?php 

session_start();

require 'connection.php';

$guildId = $_SESSION['tokenforserver'];

if(isset($_POST['add_new_cmnd'])){
    $cmnd_name = $_POST['cmnd_name'];
    $cmnd_reply = $_POST['cmnd_reply'];
    $codes = strtolower($cmnd_name);

    $code_check = "SELECT * FROM customcmnd WHERE guild = '$guildId' AND cmnd_name = '$codes' ";
    $res = mysqli_query($con, $code_check);
    if(mysqli_num_rows($res) > 0){
        echo "duplicate";
    }else{
        $sql = "INSERT INTO `customcmnd`(`guild`, `cmnd_name`, `cmnd_reply`) VALUES ('$guildId','$codes','$cmnd_reply')";

        if($con->query($sql)){
            echo 'success';
        }
       
    }

    

}
else if(isset($_POST['update_welcome_data'])){
    $welcomechannel = $_POST['wel'];
    $defaultrole = $_POST['rol'];
    $defaultrolename = $_POST['rule'];
    $sql = "UPDATE  `guilds` SET `welcomechannel`='$welcomechannel',`defaultrole`= '$defaultrole',`rulesid`='$defaultrolename' WHERE guildId = '$guildId' ";
    if($con->query($sql)){
        echo 'success';
    }

}
else if(isset($_POST['update_normal_role'])){
    $role = $_POST['rol'];
    $sql = "UPDATE  `guilds` SET `rolenormal`='$role' WHERE guildId = '$guildId' ";
    if($con->query($sql)){
        echo 'success';
    }

}
else if(isset($_POST['update_mute_role'])){
    $role = $_POST['rol'];
    $sql = "UPDATE  `guilds` SET `rolemute`='$role' WHERE guildId = '$guildId' ";
    if($con->query($sql)){
        echo 'success';
    }

}
else if(isset($_POST['updatespamlvl'])){
    $smplmt = $_POST['spmlmt'];
    $h = $_POST['h'];
    $m = $_POST['m'];
    $s = $_POST['s'];
    $intercal = $_POST['intervl'];

    $interval = $intercal*1000;
    $milsec = ($h*60*60+$m*60+$s)*1000;
    // echo  $milsec;

    

    $sql = "UPDATE `spam` SET `lmt`='$smplmt',`time`='$milsec' ,`diff` = '$interval' WHERE guildId = '$guildId' ";
    if($con->query($sql)){
        // echo 'success';
        header('Location: ../Moderator');
        exit();
    }
}

else if(isset($_POST['updatemoderatelvl'])){
    $smplmt = $_POST['lmt'];
    $h = $_POST['h'];
    $m = $_POST['m'];
    $s = $_POST['s'];
    $action = $_POST['action'];
    $milsec = ($h*60*60+$m*60+$s)*1000;
    // echo  $milsec;

    

    $sql = "UPDATE `guildmutelevel` SET `lmt`='$smplmt',`time`='$milsec',`action`='$action'  WHERE guild = '$guildId' ";
    if($con->query($sql)){
        // echo 'success';
        header('Location: ../Moderator');
        exit();
    }
}

else if(isset($_POST['update_new_cmnd'])){
    $prefix = $_POST['prefix'];



    $sql = "UPDATE `guilds` SET `prefix`='{$_POST['prefix']}'  WHERE guildId = '$guildId' ";
    if($con->query($sql)){
        echo 'success';
    }
}
// print_r($_POST)

else if(isset($_POST['update_guild_chatchannelId'])){
    $guild_chatchannelId = $_POST['guild_chatchannelId'];
    $sql = "UPDATE `guilds` SET `chatchannelId`='$guild_chatchannelId'  WHERE guildId = '$guildId' ";
    if($con->query($sql)){
        echo 'success';
    }
}


?>