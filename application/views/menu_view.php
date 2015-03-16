<!DOCTYPE html>
<html>
<head>
	<link href="<?php echo base_url(); ?>assets/css/nav.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/reset.css" rel="stylesheet">

	<script src="<?php echo base_url()?>assets/js/jquery.js"></script> 

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="<?php echo base_url(); ?>assets/css/flat-ui.css" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
	
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