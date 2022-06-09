<?php 

require "usercontroller.php";
$server_id = $_SESSION['tokenforserver'];
$array['guild'] = get_guild($server_id);
require 'controller/infofetcher.php';
?>
<!doctype html>
<html lang="en">

<head>
  <title>Sudo| <?php echo $array['guild']['name'] ?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link href="assets/css/style.css?v=2.1.0" rel="stylesheet" />

</head>
<body id="body" class="dark-edition">
  <div class="wrapper ">
   <?php require 'model/nav.php' ?>
    <div class="main-panel">
      <?php require 'model/topnav.php' ?>