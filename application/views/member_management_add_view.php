	<div id="member_add_container" class="center">
		<?php echo validation_errors() ?>
		<?php echo form_open('member_management/member_add_save',array('id' => 'addnewuser'));?>
		<h1>Member Management</h1>
		<h4 id="add"><a>Add Member</a></h4>
		<div id="tableadduser">
		<table class="table">
			<tr>
				<td><label for="studentid">Student ID : </label></td>
				<td><input type="text" name="studentid"></td>
			</tr>
			<tr>
				<td><label for="fname">Firstname : </label></td>
				<td><input type="text" name="fname"></td>
			</tr>
			<tr>
				<td><label for="lname">Lastname : </label></td>
				<td><input type="text" name="lname"></td>
			</tr>
			<tr>
				<td><label for="password">Password : </label></td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td><label for="conf-password">Confirm-password : </label></td>
				<td><input type="password" name="conf-password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Add"></td>
			</tr>
		</table>
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
					$('#tableadduser').fadeToggle( "slow" ); 
					
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