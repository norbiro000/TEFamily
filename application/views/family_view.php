<!DOCTYPE html>
<html>
<head>
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
	<?php foreach ($familyData as $row): ?>
	<section>
		<section>
			<img src="<?php echo base_url()."assets/img/students/".$row['member_studentID'];?>.jpg" />
		</section>
		<section>
			<article>
				<p><?php echo $row['member_studentID']; ?></p>
				<p><?php echo $row['member_firstname']." ".$row['member_lastname']; ?></p>
			</article>
			<footer>
				<?php echo anchor('profile/index/'.$row['member_studentID'],'Profile'); ?>
			</footer>
		</section>
	</section>
	<?php endforeach ?>
	<?php foreach ($partnerData as $row): ?>
	<section>
		<section>
			<img src="<?php echo base_url()."assets/img/students/".$row['member_studentID'];?>.jpg" />
		</section>
		<section>
			<article>
				<p><?php echo $row['member_studentID']; ?></p>
				<p><?php echo $row['member_firstname']." ".$row['member_lastname']; ?></p>
			</article>
			<footer>
				<?php echo anchor('profile/index/'.$row['member_studentID'],'Profile'); ?>
			</footer>
		</section>
	</section>
	<?php endforeach ?>
</body>
</html>