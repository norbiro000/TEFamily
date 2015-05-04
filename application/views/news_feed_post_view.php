<div id="post_view" class="">
	<?php echo validation_errors(); ?>
	<?php echo form_open('news_feed/post_news_feed'); ?>
	
		<h4>Post News</h4>
	<div class="ui table">
		<table>
		<tr>
			<td><label for="topic">Topic</label></td>
			<td><div class="ui input"><input type="text" name="topic" id="topic"></div></td> 
		</tr>
		<tr>
			<td>Details</td>
			<td><div class="ui input"><textarea name="details"></textarea></div></td>
		</tr>
		<tr>
		<td></td>
		<td><div class="ui input"><input type="submit" value="โพส" ></div> <td>
		</tr>
		</table>
	</div>
	<?php echo form_close(); ?>
</div>