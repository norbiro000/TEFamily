<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	 <script src="<?php echo base_url()?>assets/js/jquery.js"></script> 
	<title></title>
		<script type="text/javascript" language="javascript">
	   	$(document).ready(function() {
			$("img").error(function () {
			 $(this).unbind("error").attr("src", "<?php echo base_url(); ?>assets/img/students/null.jpg");
			});
		});
	   </script>

	   <script>
	   	$(document).ready(function(){
	   		$('#cssmenu').on('click','a', function(){
	   			var link = $(this).attr('href');
	   			window.location.href = link;
	   		});

	   		$('#addeven').on('click', function(){
		   		$('#addwork').slideToggle();
	   		}); 	

	   		var editor = {
	   			init:function( config ){
	   						$('#addwork').hide();
		   					this.bindEvents();

		   					$('.deleteWork').on('click','a',function(){
		   						if(confirm('Are you sure?')==true){
		   							var link = $(this).attr('href');
		   							$.ajax({
		   								url:link,
		   								success:location.reload()
		   							})
		   						}else{

		   						}
		   					});

		   					$('form#addwork').on('submit',function(e){
		   						e.preventDefault();
		   						console.log(this);
								
								postData = $(this).serializeArray(),
    							formURL = $(this).attr("action"),
								$.ajax(
								    {
								        url : formURL,
								        type: "POST",
								        data : postData,
								        success:function(data, textStatus, jqXHR) 
								        {
								            //data: return data from server
								            alert(textStatus);
								            location.reload();
								        },
								        error: function(jqXHR, textStatus, errorThrown) 
								        {
								            //if fails      
								        }
								    });
		   					});
	   					},

	   			bindEvents:function(){
	   					var self = editor;
						$('.editable').hide();
							editing=0;
			   				olddata=0;
		   					usingData=0;
		   					temp=0;
		   			
		   				$('*').on('click','a', function(e) {
		   					e.preventDefault();
		   					

		   					if($(this).is('.edit')){
		   						temp = usingData;
		   						usingData = this;
		   						olddata = temp;
		   						
		   						if(editing==1){
		   							$('.editable').replaceWith(olddata);
		   							editing=0;
		   							
		   						}
		   						editing=1;
								var txt = $(this).html();
								var columName= $(this).data('colum');
								if(txt==null){}
			   					$(this)
			   						.hide()
			   						.replaceWith("<div class='editable ui input' style='margin-bottom:50px;height:50px;'><form ><input value='"+txt+"'  data-colum='"+columName+"'/><button class='ui button positive  submit' id='save'>SAVE</button><button class='ui button negative' id='close'>Cancle</button></form></class>").fadeIn()
		   					}

						});

						$(document).on('click','#save', function(e){
				   			e.preventDefault();
				   			self.save();
				   		});

				   		$(document).on('click','#close', function(e){
				   			e.preventDefault();
				   			$('.editable').replaceWith(usingData);
				   		});
	   			},

	   			save:function(){
	   				var columName = $('.editable input').data('colum');
	   				var data = $('.editable input').val();
	   				url = '',
					base_url = "<?php echo base_url();?>",
					tail_url = "index.php/profile/editprofile",
					url = String.concat(base_url,tail_url),

	   				$.ajax({
					  method: "POST",
					  url: url,
					  data: { colum: columName, data: data }
					})
					  .done(function( msg ) {
					    alert( "Edit Successfully" );
					    location.reload();
					  });
	   			},

	   			close:function(data){
	   				
	   			}
	   		}
	   		editor.init({
	   			
	   		});
	   		
	   	});
	   </script>


<link href="<?php echo base_url(); ?>assets/css/profile.css" rel="stylesheet">
</head>
<body>
	<div id='profile_container'>
		<section id="profile" >
			<header class="sixteen wide column">
				<h1 id="title" class="ui header">Student Profile</h1>
			</header>
			<div class="ui grid sixteen wide column centered segment teal">
				<div class="ui column">
					<img class="ui small circular image setcenter" src="<?php echo base_url()?>assets/img/students/<?php echo $data[0]['member_studentID']; ?>.jpg">
					<article id="article1" class="ui grid centered">
						<div class="ui eight wide column ">
						<!--<header class="setcenter"><h3 class="ui header">TE Informations.</h4></header>-->
							<ul class="setcenter">
								<li><h1></b><?php echo $data[0]['member_studentID']; ?></h1></li>
								<li><b>Name : </b><?php if($data[0]['member_studentID'] == getUserStudentID()){ echo '<a class="edit" data-colum="member_firstname">';}?><?php echo $data[0]['member_firstname']; ?></a><?php if($data[0]['member_studentID'] == getUserStudentID()){ echo '<a class="edit" data-colum="member_lastname">';}?> <?php echo $data[0]['member_lastname']; ?></a></li>
								<li><b>Nickname : </b><?php if($data[0]['member_studentID'] == getUserStudentID()){ echo '<a class="edit" data-colum="member_nickname">';}?><?php echo $data[0]['member_nickname']; ?></a></li>
								<li><b>Major : </b><?php echo $data[0]['member_major']; ?></a></li>
							</ul>
						</div>
					</article>
				</div>
			</div>

			<article class="ui article2 segment grid">
				<div class="ui four wide column">
				<header class="ui header"><h3>Personal Informations.</h3></header>
				</div>

				<div class="ui twelve wide column">
					<ul>
						<li><b>Telephone Number : </b><?php if($data[0]['member_studentID'] == getUserStudentID()){ echo '<a class="edit" data-colum="member_telephone">';}?><?php echo $data[0]['member_telephone']; ?></a></li>
						<li><b>Email : </b><?php if($data[0]['member_studentID'] == getUserStudentID()){ echo '<a class="edit" data-colum="member_email">';}?><?php echo $data[0]['member_email']; ?></a></li>
						<li><b>Address : </b><?php if($data[0]['member_studentID'] == getUserStudentID()){ echo '<a class="edit" data-colum="member_address">';}?><?php echo $data[0]['member_address']; ?></a></li>
						<li><b>Facebook : </b><?php if($data[0]['member_studentID'] == getUserStudentID()){ echo '<a class="edit" data-colum="member_facebook">';}?><?php echo $data[0]['member_facebook']; ?></a></li>
					</ul>
				</div>
				</article>
			</article>

			<article class="ui article2 segment grid">
				<div class="ui four wide column">
				<header>
					<h3>Work Informations.</h3>
				</header>
				</div>
				<div class="ui twelve wide column">
				<?php if($data[0]['tl_id']!="Empty"){ ?>
					<?php 
					foreach ($data as $row):
					?>
						<div class="" style="padding-bottom:10px; margin-bottom:10px; border-bottom:1px solid teal;">
							<?php if($data[0]['member_studentID'] == getUserStudentID()){ ?>
							<div class="deleteWork aligned right" style="float:right;"><a href="<?php echo base_url();?>index.php/profile/deletework?wid=<?php echo $row['tl_id']?>"><i class="ui close icon red"></i></a></div>
							<?php } ?>
							<div class="content content-repet">
								<ul>
									<li><b>Name : </b><?php echo $row['tl_officename'] ?></li>
									<li><b>Address : </b><?php echo $row['tl_officeaddress'] ?></li>
									<li><b>Telephone : </b><?php echo $row['tl_officetelnumber'] ?></li>
									<li><b>Jobs : </b><?php echo $row['tl_jobs'] ?></li>
									<li><b>City : </b><?php echo $row['tl_workcity'] ?></li>
									<li><b>Date : </b><?php echo $row['tl_datetime'] ?></li>
								</ul>
							</div>
						</div>
					<?php endforeach ?>
				</div>
				<?php }else{
					echo "<b>No record</b>";
				} ?>
			</article>
			



			<?php if($data[0]['member_studentID'] == getUserStudentID()){ ?>
			<button class="ui button teal" id="addeven">Add Event</button>

			<article class="ui article2 segment eight wide column row" id="addwork">
					<form id="addwork" method="post" action="<?php echo base_url();?>index.php/profile/addWork">
						<div class=" content ui form">
								<div class="field focus">
									<label>Organization name</label>
									<input name="orgname" placeholder="ABC Dev Coperation." type="text">
								</div>
								<div class="field">
								  <label>Address </label>
								  <input name="address" placeholder="10/2 Kathu Kathu Phuket 83120" type="text">
								</div>
								<div class="field">
								  <label>Telephone </label>
								  <input name="telephone" placeholder="081-2345678" type="text">
								</div>
								<div class="field">
								  <label>Jobs </label>
								  <input name="job" placeholder="Programmer" type="text">
								</div>
								<div class="field">
								  <label>City  </label>
								  <input name="workcity" placeholder="Phuket" type="text">
								</div>
								<div class="field">
								  <label>Date  </label>
								  <input name="date" id="focus" placeholder="date/mouth/year" type="date">
								</div>
								<input type="submit" class="ui button positive right floated" value="Submit">
								<button class="ui button negative ">Close</button>							
						</div>
					</form>
			</article>
			<?php } ?>

		</section>
	</div>
	</body>
</html>