<!DOCTYPE html>
<html>
<head>
	 <script src="<?php echo base_url()?>assets/js/jquery.js"></script> 
	<meta charset="UTF-8">
	<title></title>
		<script type="text/javascript" language="javascript">
	   	$(document).ready(function() {
			$("img").error(function () {
			 $(this).unbind("error").attr("src", "<?php echo base_url(); ?>assets/img/students/null.jpg");
			});
		});
	   </script>
</head>
<body>
	<div id='profile_container'>
		<section>
			<img src="<?php echo base_url()?>assets/img/students/<?php echo $data[0]['member_studentID']; ?>.jpg">
			<article>
				<header><h1>TE Informations.</h1></header>
				<ul>
					<li>Student ID : <?php echo $data[0]['member_studentID']; ?></li>
					<li>Name : <?php echo $data[0]['member_firstname']." ".$data[0]['member_lastname']; ?></li>
					<li>Nickname : <?php echo $data[0]['member_nickname']; ?></li>
					<li>Major : <?php echo $data[0]['member_major']; ?></li>
				</ul>
			</article>

			<article>
				<header><h1>Personal Informations.</h1></header>
				<ul>
					<li>Telephone Number : <?php echo $data[0]['member_telephone']; ?></li>
					<li>Email : <?php echo $data[0]['member_email']; ?></li>
					<li>Address : <?php echo $data[0]['member_address']; ?></li>
					<li>Facebook : <?php echo $data[0]['member_facebook']; ?></li>
				</ul>
			</article>

			<article>
				<header><h1>Work Informations.</h1></header>
					<?php foreach ($data as $row):?>
					<ul>
						<li>Name : <?php echo $row['tl_officename'] ?></li>
						<li>Address : <?php echo $row['tl_officename'] ?></li>
						<li>Telephone : <?php echo $row['tl_officetelnumber'] ?></li>
						<li>Jobs : <?php echo $row['tl_jobs'] ?></li>
						<li>Date : <?php echo $row['tl_datetime'] ?></li>
					</ul>
					<?php endforeach ?>
			</article>
		</section>
	</div>



</body>
</html>