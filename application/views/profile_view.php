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
	   		var editor = {
	   				init:function(){
	   				editing = 0;
	   				olddata = 0;
	   				newdata = 0;
	   				temp = 0;
	   				$('*').on('click','a', function(e) {
	   					e.preventDefault();
	   					
	   					//$(this).hide();

	   					if($(this).is('.edit')){
	   						temp = newdata;
	   						newdata = this;
	   						olddata = temp;
	   						
	   						if(editing==1){
	   							$('.editable').replaceWith(olddata);
	   							editing=0;
	   						}
	   						editing=1;
							var txt = $(this).html();
		   					$(this)
		   						.replaceWith("<div class='editable' height='30px'><input value='"+txt+"' /><button>SAVE</button><button>Cancle</button></class>")
	   					}

	   					/*var editing = 'false';
	   					var txt = $(".edit").html();
						var html = '<a id="edit"/>'+txt+'</a>';
	   					if($(e.target).is(".edit")){
	   						$(.edit").insertAfter("<input value='"+txt+"' id='editable'/> ");
	   						$(.edit").hide();
	   					}else{
	   						//$(.editable").replaceWith($(e.target).html(html));
	   					}*/

					});
	   			},

	   			edit:function(){
	   				
	   			},

	   			close:function(){
	   				
	   			}
	   		}
	   		editor.init();
	   		
	   	});
	   </script>
	   <link href="<?php echo base_url(); ?>assets/css/profile.css" rel="stylesheet">
</head>
<body>
	<div id='profile_container' class="">
		<section id="profile">
		<header><h1 id="title">Student Profile</h1></header>
			<img src="<?php echo base_url()?>assets/img/students/<?php echo $data[0]['member_studentID']; ?>.jpg">
			<article id="article1">
				<header><h4>TE Informations.</h4></header>
				<div class="content">
					<ul>
						<li><b>Student ID : </b><?php echo $data[0]['member_studentID']; ?></li>
						<li><b>Name : </b><a class="edit"><?php echo $data[0]['member_firstname']; ?></a><a class='edit'> <?php echo $data[0]['member_lastname']; ?></a></li>
						<li><b>Nickname : </b><a class="edit"><?php echo $data[0]['member_nickname']; ?></a></li>
						<li><b>Major : </b><?php echo $data[0]['member_major']; ?></a></li>
					</ul>
				</div>
			</article>

			<article class="article2">
				<header><h4>Personal Informations.</h4></header>
				<div class="content">
					<ul>
						<li><b>Telephone Number : </b><?php echo $data[0]['member_telephone']; ?></li>
						<li><b>Email : </b><?php echo $data[0]['member_email']; ?></li>
						<li><b>Address : </b><?php echo $data[0]['member_address']; ?></li>
						<li><b>Facebook : </b><?php echo $data[0]['member_facebook']; ?></li>
					</ul>
				</div>
			</article>

			<article class="article2">
				<header><h3>Work Informations.</h3></header>
					<?php foreach ($data as $row):?>
					<div class="content content-repet">
						<ul>
							<li><b>Name : </b><?php echo $row['tl_officename'] ?></li>
							<li><b>Address : </b><?php echo $row['tl_officename'] ?></li>
							<li><b>Telephone : </b><?php echo $row['tl_officetelnumber'] ?></li>
							<li><b>Jobs : </b><?php echo $row['tl_jobs'] ?></li>
							<li><b>Date : </b><?php echo $row['tl_datetime'] ?></li>
						</ul>
					</div>
					<?php endforeach ?>
			</article>
		</section>
	</div>
</body>
</html>