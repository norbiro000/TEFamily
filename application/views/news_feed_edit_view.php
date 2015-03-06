<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title></title>
</head>
<body>

	<?php echo validation_errors(); ?>
	<?php echo form_open('news_feed/edit_news_save_feed'); ?>
	<p>
		<label for="topic">Topic</label>
		<input type="text" name="topic" id="topic" value="<?php echo$data[0]['news_topic'];?>" >
	</p> 
	<p>
		เนื้อข่าว <textarea name="details"><?php echo$data[0]['news_details'];?>
	</textarea></p> 
	<p><input type="submit" value="โพส" ></p> 
	<input type="hidden" name="id" value="<?php echo$data[0]['news_newsID'];?>">
	<?php echo form_close(); ?>
</body>
</html>