<?php 
session_start();


require 'controller/infofetcher.php';

if(isset($_POST['custm_cmnd_data'])){
foreach($customcmnddata as $key => $customcmnddataval){
    echo '<tr id="cstcmnd_row_'.$customcmnddataval["id"].'">
    <td>'.$guild_prefix.$customcmnddataval['cmnd_name'].'</td>
    <td>'.$customcmnddataval['cmnd_reply'].'</td>
    <td><a href="javascript:deletecmnds('.$customcmnddataval['id'].')" class="material-icons text-danger">delete</a></td>
    </tr>';
    }
}

?>