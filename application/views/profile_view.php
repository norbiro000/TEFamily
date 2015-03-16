<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	 <script src="<?php echo base_url()?>assets/js/jquery.js"></script> 
	<title></title>
		<script type="text/javascript" language="javascript">
	   	$(document).ready(function() {
			$("img").error(function () {
			 $(this).unbind("error").attr("src", "<?php echo base_url(); ?>assets/img/students/null.jpg");
			});
		});
	   </script>
	   <link href="<?php echo base_url(); ?>assets/css/profile.css" rel="stylesheet">
</head>
<body>
	<div id='profile_container' class="">
		<section id="profile">
		<header><h1 id="title">Student Profile</h1></header>
			<img src="<?php echo base_url()?>assets/img/students/<?php echo $data[0]['member_studentID']; ?>.jpg">
			<article id="article1">
				<header><h4>TE Informations.</h4></header>
				<div class="content">
					<ul>
						<li><b>Student ID : </b><?php echo $data[0]['member_studentID']; ?></li>
						<li><b>Name : </b><?php echo $data[0]['member_firstname']." ".$data[0]['member_lastname']; ?></li>
						<li><b>Nickname : </b><?php echo $data[0]['member_nickname']; ?></li>
						<li><b>Major : </b><?php echo $data[0]['member_major']; ?></li>
					</ul>
				</div>
			</article>

			<article class="article2">
				<header><h4>Personal Informations.</h4></header>
				<div class="content">
					<ul>
						<li><b>Telephone Number : </b><?php echo $data[0]['member_telephone']; ?></li>
						<li><b>Email : </b><?php echo $data[0]['member_email']; ?></li>
						<li><b>Address : </b><?php echo $data[0]['member_address']; ?></li>
						<li><b>Facebook : </b><?php echo $data[0]['member_facebook']; ?></li>
					</ul>
				</div>
			</article>

			<article class="article2">
				<header><h3>Work Informations.</h3></header>
					<?php foreach ($data as $row):?>
					<div class="content content-repet">
						<ul>
							<li><b>Name : </b><?php echo $row['tl_officename'] ?></li>
							<li><b>Address : </b><?php echo $row['tl_officename'] ?></li>
							<li><b>Telephone : </b><?php echo $row['tl_officetelnumber'] ?></li>
							<li><b>Jobs : </b><?php echo $row['tl_jobs'] ?></li>
							<li><b>Date : </b><?php echo $row['tl_datetime'] ?></li>
						</ul>
					</div>
					<?php endforeach ?>
			</article>
		</section>
	</div>
</body>
</html>