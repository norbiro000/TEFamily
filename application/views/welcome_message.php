<style type="text/css">
	

video#bgvid {

position: fixed; right: 0; bottom: 0;

min-width: 100%; min-height: 100%;

width: auto; height: auto; z-index: -100;

background: url(polina.jpg) no-repeat;

background-size: cover;

}

div#middle {

position: fixed; right: 0; bottom: 0;

min-width: 100%; min-height: 100%;

width: auto; height: auto; z-index: -100;

background-color: rgba(0,0,0,0.6) ;

background-size: cover;

}


</style>
<video autoplay loop poster="<?php echo base_url()?>assets/img/logo.jpg" id="bgvid" controls muted>
	<source src="polina.webm" type="video/webm">
	<source src="<?php echo base_url()?>assets/vdo/homevdo.mp4#t=6.5" type="video/mp4">
</video>

<div id="middle"></div>
<script type="text/javascript">
	var vid = document.getElementById("bgvid");
	vid.playbackRate = 0.8;
</script>