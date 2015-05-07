<div class="ui grid two column">
	<div class="ui ten wide column segment" style="margin-top:35px">
		<div class="ui grid">
		  <div class="ui four wide column circular image ">
		    <img src="<?php echo asset_url_picprofile()."/".$data[0]['member_studentID']?>.jpg">
		  </div>
		  <div class="ui ten wide column content" style="margin-top:30px;">
		    <a class="header"><h1><?php echo($data[0]['news_topic'])?></h1></a>
		    <div class="meta">
		      <span class="date"><i class="edit icon"></i><?php echo($data[0]['news_createdate'])?></span>
		    </div>
		    <div class="extra content">
		    
		      <?php 
						if($data[0]['news_editdate']!=null){
							echo "<div id='news_editdate'><b>Edit</b> ".$data[0]['news_editdate']."</div>";
							echo "<div id='news_editby'><b>Edit by</b> ".$data[0]['news_editby']."</div>";
						}
				?>
		    
			</div>
		  </div>

		  <div class="description ui sixteen wide column ">
		  		<?php echo($data[0]['news_details'])?>
		  </div>
	</div>
</div>
