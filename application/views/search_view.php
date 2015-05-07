<!DOCTYPE html>
<html lang="en" ng-app>
<head>
	<meta charset="UTF-8">
	<title></title>
	<?php $onclick = array('onclick'=>"return confirm('Are you sure?')");?>

	<script>
		$(document).ready(function(){
			$('#tbnews').hide();
			$('#tbwork').hide();
	        $('input:radio').on('change', function(){
	        	if($(this).attr("value")=="member"){
	        		$('table').hide();
	        		$('#tbmember').show();
	        	}

	        	if($(this).attr("value")=="news"){
	        		$('table').hide();
	        		$('#tbnews').show();
	        	}

	        	if($(this).attr("value")=="work"){
	        		$('table').hide();
	        		$('#tbwork').show();
	        	}
	        });
	    });


	</script>
</head>
<body>
<div ng-init='listMember = <?php echo json_encode($dataMember); ?>'></div>
<div ng-init='listNews = <?php echo json_encode($dataNews); ?>'></div>
<div ng-init='listTimelines = <?php echo json_encode($dataTimeline); ?>'></div>
	<div id="member_edit_container">
		<div class="ui segment teal">
		<h4>Search</h4>
		<div>
		<div class="ui segment">
			<form class="ui form fluid" name="search">
				<div class="ui input teal icon">
					<input class="ui inverted black" ng-model="querySearch" placeholder="Search">
					<i class="ui search icon"></i>
				</div>
				 <div class="grouped inline fields">
				      <div class="field">
				        <div class="ui radio checkbox">
				          <input class="Search" name="find" checked="checked" type="radio" value="member">
				          <label>Find Students</label>
				        </div>
				      </div>
				      <div class="field">
				        <div class="ui radio checkbox">
				          <input class="Search" name="find" type="radio" value="news">
				          <label>Find News</label>
				        </div>
				      </div>
				      <div class="field">
				        <div class="ui radio checkbox">
				          <input class="Search" name="find" type="radio" value="work">
				          <label>Find Works</label>
				        </div>
				      </div>
				  </div>
			</form>
		</div>
		<table class="ui table" id="tbmember">
			<thead>
				<th>Student ID</th>
				<th>Username</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Major</th>
			</thead>
			<tbody>
				<tr ng-repeat="l in listMember | filter:querySearch">
					<td>{{ l.member_studentID }}</td>
					<td>{{ l.member_username }}</td>
					<td>{{ l.member_firstname }}</td>
					<td>{{ l.member_lastname }}</td>
					<td>{{ l.member_major }}</td>
				</tr>
			</tbody>
		</table>
		<table class="ui table"  id="tbnews">
			<thead>
				<th>News ID</th>
				<th>Topic</th>
	
			</thead>
			<tbody>
				<tr ng-repeat="l in listNews | filter:querySearch">
					<td>{{ l.news_newsID }}</td>
					<td>{{ l.news_topic }}</td>
				</tr>
			</tbody>
		</table>

		<table class="ui table"  id="tbwork">
			<thead>
				<th>Name</th>
				<th>Position</th>
				<th>City</th>
				<th>Student ID</th>
			</thead>
			<tbody>
				<tr ng-repeat="l in listTimelines | filter:querySearch">
					<td>{{ l.tl_officename }}</td>
					<td>{{ l.tl_jobs }}</td>
					<td>{{ l.tl_workcity }}</td>
					<td>{{ l.tl_studentid }}</td>
				</tr>
			</tbody>
		</table>

	</div>
	<script type="text/javascript">
		$('.radio.checkbox').checkbox();
	</script>
	<script src="<?php echo base_url()?>assets/js/angular.min.js"></script>
</body>
</html>