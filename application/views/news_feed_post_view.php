<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title></title>
</head>
<body>
	<?php echo validation_errors(); ?>
	<?php echo form_open('news_feed/post_news_feed'); ?>
		<p><label for="topic">Topic<input type="text" name="topic" id="topic"></label></p> 
		<p>เนื้อข่าว<input type="text" name="details" ></p> 
		<p><input type="submit" value="โพส" ></p> 
	<?php echo form_close(); ?>
</body>
</html>