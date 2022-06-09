<?php 
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);  
?>
<div class="sidebar" data-color="purple" data-background-color="black" data-image="https://cdn.discordapp.com/icons/<?php echo $array['guild']['id'].'/'.$array['guild']['icon']?> ">
    <div class="logo text-center">
        <img class="serverimg" src="https://cdn.discordapp.com/icons/<?php echo $array['guild']['id'].'/'.$array['guild']['icon']?> " alt="">
        <h2 class=" simple-text logo-normal">
            <a href="Back" class="d-inline text-white simple-text logo-normal " ><i class="fa-solid fa-rotate-180 fa-arrow-right-from-bracket"></i> Exit</a>
        </h2>
        <!-- <h6 class="text-muted">OWNER</h6> -->
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item <?php  if( 'Dashboard' == $url){ echo" active "; }?>  ">
                <a class="nav-link" href="Dashboard">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item <?php  if( 'Welcome' == $url){ echo" active "; }?> ">
                <a class="nav-link" href="Welcome">
                <i class="material-icons">celebration</i>
                    <p>Welcome Message</p>
                </a>
            </li>
            <li class="nav-item  <?php  if( 'CustomCommand' == $url){ echo" active "; }?> ">
                <a class="nav-link " href="CustomCommand">
                <i class="material-icons">maps_ugc</i>
                    <p>Custom Commands</p>
                </a>
            </li>
            <li class="nav-item   <?php  if( 'Commands' == $url){ echo" active "; }?>">
                <a class="nav-link" href="Commands">
                <i class="material-icons">attractions</i>
                    <p>Commands</p>
                </a>
            </li>
            <li class="nav-item <?php  if( 'Moderator' == $url){ echo" active "; }?> ">
                <a class="nav-link" href="Moderator">
                <i class="material-icons">smart_toy</i>
                    <p>Spam / Moderator</p>
                </a>
            </li>
            <li class="nav-item <?php  if( 'Chatbot' == $url){ echo" active "; }?> ">
                <a class="nav-link" href="Chatbot">
                <i class="material-icons">forum</i>
                    <p>Chaat Bot</p>
                </a>
            </li>
        </ul>
    </div>
</div>