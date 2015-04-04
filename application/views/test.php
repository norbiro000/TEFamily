<!DOCTYPE html>
<html>
<head>
	
	<title></title>
	<meta charset="UTF-8">
</head>
<body>
<div class="tree">
	<ul>
	  <li>
	    <header><h1>Family Tree</h1></header>
	    	<ul>

<?php 
$familyData2 = array($familyData);
$ulli2=1;
$li2=1;
$current2=99;
$last_key2 = end(array_values(($familyData2)));
foreach ($familyData2 as $key => $value) {
	$roundClose=0;
	for($i=0;$i<count($value);$i++){
		if($key==$current2){
			//ul li
			$li2++;
			openListLIUI();

		}else{
			//li
			$ulli2++;
			openListLI();
		}
		
		echo "<div><img src='".base_url()."assets/img/students/".$value[$i]['member_studentID'].".jpg'><p><b>ID</b> :".$value[$i]['member_studentID']."</br><b>Name</b> :".$value[$i]['member_firstname'].' '.$value[$i]['member_lastname']."</p>".anchor('profile/index/'.$value[$i]['member_studentID'],'Profile')."</div>";
	
		if($last_key2==$key){
			echo close($roundClose);
		}

		$current2=$key;
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
		
		echo "<div><img src='".base_url()."assets/img/students/".$value[$i]['member_studentID'].".jpg'><p><b>ID</b> :".$value[$i]['member_studentID']."</br><b>Name</b> :".$value[$i]['member_firstname'].' '.$value[$i]['member_lastname']."</p>".anchor('profile/index/'.$value[$i]['member_studentID'],'Profile')."</div>";
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