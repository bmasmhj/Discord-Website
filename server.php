<?php require 'header.php' ?>
<?php 	if (!isset($_SESSION['user'])) {
	redirect("index.php");
	} ?>

<section class="container">
	<div class="container mt-5">
		<h3 class="text-center text-white fw-bold">Select Server</h3>
		<div class="row p-3">
			<?php
			for ($i = 0; $i < sizeof($_SESSION['guilds']); $i++) {
				if($_SESSION['guilds'][$i]['owner']!= false || $_SESSION['guilds'][$i]['permissions'] == '2147483647' ){
					?>
					<div class=" col-lg-4 p-4 col-md-6 col-sm-12">
						<div class="custom-card bg-none">
							<div class="card-body ldkMOd text-center" >
								<div class="p-3 bLXwom" style="background-image: url('https://cdn.discordapp.com/icons/<?php echo $_SESSION['guilds'][$i]['id'].'/'.$_SESSION['guilds'][$i]['icon'] ?>'); ">
								</div>
								<?php
								if($_SESSION['guilds'][$i]['icon']!= null) { ?>
								<img class="image-det rounded-circle" src="https://cdn.discordapp.com/icons/<?php echo $_SESSION['guilds'][$i]['id'].'/'.$_SESSION['guilds'][$i]['icon'] ?>" />
							<?php }else{ ?>
							<div class="noimage rounded-circle gLbHXr" ><?php echo $_SESSION['guilds'][$i]['name'];?></div>
							<?php }?>
							</div>
							<div class="row p-3">
								<div class="col-md-8">
								<h5 class="text-white"><?php echo $_SESSION['guilds'][$i]['name'];?></h5>
								<?php if($_SESSION['guilds'][$i]['owner']!= false)
									{
											echo ' <h6 class="text-secondary">Owner</h6> ';
									}
										else {
											echo '<h6 class="text-secondary">Bot Master</h6>';
										}
								?>
								</div>
								<div class="col-md-4">
									<?php $array['guild'] = get_guild($_SESSION['guilds'][$i]['id']);
									// print_r($array);
									echo "</pre>";

									if(array_key_exists("message",$array['guild']))
									{
											echo '<a href="'.$auth_url.'" class="btn btn-danger btn-rounded">Setup</a>';
									}
									else{ ?>
										<form action="Dash/index.php" method="post">
											<button  class="btn btn-outline-light btn-rounded" name="serverid"  value="<?php echo $_SESSION['guilds'][$i]['id']?>" type="submit">Dashboard</button>
										</form>
									<?php }
									?>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
			}?>
		</div>
	</div>


</section>

<section class="container">
	<div class="container mt-5">
		<h3 class="text-center text-white fw-bold">Unmanageable Servers</h3>
		<div class="row p-3">
			<?php
			$c=0;
			for ($i = 0; $i < sizeof($_SESSION['guilds']); $i++) {
				if($_SESSION['guilds'][$i]['owner'] == false && $_SESSION['guilds'][$i]['permissions'] != '2147483647' ){
					$c = 1;
					?>
					<div  class=" col-lg-4 p-4 col-md-6 col-sm-12">
						<div class="custom-card bg-none">
							<div class="card-body ldkMOd text-center" >
								<div class="p-3 bLXwom" style="background-image: url('https://cdn.discordapp.com/icons/<?php echo $_SESSION['guilds'][$i]['id'].'/'.$_SESSION['guilds'][$i]['icon'] ?>'); ">
								</div>
								<?php
								if($_SESSION['guilds'][$i]['icon']!= null) { ?>
								<img class="image-det rounded-circle" loading="lazy" src="https://cdn.discordapp.com/icons/<?php echo $_SESSION['guilds'][$i]['id'].'/'.$_SESSION['guilds'][$i]['icon'] ?>" />
							<?php }else{ ?>
							<div class="noimage rounded-circle gLbHXr" ><?php echo $_SESSION['guilds'][$i]['name'];?></div>
							<?php }?>
							</div>
							<div class="row p-3">
							<h5 class="text-white"><?php echo $_SESSION['guilds'][$i]['name'];?></h5>

								
							</div>
						</div>
					</div>
					<?php
				}

				
			}
			if($c==0){
				?>
				<div class="card bg-dark">
					<div class="card-body text-white">
						<h3>There is nothing you can't manage :)</h3>
					</div>
				</div>
				<?php
			}?>
		</div>
	</div>


</section>


</body>

<?php require 'footer.php' ?>
