<!DOCTYPE html>
<html>
<head>
	<title>Fuck</title>
</head>
<body>


<?php 
{
	$login =  is_logged_in();
	if(is_logged_in()==true){?>
	<!--logged in menu -->
		<?php if(getUserType()==='admin'){?>
			<nav>
				<a href="<?php echo base_url()?>index.php">Home</a>
				<a href="<?php echo base_url()?>index.php/profile">Profile</a>
				<a href="<?php echo base_url()?>index.php/news_feed">News Feed</a>
				<a href="<?php echo base_url()?>index.php/news_feed">Admin Board</a>
				<a href="<?php echo base_url()?>index.php/user_authentication/logout">Logut</a>
			</nav>
		<?php }else{ ?>
			<nav>
				<a href="<?php echo base_url()?>index.php/profile">Home</a>
				<a href="<?php echo base_url()?>index.php/news_feed">News Feed</a>
				<a href="<?php echo base_url()?>index.php/news_feed">My Family</a>
				<a href="<?php echo base_url()?>index.php/user_authentication/logout">Logut</a>
			</nav>
		<?php } ?>
<?php 
	}else{ 
?>
	<!--not login menu -->
	<nav>
		<a href="<?php echo base_url()?>index.php">Home</a>
		<a href="<?php echo base_url()?>index.php/news_feed">News Feed</a>
		<a href="<?php echo base_url()?>index.php/user_authentication/">Login</a>
	</nav>	
<?php
	}
} 
?>
</body>
</html>