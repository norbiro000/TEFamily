<!DOCTYPE html>
<html>
<head>
 	<script src="<?php echo base_url()?>assets/js/modernizr.js"></script> 
 	<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>
	<title></title>
</head>
<body>
	<div id="search_news_container">
		<?php echo validation_errors() ?>
		<?php echo form_open('search/search_news_validate');?>
			<label for="newsid">News ID:</label><input type="text" name="newsid">
			<label for="newtopic">Topic:</label><input type="text" name="newstopic">
			<label for="newsdetails">Datails:</label><input type="text" name="newsdetails">
			<label for="date">Date :</label>
			<select name="date">
				<option value="" selected="">--Date--</option>
				<?php for($i=1;$i<=31;$i++){?>
					<option value="<?php if(strlen($i)==1){echo "0";} echo $i;?>"><?php echo $i;?></option>
				<?php }?>
			</select>
			<label for="date">Month :</label>
			<select name="month">
				<option value="" selected="">--Month--</option>
				<option value="01">January</option>
				<option value="02">February</option>
				<option value="03">March</option>
				<option value="04">April</option>
				<option value="05">May</option>
				<option value="06">June</option>
				<option value="07">July</option>
				<option value="08">August</option>
				<option value="09">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select>
			<label for="year">Year:</label><input type="date" name="year" />
			<input type="submit" name="submit" value="Search">
		<?php form_close()?>
	</div>	
</body>
</html>