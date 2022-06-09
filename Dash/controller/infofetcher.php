<?php 

require 'connection.php';
$guild_id = $_SESSION['tokenforserver'];

$guild_detail_sql = "SELECT * FROM `guilds` WHERE guildId = $guild_id";
$guild_detail_result = $con->query($guild_detail_sql);
    if ($guild_detail_result->num_rows > 0) {
    while ($guild_detail_row = $guild_detail_result->fetch_assoc()) {
        $guild_prefix = (string)$guild_detail_row['prefix'];
        $guild_welcomechannel = $guild_detail_row['welcomechannel'];
        $guild_defaultrole = $guild_detail_row['defaultrole'];
        $guild_rolenormal = $guild_detail_row['rolenormal'];
        $guild_rolemute = $guild_detail_row['rolemute'];
        $guild_rulesid = $guild_detail_row['rulesid'];
        $guild_chatchannelId = $guild_detail_row['chatchannelId'];


    }
}
else{
  
    $guild_welcomechannel = $array['guild']['system_channel_id'];
    $new_guild = "INSERT INTO `guilds`(`welcomechannel`, `defaultrole`, `guildId`, `chatchannelId`, `rolenormal`, `rolemute`, `rulesid`, `prefix`) VALUES ( '$guild_welcomechannel' ,'','$guild_id','','','','','.' )";
    if($con->query($new_guild)){
        $guild_prefix = '.';
        $guild_defaultrole = '';
        $guild_rolenormal = '';
        $guild_rolemute = '';
        $guild_rulesid = '';
        $guild_defaultrolename = '';
    }
}

$spam_sql = "SELECT * FROM `spam` WHERE guildId = $guild_id";
$spam_result = $con->query($spam_sql);
if ($spam_result->num_rows > 0) {
    while ($spam_row = $spam_result->fetch_assoc()) {
        $spam_lmt = $spam_row['lmt'];
        $spam_time = $spam_row['time'];
        $spam_diff = $spam_row['diff'];
    
        $pamsec = $spam_time/1000;
        $spamhr = (int)($pamsec/3600);
        $spamin = (int)((($pamsec/3600)-$spamhr)*60);
        $spamsec = round($pamsec - (3600*$spamhr)-($spamin*60));
    }
}
else{

    $span_fill = "INSERT INTO `spam`(`guildId`, `lmt`, `time`, `diff`) 
    VALUES ('$guild_id' ,'5','7000','100000') ";
    if($con->query($span_fill)){
        $spam_lmt = '5';
        $spam_time = '7000';
        $pamsec = $spam_time/1000;
        $spamhr = (int)($pamsec/3600);
        $spamin = (int)((($pamsec/3600)-$spamhr)*60);
        $spamsec = round($pamsec - (3600*$spamhr)-($spamin*60));
        $spam_diff = '100000';
    }
}

$mute_sql = "SELECT * FROM `guildmutelevel` WHERE guild = $guild_id";
$mute_result = $con->query($mute_sql);
if ($mute_result->num_rows > 0) {
    while ($mute_row = $mute_result->fetch_assoc()) {
        $mute_lmt = $mute_row['lmt'];
        $mute_time = $mute_row['time'];
        $mute_action= $mute_row['action'];
        $pamsec = $mute_time/1000;
        $mutehr = (int)($pamsec/3600);
        $mutein = (int)((($pamsec/3600)-$mutehr)*60);
        $mutesec = round($pamsec - (3600*$mutehr)-($mutein*60));
    }
}
else{

    $span_fill = "INSERT INTO `guildmutelevel`(`guild`, `lmt`, `time`,`action`) 
    VALUES ('$guild_id' ,'5','7000','') ";
    if($con->query($span_fill)){
        $mute_lmt = '5';
        $mute_time = '7000';
        $mute_action = '';
        $pamsec = $mute_time/1000;
        $mutehr = (int)($pamsec/3600);
        $mutein = (int)((($pamsec/3600)-$mutehr)*60);
        $mutesec = round($pamsec - (3600*$mutehr)-($mutein*60));
    }
}



$customcmndsql = "SELECT  * FROM customcmnd WHERE guild = '$guild_id'";
$customcmndresult = $con->query($customcmndsql);
$customcmnddata = [];
    if ($customcmndresult->num_rows > 0) {
    while ($customcmndrow = $customcmndresult->fetch_assoc()) {
        array_push($customcmnddata, $customcmndrow);
    }
} 




?>