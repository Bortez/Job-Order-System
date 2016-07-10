<!DOCTYPE HTML>
<html>
	<head>
	<meta name="viewport" content="width=320; user-scalable=no" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>ColorThief Demo</title>
	
	<script type="text/javascript" charset="utf-8" src="<?php echo base_url('assets/plugins/jquery.min.js'); ?>"></script>
	<script type="text/javascript" charset="utf-8" src="<?php echo base_url('assets/plugins/camera/quantize.js'); ?>"></script>	<script type="text/javascript" charset="utf-8" src="<?php echo base_url('assets/plugins/camera/color-thief.js'); ?>"></script>
        
	<style>
	#yourimage {
		width:100%;	
	}
	
	#swatches {
		width: 100%;
		height: 50px;	
	}

	.swatch {
		width:18%;
		height: 50px;
		border-style:solid;
		border-width:thin;	
		float: left;
		margin-right: 3px;	
	}
	</style>
	</head>

	<body>

		<input type="file" capture="camera" accept="image/*" id="takePictureField">
        
		<img id="yourimage">

		
		
    <script>
	var desiredWidth;

    $(document).ready(function() {
        console.log('onReady');
		$("#takePictureField").on("change",gotPic);
		$("#yourimage").load(getSwatches);
		desiredWidth = window.innerWidth;
        
        if(!("url" in window) && ("webkitURL" in window)) {
            window.URL = window.webkitURL;   
        }
		
	});

	function getSwatches(){
		var colorArr = createPalette($("#yourimage"), 5);
		for (var i = 0; i < Math.min(5, colorArr.length); i++) {
			$("#swatch"+i).css("background-color","rgb("+colorArr[i][0]+","+colorArr[i][1]+","+colorArr[i][2]+")");
			console.log($("#swatch"+i).css("background-color"));
		}
	}	
	
    //Credit: https://www.youtube.com/watch?v=EPYnGFEcis4&feature=youtube_gdata_player
	function gotPic(event) {
        if(event.target.files.length == 1 && 
           event.target.files[0].type.indexOf("image/") == 0) {
            $("#yourimage").attr("src",URL.createObjectURL(event.target.files[0]));
        }
	}
	
	
        
    </script>    
	</body>

</html>
