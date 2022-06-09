<?php
/* Discord Oauth v.4.1
 * This file contains the core functions of the oauth2 script.
 * @author : MarkisDev
 * @copyright : https://markis.dev
 */

# Starting session so we can store all the variables
session_start();

# Setting the base url for API requests
$GLOBALS['base_url'] = "https://discord.com";

# Setting bot token for related requests
$GLOBALS['bot_token'] = "OTMwNDcxOTEzMDU3MzA4Njkz.Yd2Xfw.rr4S8olF9OydrYRdjPwlkZy4c7g";

# A function to generate a random string to be used as state | (protection against CSRF)
function gen_state()
{
    $_SESSION['state'] = bin2hex(openssl_random_pseudo_bytes(12));
    return $_SESSION['state'];
}

# A function to generate oAuth2 URL for logging in
function url($clientid, $redirect, $scope)
{
    $state = gen_state();
    return 'https://discordapp.com/oauth2/authorize?response_type=code&client_id=' . $clientid . '&redirect_uri=' . $redirect . '&scope=' . $scope . "&state=" . $state;
}

function rolename($id){
    $array['guild'] = get_guild($_SESSION['tokenforserver']);
    $roles = $array['guild']['roles'];
    $r = count($roles);
    for($i = 0; $i<$r ; $i++){
        if($roles[$i]['name']!='@everyone'){
            if($roles[$i]['id'] == $id){
                return $roles[$i]['name'];
            }  
        }
    }
}
# A function to initialize and store access token in SESSION to be used for other requests
function init($redirect_url, $client_id, $client_secret, $bot_token = null)
{
    if ($bot_token != null)
        $GLOBALS['bot_token'] = $bot_token;
    $code = $_GET['code'];
    $state = $_GET['state'];
    # Check if $state == $_SESSION['state'] to verify if the login is legit | CHECK THE FUNCTION get_state($state) FOR MORE INFORMATION.
    $url = $GLOBALS['base_url'] . "/api/oauth2/token";
    $data = array(
        "client_id" => $client_id,
        "client_secret" => $client_secret,
        "grant_type" => "authorization_code",
        "code" => $code,
        "redirect_uri" => $redirect_url
    );
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    $results = json_decode($response, true);
    $_SESSION['access_token'] = $results['access_token'];
}

function get_users($id){
    $json_options = [
        "http" => [
          "method" => "GET",
          "header" => "Authorization: Bot ".$GLOBALS['bot_token'].""
        ]
      ];
    $json_context = stream_context_create($json_options);
    $json_get     = file_get_contents('https://discordapp.com/api/guilds/'.$id.'/members?limit=1000', false, $json_context);
    $json_decode  = json_decode($json_get, true);

    return $json_decode;
      
}
function color($c){

    if($c === 0 ){
        return '#000000';
    }

    else if($c === 1752220 ){
        return '#1ABC9C';
    }

    else if($c === 1146986 ){
        return '#11806A';
    }

    else if($c === 3066993 ){
        return '#2ECC71';
    }

    else if($c === 2067276 ){
        return '#1F8B4C';
    }

    else if($c === 3447003 ){
        return '#3498DB';
    }

    else if($c === 2123412 ){
        return '#206694';
    }

    else if($c === 10181046 ){
        return '#9B59B6';
    }

    else if($c === 7419530 ){
        return '#71368A';
    }

    else if($c === 15277667 ){
        return '#E91E63';
    }

    else if($c === 11342935 ){
        return '#AD1457';
    }

    else if($c === 15844367 ){
        return '#F1C40F';
    }

    else if($c === 12745742 ){
        return '#C27C0E';
    }

    else if($c === 15105570 ){
        return '#E67E22';
    }

    else if($c === 11027200 ){
        return '#A84300';
    }

    else if($c === 15158332 ){
        return '#E74C3C';
    }

    else if($c === 10038562 ){
        return '#992D22';
    }

    else if($c === 9807270 ){
        return '#95A5A6';
    }

    else if($c === 9936031 ){
        return '#979C9F';
    }

    else if($c === 8359053 ){
        return '#7F8C8D';
    }

    else if($c === 12370112 ){
        return '#BCC0C0';
    }

    else if($c === 3426654 ){
        return '#34495E';
    }

    else if($c === 2899536 ){
        return '#2C3E50';
    }

    else if($c === 16776960 ){
        return '#FFFF00';
    }else{
        return '#000000';
    }
}

function get_bot($id){

    $allusers = get_users($id);
    $bot = 0;
    foreach($allusers as $key => $userval ){
    if (array_key_exists("bot",$userval['user'])){
        $bot++ ;
    }
    }
    return $bot;

}
function onlineuser($id){
    $array['guild'] = get_guild($_SESSION['tokenforserver']);

    if($array['guild']['widget_enabled'] !=''){

    $jsonIn = file_get_contents('https://discordapp.com/api/guilds/'.$id.'/widget.json');
    
    $JSON = json_decode($jsonIn, true);

    $membersCount = count($JSON['members']);

    return $membersCount;
    }else{
        return false;
    }

}
function offlineuser($id){
    $on = onlineuser($id);

    if($on != false){
        $total = count(get_users($id));
        $off = $total - $on;
        return $off;
    }else{
        return false;
    }
}


# A function to get user information | (identify scope)
function get_user($email = null)
{
    $url = $GLOBALS['base_url'] . "/api/users/@me";
    $headers = array('Content-Type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $_SESSION['access_token']);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($curl);
    curl_close($curl);
    $results = json_decode($response, true);
    $_SESSION['user'] = $results;
    $_SESSION['username'] = $results['username'];
    $_SESSION['discrim'] = $results['discriminator'];
    $_SESSION['user_id'] = $results['id'];
    $_SESSION['user_avatar'] = $results['avatar'];
    # Fetching email
    if ($email == True) {
        $_SESSION['email'] = $results['email'];
    }
}

function role_name($id ,$rid){
    $array['guild'] = get_guild($id);
    $roles = $array['guild']['roles'];
    $r = count($roles);
    for($i = 0; $i<$r ; $i++){
        if($rid === $roles[$i]['id']){
            return $roles[$i]['name'].' ';
        }
    }
}

# A function to get user guilds | (guilds scope)
function get_guilds()
{
    $url = $GLOBALS['base_url'] . "/api/users/@me/guilds";
    $headers = array('Content-Type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $_SESSION['access_token']);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($curl);
    curl_close($curl);
    $results = json_decode($response, true);
    return $results;
}

# A function to fetch information on a single guild | (requires bot token)
function get_guild($id)
{
    $url = $GLOBALS['base_url'] . "/api/guilds/$id";
    $headers = array('Content-Type: application/x-www-form-urlencoded', 'Authorization: Bot ' . $GLOBALS['bot_token']);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($curl);
    curl_close($curl);
    $results = json_decode($response, true);
    return $results;
}

# A function to get user connections | (connections scope)
function get_connections()
{
    $url = $GLOBALS['base_url'] . "/api/users/@me/connections";
    $headers = array('Content-Type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $_SESSION['access_token']);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($curl);
    curl_close($curl);
    $results = json_decode($response, true);
    return $results;
}

# Function to make user join a guild | (guilds.join scope)
# Note : The bot has to be a member of the server with CREATE_INSTANT_INVITE permission.
#        The bot DOES NOT have to be online, just has to be a bot application and has to be a member of the server.
#        This is the basic function with no parameters, you can build on this to give the user a nickname, mute, deafen or assign a role.
function join_guild($guildid)
{
    $data = json_encode(array("access_token" => $_SESSION['access_token']));
    $url = $GLOBALS['base_url'] . "/api/guilds/$guildid/members/" . $_SESSION['user_id'];
    $headers = array('Content-Type: application/json', 'Authorization: Bot ' . $GLOBALS['bot_token']);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    $response = curl_exec($curl);
    curl_close($curl);
    $results = json_decode($response, true);
    return $results;
}

# A function to verify if login is legit
function check_state($state)
{
    if ($state == $_SESSION['state']) {
        return true;
    } else {
        # The login is not valid, so you should probably redirect them back to home page
        return false;
    }
}
