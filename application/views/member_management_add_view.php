<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<div id="member_add_container" class="center">
		<?php echo validation_errors() ?>
		<?php echo form_open('member_management/member_add_save');?>
		<h1>Member Management</h1>
		<h4>Add Member</h4>
		<table class="table"> 
			<tr>
				<td><label for="studentid">Student ID : </label></td>
				<td><input type="text" name="studentid"><td>
			</tr>
			<tr>
				<td><label for="fname">Firstname : </label></td><td><input type="text" name="fname"></td>
			</tr>
			<tr>
				<td><label for="lname">Lastname : </label></td><td><input type="text" name="lname"></td>
			</tr>
			<tr>
				<td><label for="password">Password : </label></td><td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td><label for="conf-password">Confirm-password : </label></td><td><input type="password" name="conf-password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Add"></td>
			</tr>
		</table>
		<?php echo form_close()?>
	</div>
</body>
</html>