

	<script type="text/javascript" language="javascript">
	   	$(document).ready(function() {
	   		$('html').addClass('js');

	   		$('#partnername').on('input', function(){
	   			formSubmit.validate();
	   			console.log(formSubmit.bool);
	   		});

	   		var formSubmit = {
	   			bool: false,
	   			validate: function() {
					var partnername = document.getElementById('partnername').value;
								if(partnername.length == 3){
						    		if($.isNumeric(partnername)){
						    			$('#partnerfield').removeClass('error');
						    			this.bool = true;
						    		}
						    	}else{
						    		$('#partnerfield').addClass('error');
						    		this.bool = false;
						    	}
				}
	   		};

	   		var partnerForm = {

	   			config: {
	   				effect: 'slideToggle'
	   			},

				container:  $('.tree'),

				init2: function() {
					$('<a></a>', {
						text: 'Partner'
					})
						.insertAfter('.tree')
						.on('click', this.show);
				},

				show: function() {
					$('.partnerForm').toggle('fast');
				},

				showDialog: function(){
					$('.ui.modal').modal({
						    closable  : false,
						    onDeny    : function(){
						     	return false;
						    },
						    onApprove : function() {
						    	if(formSubmit.bool == true){
						    		alert(true);
						    		validationpassed();
						    		return true;
						    	}	
						    	return false;
						    }
						  })
					.modal('show');
				},

				init: function(){
					partnerForm.init2(),
					$('.addnew').on('click', this.showDialog),
					url = '',
					base_url = "<?php echo base_url();?>",
					tail_url = "index.php/family/getPartnerListJSON",
					url = String.concat(base_url,tail_url),

					$('.dropdown')
					  .dropdown('setting', 'transition', 'vertical flip')
					  .popup('setting', 'content', 'Select your gender'),
					
					$.getJSON(url, {}, function(data){
						$.each( data, function(i) {
						  $("#result ul").append("<li>"+data[i].take_partner+" <a href='<?php echo base_url()?>index.php/family/deletetake/"+data[i].take_id+"'>x</a></li>");
						});

					});
				}
	   		}

			partnerForm.init();
			//partnerForm.loadd();

		/*	var partnerList = {
					loadd: function(){
					$.ajax({
						type: "POST",
			            url: "<?php echo base_url(); ?>index.php/family/getPartnerListJSON",          
			            dataType: "json",   //expect html to be returned                
			            success: function(response){                    
			            	console.log('response');
			            }
					});
				}
			}*/
			// validation 
		
		

			


			function validationpassed() {

		    // Multiple instances may have been bound to the form, only submit one.
		    // This is a workaround and not ideal. 
		    // Improvements welcomed. 
		    $.post( $("#addpartner").attr("action"),
	         	$("#addpartner :input").serializeArray(),
	         		function(info){ $("#result").html(info);

	   			});
				clearInput();
		    	
			}
 
			$("#addpartner").submit( function(event) {
			  return false;
			});

			function clearInput() {
			    $("#addpartner :input").each( function() {
			       $(this).val('');
			       
			    });
			}

		});


	</script>
	
	
<body>
<div class="container">
<div class="tree">
	<ul>
	  <li>
	    <header><h1>Family Tree</h1></header>
	    	<ul>
<?php 
/*
$familyData2 = array($familyData);
$ulli2=1;
$li2=1;
$current2=99;
$last_key2 = end(array_values(($familyData2)));
foreach ($familyData2 as $key => $value) {
	$roundClose=0;
	for($i=0;$i<count($value);$i++){
		if($key==$current2){
			//ul li
			$li2++;
			openListLIUI();

		}else{
			//li
			$ulli2++;
			openListLI();
		}
		
		echo "<div><img src='".base_url()."assets/img/students/".$value[$i]['member_studentID'].".jpg'><p><b>ID</b> :".$value[$i]['member_studentID']."</br><b>Name</b> :".$value[$i]['member_firstname'].' '.$value[$i]['member_lastname']."</p>".anchor('profile/index/'.$value[$i]['member_studentID'],'Profile')."</div>";
	
		if($last_key2==$key){
			echo close($roundClose);
		}

		$current2=$key;
		$roundClose++;
	}
}
*/
//Show 



$ulli=1;
$li=1;
$current=99;
$last_key = end(array_values(($partnerData)));
$roundClose=0;
foreach ($partnerData as $key => $value) {
	for($i=0;$i<count($value);$i++){
		if($key==$current){
			//for new member of family
			$li++;
			openListLIUI();


		}else{
			//for new family
			if($roundClose==1){
				echo "</li>";
			}else{
				echo close($roundClose);
			}
			$roundClose=0;


			$ulli++;
			openListLI();
			
		}

		echo "<div><img src='".base_url()."assets/img/students/".$value[$i]['member_studentID'].".jpg'><p><b>ID</b> :".$value[$i]['member_studentID']."</br><b>Name</b> :".$value[$i]['member_firstname'].' '.$value[$i]['member_lastname']."</p>".anchor('profile/index/'.$value[$i]['member_studentID'],'Profile')."</div>";

		
		$current=$key;
		$roundClose++;
	}
}


function openListLI(){
		echo"<li>";
}

function close($round){
	$close = '';
	for($i=0;$i<$round;$i++){
		if($i==$round-1){
			$close=$close."</li>";
		}else{
			$close=$close."</li></ul>";
		}
		
	}
	return $close."";
}

function openListLIUI(){
	echo"<ul>";
	echo"<li>";
}
?>


</ul>
</div>
<div class="partnerForm">
<a class="addnew">Add</a>


<div class="ui small modal">
  <i class="close icon"></i>
  <div class="header">
    Add partner
  </div>
  <div class="content">
    <div class="description">
      <div class="ui header">Please insert family name.</div>
      
      <form method="post" action="<?php echo base_url() ?>index.php/partner/add" id="addpartner" action="" class="ui form error">
		<div class="one fields">
			<div class="field">
				<label>Major</label>
				<select name="major" class="ui dropdown">
					<option value="E-biz">E-biz</option>
					<option value="ETM">ETM</option>
					<option value="GEO">GEO</option>
					<option value="IT">IT</option>
					<option value="SE">SE</option>
				</select>
			</div>
			<div class="field" id="partnerfield">
				<label>Last 3 ID</label>
				<div class="ui input">
				  <input type="number" placeholder="example : 065" name="partnername" id="partnername" class="error"/>
				</div>
			</div>
		</div>

	
    </div>
  </div>
   <div class="actions">
    <div class="ui black button">
      Cancle
    </div>
    <input type="submit" class="ui positive submit button" value="Submit">
  </div>
</div>
</form>

<span id="result">
	<ul>

	</ul>
</span>
</div>
