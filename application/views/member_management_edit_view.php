<!DOCTYPE html>
<html lang="en" ng-app>
<head>
	<meta charset="UTF-8">
	<title></title>
	<?php $onclick = array('onclick'=>"return confirm('Are you sure?')");?>
</head>
<body>
<div ng-init='lists = <?php echo json_encode($data); ?>'></div>
	<div id="member_edit_container">
		<div class="ui segment teal">
		<h4>Member List</h4>
		<div>
		<div class="ui segment">
			
			<form class="ui form fluid">
				<div class="ui input teal icon">
					<input class="ui inverted black" ng-model="querySearch" placeholder="Search">
					<i class="ui search icon"></i>
				</div>
				
			</form>
		</div>
		<table class="ui table">
			<thead>
				<th>Student ID</th>
				<th>Username</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Major</th>
				<th>Edit</th>
				<th>Delete</th>
			</thead>
			<tbody>
				<tr ng-repeat="l in lists | filter:querySearch">
					<td>{{ l.member_studentID }}</td>
					<td>{{ l.member_username }}</td>
					<td>{{ l.member_firstname }}</td>
					<td>{{ l.member_lastname }}</td>
					<td>{{ l.member_major }}</td>
					<?php
						if(getUserType()==="admin"){
							echo "<td>".anchor('member_management/member_edit_edit/{{ l.member_studentID }}','แก้ไข')."</td>";
							echo "<td>".anchor('member_management/member_delete/{{ l.member_studentID }}','ลบ',$onclick)."</td>";
						}
					?>
				</tr>
				<?php
				/*
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
					*/
				?>
			</tbody>
		</table>
	</div>
	<script src="<?php echo base_url()?>assets/js/angular.min.js"></script>
</body>
</html>