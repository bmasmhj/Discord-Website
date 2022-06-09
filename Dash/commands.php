<?php require 'header.php' ?>

<div class="content">
    <div class="container-fluid">
        <div class="card bg-black text-white">
            <div class="card-body">
            <h3 class="d-inline">Commands
                </h3>

                <hr>
                <p class="text-white">
                <ul>
                    <li><?php echo $guild_prefix ?>help //display all commands</li>
                    <li><?php echo $guild_prefix ?>ping //check your ping</li>
                    <li><?php echo $guild_prefix ?>weather < location ></li>
                    <li><?php echo $guild_prefix ?>stats // status of server</li>
                    <li><?php echo $guild_prefix ?>stats < user_id > | <?php echo $guild_prefix ?>stats @mention // status of member</li>
                    <ul>
                        <li>Fun Commands</li>
                    </ul>
                    <li><?php echo $guild_prefix ?>meme //Memes from reddit</li>
                    <li><?php echo $guild_prefix ?>pokemon < pokemon_name > // Pokemon Details</li>
                    <ul> 
                        <li>Games</li>
                    </ul>
                    <li><?php echo $guild_prefix ?>createpoll < time > < question > //create yes no poll</li>
                    <li><?php echo $guild_prefix ?>rps // Playing Rock Paper Scissors with bot</li>
                    <li><?php echo $guild_prefix ?>tictactoe @mention // play tictactoe with player</li>
                    <ul>Moderation</ul>
                    <li><?php echo $guild_prefix ?>kick @mention Reason.. // Kick user from server and sends private message with reason </li>
                    <li><?php echo $guild_prefix ?>ban @mention Reason.. // Ban user from server and send private message with reason </li>
                    <ul>Custom commands </ul>
                    <ul>Auto Moderation</ul>
                    <li>- Welcome new users</li>
                    <li>- Mute Bad word Users</li>
                    <li>- Spam controller</li>
                </ul>
                </p>
            
            </div>
        </div>
    </div>
</div>

 

<?php require 'footer.php' ?>