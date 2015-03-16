<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/xxx.css">
	<title></title>
</head>
<body>
<div class="tree">
<?php

$data = array("X"=>1,"y"=>2);
foreach ($data as $key) {
	open();
		echo "<div><img src=''><p>".$key."</p><a>Profile</a></div>";
}

function open(){
	echo"<ul>";
		echo"<li>";
}
?>
</div>

</body>
</html>