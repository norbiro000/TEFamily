<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<?php $onclick = array('onclick'=>"return confirm('Are you sure?')");?>
</head>
<body>
	<div id="member_edit_container">
		<table border='1'>
			<thead>
				<th>Student ID</th>
				<th>Username</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Major</th>
				<th></th>
			</thead>
			<tbody>
				<?php

					foreach ($data as $row) {
						echo "<tr>";
						echo "<td>".$row['member_studentID']."</td>";
						echo "<td>".$row['member_username']."</td>";
						echo "<td>".$row['member_firstname']."</td>";
						echo "<td>".$row['member_lastname']."</td>";
						echo "<td>".$row['member_major']."</td>";
						if(getUserType()==="admin"){
							echo "<td>".anchor('member_management/member_edit_edit/'.$row['member_studentID'],'แก้ไข')."</td>";
							echo "<td>".anchor('member_management/member_delete/'.$row['member_studentID'],'ลบ',$onclick)."</td>";
						}
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>