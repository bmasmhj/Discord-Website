<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sudo  </title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<?php
require __DIR__ . "/includes/functions.php";
require __DIR__ . "/includes/discord.php";
require __DIR__ . "/config.php"; ?>
<body>
   <div class="container">
        <div class="nav-menu mt-4">
        <div class="title">
            <a href='../Website' class='text-white text-decoration-none'>Sudo</a>
        </div>
        <div class="float-end mt-3">
            <ul class="nav">
                  <li class="nav-links">
                    <a href="javascript:void()">Support Server</a>
                  </li>
                  <li class="nav-links">
                    <a href="Tutorial">Tutorials</a>
                  </li>
                  <li class="nav-links">
                    <a href="Blog">Blog</a>
                  </li>
                <?php
            			$auth_url = "https://discord.com/api/oauth2/authorize?client_id=930471913057308693&permissions=8&redirect_uri=http%3A%2F%2Flocalhost%2FSudo%2FWebsite%2Fincludes%2Flogin.php&response_type=code&scope=identify%20bot%20applications.commands";
                  $login_url = url($client_id , $redirect_url , $scopes2);
            			if (isset($_SESSION['user'])) {
            				echo '
                    <li class="nav-links">
                    <a href="SelectServer">Dashboard</a></li>
                    <li><a href="includes/logout.php"><button class="log-in btn-rounded">LOGOUT</button></a></li>';
            			} else {
            				echo "<li><a href='".$login_url."'><button class='log-in btn-rounded'>LOGIN</button></a></li>";
            			}
            			?>
            </ul>
        </div>
        </div>
   </div>