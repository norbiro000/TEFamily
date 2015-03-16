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
<?php 

//var_dump($partnerData);
foreach ($partnerData as $key) {
	for($i=0;$i<count($key);$i++)
	echo $key[$i]['member_firstname']."<br/>";
}

//echo count($partnerData);

for($i=0;$i<count($partnerData);$i++){
	for($j=0;$j<count($$key);$j++){
	
}	
}

?>



	<header><h1>Family</h1></header>
	<?php foreach ($familyData as $row): ?>
	<section class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<section class="tile">
			<img src="<?php echo base_url()."assets/img/students/".$row['member_studentID'];?>.jpg" class="" width="100%"/>
			<article>
				<h3 class="tile-title">Information</h3>
				<p>
					Student ID : <?php echo $row['member_studentID']; ?><br/>
					Name :<?php echo $row['member_firstname']." ".$row['member_lastname']; ?>
				</p>
			</article>
			<footer>
				<?php echo anchor('profile/index/'.$row['member_studentID'],'Profile','class="btn btn-primary btn-large btn-block"'); ?>
			</footer>
		</section>
	</section>
	<?php endforeach ?>
	<?php foreach ($partnerData as $row): ?>
	<section class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<section class="tile">
			<img src="<?php echo base_url()."assets/img/students/".$row['member_studentID'];?>.jpg" class="" width="100%"/>
			<article>
				<h3 class="tile-title">Information</h3>
				<p>
					Student ID : <?php echo $row['member_studentID']; ?><br/>
					Name :<?php echo $row['member_firstname']." ".$row['member_lastname']; ?>
				</p>
			</article>
			<footer>
				<?php echo anchor('profile/index/'.$row['member_studentID'],'Profile','class="btn btn-primary btn-large btn-block"'); ?>
			</footer>
		</section>
	</section>
	<?php endforeach ?>
</body>
</html>