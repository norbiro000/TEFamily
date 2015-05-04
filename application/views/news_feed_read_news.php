	
	<h1>News Feed</h1>
	<div id="news_reader_container">
		<div id="news_header">
			<img src="<?php echo asset_url_picprofile()."/".$data[0]['member_studentID']?>.jpg">
			<h1><?php echo($data[0]['news_topic'])?></h1>
		</div>
		<div id="news_body">
			<p><?php echo($data[0]['news_details'])?></p>
		</div>
		<div id="news_footer">
			<div id="news_datetimepost"><b>Date</b> <?php echo($data[0]['news_createdate'])?></div>
			<div id="news_author"><b>Author</b> <?php echo $data[0]['member_firstname'].'&nbsp'. $data[0]['member_lastname'];?></div>
			<?php 
				if($data[0]['news_editdate']!=null){
					echo "<div id='news_editdate'><b>Edit</b> ".$data[0]['news_editdate']."</div>";
					echo "<div id='news_editby'><b>Edit by</b> ".$data[0]['news_editby']."</div>";
				}
			?>
		</div> 
	</div>