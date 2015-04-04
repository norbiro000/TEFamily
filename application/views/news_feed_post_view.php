<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title></title>
</head>
<body>
<div id="post_view">
	<?php echo validation_errors(); ?>
	<?php echo form_open('news_feed/post_news_feed'); ?>
		<h4>Post News</h4>
		<table>
		<tr>
			<td><label for="topic">Topic</label></td>
			<td><input type="text" name="topic" id="topic"></td> 
		</tr>
		<tr>
			<td>Details</td>
			<td><textarea name="details"></textarea></td>
		</tr>
		<tr>
		<td></td>
		<td><p><input type="submit" value="โพส" ></p> <td>
		</tr>
		</table>
	<?php echo form_close(); ?>
</div>
</body>
</html>