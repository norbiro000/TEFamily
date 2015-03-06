<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<div id="news_reader_container">
		<div id="news_header">
			<img src="<?php echo asset_url_picprofile()."/"; 
					if($data[0]['member_picprofile']!=null){
						echo $data[0]['member_picprofile'];
					}else{
						echo 'null';
					}
				?>.jpg">
			<h1><?php echo($data[0]['news_topic'])?></h1>
		</div>
		<div id="news_body">
			<p><?php echo($data[0]['news_details'])?></p>
		</div>
		<div id="news_footer">
			<div id="news_datetimepost">Date <?php echo($data[0]['news_createdate'])?></div>
			<div id="news_author">Author <?php echo $data[0]['member_firstname'].'&nbsp'. $data[0]['member_lastname'];?></div>
			<?php 
				if($data[0]['news_editdate']!=null){
					echo "<div id='news_editdate'>".$data[0]['news_editdate']."</div>";
					echo "<div id='news_editby'>".$data[0]['news_editby']."</div>";
				}
			?>
		</div> 
	</div>
</body>
</html>