<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/xxx.css">
	<title></title>
	<meta charset="UTF-8">
	<script type="text/javascript" language="javascript">
	   	$(document).ready(function() {
			$("img").error(function () {
			 $(this).unbind("error").attr("src", "<?php echo base_url(); ?>assets/img/students/null.jpg");
			});
		});
	</script>
</head>
<body>
<div class="tree">
	<ul>
	  <li>
	    <a><header>Family Tree</header></a>
	    	<ul>

<?php 
$familyData2 = array($familyData);
$ulli=1;
$li=1;
$current=99;
$last_key = end(array_values(($familyData2)));
foreach ($familyData2 as $key => $value) {
	$roundClose=0;
	for($i=0;$i<count($value);$i++){
		if($key==$current){
			//ul li
			$li2++;
			openListLIUI();

		}else{
			//li
			$ulli++;
			openListLI();
		}
		
		echo "<div><img src='".base_url()."assets/img/students/".$value[$i]['member_studentID'].".jpg'><p>".$value[$i]['member_firstname']."</p><a>Profile</a></div>";
		if($last_key==$key){
			echo close($roundClose);
		}

		$current=$key;
		$roundClose++;
	}
}

?>


<?php
//Show 
$ulli=1;
$li=1;
$current=99;
$last_key = end(array_values(($partnerData)));
foreach ($partnerData as $key => $value) {
	$roundClose=0;
	for($i=0;$i<count($value);$i++){
		if($key==$current){
			//ul li
			$li++;
			openListLIUI();

		}else{
			//li
			$ulli++;
			openListLI();
		}
		
		echo "<div><img src='".base_url()."assets/img/students/".$value[$i]['member_studentID'].".jpg'><p>".$value[$i]['member_firstname']."</p><a>Profile</a></div>";
		if($last_key==$key){
			echo close($roundClose);
		}

		$current=$key;
		$roundClose++;
	}
}

function openListLI(){
		echo"<li>";
}

function close($round){
	$close = '';
	for($i=0;$i<$round;$i++){
		$close=$close."</li></ul>";
	}
	return $close."</li>";
}

function openListLIUI(){
	echo"<ul>";
	echo"<li>";
}
?>


</ul>
</div>

</body>
</html>