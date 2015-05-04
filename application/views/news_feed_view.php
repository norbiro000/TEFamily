

<div class="table_news">
	<table  class="ui five column table segment">
		<thead>
			<th>หมายเลขข่าว</th>
			<th>หัวข้อ</th>
			<th>ผู้โพส</th>
			<th>เวลาโพส</th>
			<th></th>
			<th></th>
		
		</thead>
		<tbody>
			<?php foreach($data as $row) {
			?>
				<tr>
					<td ><?php echo $row['news_newsID'];?></td>
					<td ><?php echo anchor('news_feed/index/'.$row['news_newsID'],$row['news_topic']);?></td>
					<td width="20px"><?php echo $row['member_firstname'].'&nbsp'. $row['member_lastname'];?></pre></td>
					<td ><?php echo $row['news_createdate'];?></td>
					<?php if($row['member_studentID']=== $viewer['studentid'] || $viewer['usertype']==='admin'){
						echo"<td nowrap>".anchor('news_feed/edit_news_feed/'.$row['news_newsID'],'แก้ไข')."</td>";
						echo"<td nowrap>".anchor('news_feed/delete_news_feed/'.$row['news_newsID'],'ลบ')."</td>";
					}?>
				</tr>
			<?php }?>
		</tbody>
	</table>
</div>
