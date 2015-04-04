<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 
{
	$login =  is_logged_in();
	if(is_logged_in()==true){?>
	<!--logged in menu -->
		<?php if(getUserType()==='admin'){?>
			<nav id="cssmenu">
				<ul>
					<li><a href="<?php echo base_url()?>index.php">Home</a></li>
					<li><a href="<?php echo base_url()?>index.php/profile">Profile</a></li>
					<li><a href="<?php echo base_url()?>index.php/news_feed">News Feed</a></li>
					<li><a href="<?php echo base_url()?>index.php/member_management">Member Management</a></li>
					<li><a href="<?php echo base_url()?>index.php/user_authentication/logout">Logout</a></li>
				</ul>
			</nav>
		<?php }else{ ?>
			<nav id="cssmenu">
				<ul>
					<li><a href="<?php echo base_url()?>index.php/profile">Home</a></li>
					<li><a href="<?php echo base_url()?>index.php/news_feed">News Feed</a></li>
					<li><a href="<?php echo base_url()?>index.php/family">My Family</a></li>
					<li><a href="<?php echo base_url()?>index.php/user_authentication/logout">Logout</a></li>
				</ul>
			</nav>
		<?php } ?>
<?php 
	}else{ 
?>
	<!--not login menu -->
	<nav id="cssmenu">
		<ul>
		<li><a href="<?php echo base_url()?>index.php">Home</a></li>
		<li><a href="<?php echo base_url()?>index.php/news_feed">News Feed</a></li>
		<li><a href="<?php echo base_url()?>index.php/user_authentication/">Login</a></li>
		</ul>
	</nav>	
<?php
	}
} 
?>
</body>
</html>