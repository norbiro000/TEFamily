
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title></title>
</head>
<body>
<div class="table_news">
	<table border="1">
		<thead>
			<th>หมายเลขข่าว</th>
			<th>หัวข้อ</th>
			<th>ผู้โพส</th>
			<th>เวลาโพส</th>
			<th>ผู้ตอบ</th>
		</thead>
		<tbody>
			<?php foreach($data as $row) {
			?>
				<tr>
					<td><?php echo $row['news_newsID'];?></td>
					<td><?php echo anchor('news_feed/index/'.$row['news_newsID'],$row['news_topic']);?></td>
					<td><?php echo $row['member_firstname'].'&nbsp'. $row['member_lastname'];?></td>
					<td><?php echo $row['news_createdate'];?></td>
					<td><?php echo $row['news_reply'];?></td>
					<?php if($row['member_studentID']=== $viewer['studentid'] || $viewer['usertype']==='admin'){
						echo"<td>".anchor('news_feed/edit_news_feed/'.$row['news_newsID'],'แก้ไข')."</td>";
						echo"<td>".anchor('news_feed/delete_news_feed/'.$row['news_newsID'],'ลบ')."</td>";
					}?>
				</tr>
			<?php }?>
		</tbody>
	</table>
</div>
</html>