	<div id="member_add_container" class="center">
		<?php echo validation_errors() ?>
		<?php echo form_open('member_management/member_add_save',array('id' => 'addnewuser','class' => 'ui form'));?>
		<h1>Member Management</h1>
		<h4 id="add"><a class="ui teal button">Add Member</a></h4>
		<div id="tableadduser">
		

					<label for="studentid">Student ID</label>
					<input type="text" name="studentid">
								
				
					<label for="fname">Firstname</label>
					<input type="text" name="fname">
				
					<label for="lname">Lastname</label>
					<input type="text" name="lname">
				
			
			
				
					<label for="password">Password</label>
					<input type="password" name="password">
				
			
			
				
					<label for="conf-password">Confirm-password : </label>
					<input type="password" name="conf-password">
				
			
			
				<input type="submit" value="Add" class="ui button positive float right">
			
		
		</div>
		<?php echo form_close()?>
	</div>

	<script>
			$(document).ready(function() {


	   		var tableAddUser = {

	   			config: {
	   				effect: 'slideToggle'
	   			},

				init: function() {
					$('#tableadduser').hide();
					$('#add').on('click',this.show);
				},

				show: function() {
					$('#tableadduser').toggle( "slow" ); 
					
				}
	   		}

			tableAddUser.init();

		
			$("#add").click( function() {
	 			$.post( $("#addpartner").attr("action"),
	         	$("#addpartner :input").serializeArray(),
	         		function(info){ $("#result").html(info);
	   			});
				clearInput();	
			});
 
			$("#addpartner").submit( function() {
			  return false;
			});

			function clearInput() {
			    $("#addpartner :input").each( function() {
			       $(this).val('');
			    });
			}




		});
	</script>