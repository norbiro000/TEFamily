<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<div id="member_edit_edit_container">
		<?php echo validation_errors() ?>
		<?php echo form_open('member_management/member_edit_save');?>

			<label for="studentid">Student ID : </label><input type="text" name="studentid" value="<?php echo set_value('fname',$data[0]['member_studentID']);?>"  disabled >

			<input type="hidden" name="studentidhide" value="<?php echo set_value('fname',$data[0]['member_studentID']);?>" >


			<label for="fname">Username : </label><input type="text" name="username" value="<?php echo set_value('fname',$data[0]['member_username']);?>">

			<label for="fname">Firstname : </label><input type="text" name="fname" value="<?php echo set_value('fname',$data[0]['member_firstname']);?>">

			<label for="lname">Lastname : </label><input type="text" name="lname" value="<?php echo set_value('fname',$data[0]['member_lastname']);?>">

			<label for="nickname">Nickname : </label><input type="text" name="nickname" value="<?php echo set_value('fname',$data[0]['member_nickname']);?>">

			<label for="email">Email : </label><input type="text" name="email" value="<?php echo set_value('fname',$data[0]['member_email']);?>">

		<label for="major">Major : </label>
			<select name="major">
				<option value="E-Biz" selected="selected">E-Biz</option>
				<option value="ETM">ETM</option>
				<option value="GEO">GEO</option>
				<option value="IT">IT</option>
				<option value="SE">SE</option>
			</select>

			<label for="address">Address : </label><input type="text" name="address" value="<?php echo set_value('fname',$data[0]['member_address']);?>">

			<label for="telnumber">Telephone Number : </label><input type="text" name="telnumber" value="<?php echo set_value('fname',$data[0]['member_telephone']);?>">

			<input type="submit" value="Save">
		<?php echo form_close()?>
	</div>
</body>
</html>