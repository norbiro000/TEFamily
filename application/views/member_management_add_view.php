<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<div id="member_add_container">
		<?php echo validation_errors() ?>
		<?php echo form_open('member_management/member_add_save');?>
			<label for="studentid">Student ID : </label><input type="text" name="studentid">
			<label for="fname">Firstname : </label><input type="text" name="fname">
			<label for="lname">Lastname : </label><input type="text" name="lname">
			<label for="password">Password : </label><input type="password" name="password">
			<label for="conf-password">Confirm-password : </label><input type="password" name="conf-password">
			<input type="submit" value="Add">
		<?php echo form_close()?>
	</div>
</body>
</html>