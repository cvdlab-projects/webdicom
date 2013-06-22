
<!DOCTYPE HTML>
<html>
<head>

<!--console-->
<link href="../styles/myCss/bootstrap2.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../styles/myCss/custom2.css" rel="stylesheet" type="text/css" media="all" />

<script src="../js/console/codemirror.js"></script>
    <script src="../js/console/console_script.js"></script>

    <!--Javascript and coffeescript modes-->
    <script src="../js/console/javascript.js"></script>
    <script src="../js/console/coffeescript.js"></script>
    <script src="../js/console/loadmode.js"></script>

    <!--Hint-->
    <script src="../js/console/show-hint.js"></script>
    <script src="../js/console/javascript-hint.js"></script>

    <link rel="stylesheet" href="../styles/console_css/codemirror.css">
    <link rel="stylesheet" href="../styles/console_css/console.css">
    <link rel="stylesheet" href="../styles/console_css/show-hint.css">

<!--fine console-->

	<title>3D Coordinates Finding v 1.8 - PACE, FARRUGGIO</title>
	<script src="js/pXY.js"></script>
	<script src="js/pxChkr.js"></script>
	<script src="js/pxTrcr.js"></script>
	<script src="js/rAF.js"></script>
	
	<script src="js/html5slider.js"></script>
	<script src="js/pixastic.core.js"></script>
	<script src="js/actions/invert.js"></script>
	<script src="js/actions/blur.js"></script>
	<script src="js/actions/posterize.js"></script>
	<script src="js/actions/blurfast.js"></script>
	<script src="js/region_selection.js"></script><script>
	/*----------------------------------------------------------------------------
	-- This function gets the scrollbar value of the square width
	----------------------------------------------------------------------------*/
	onload = function() {
	  var $ = function(id) { return document.getElementById(id); };
	  $('numbers_color').oninput = function() { $('minium').innerHTML = this.value; };
	  $('numbers_color').oninput();
	};  

function changed(){			
			  function loadImages(sources, callback) {
				var images = {};
				var loadedImages = 0;
				var numImages = 0;
				// get num of sources
				for(var src in sources) {
				  numImages++;
				}
				for(var src in sources) {
				  images[src] = new Image();
				  images[src].onload = function() {
					if(++loadedImages >= numImages) {
					  callback(images);
					}
				  };
				  images[src].src = sources[src];
				}
			  }
			  var canvas = document.getElementById('myCanvas');
			  var context = canvas.getContext('2d');

			  var sources = {
				<?php
						$origin = $_POST['dataurl']; 
						$url = explode(",", $origin); 
						$counter = count($url);
						$effective_counter = $counter/2;
						
						$k=0;
						for($i = 0; $i < $effective_counter; $i = $i + 2){
							$name = "foto_" . $k . ":";
							echo $name;
							print("'" . $url[$i] . "," . $url[$i+1] . "',\n");
							$k++;
						}			
				?>
			  };

			  function drawImage_func(imageObj,h,target_coo) {				
				var x=0;
				var y=0;
				
				//Creation of a long Array with every pixel.
				
				var numbers = document.getElementById('numbers_color').value;
				imageObj = Pixastic.process(imageObj, "blurfast", {amount:0.5});
				imageObj = Pixastic.process(imageObj, "posterize", {levels: numbers});
				
				context.drawImage(imageObj, 0, 0);
				
				grayscale();
	
				var temp = "";
				var palette_value_1 = document.getElementById('palette1').checked;
				var palette_value_2 = document.getElementById('palette2').checked;
				var palette_value_3 = document.getElementById('palette3').checked;
				if(palette_value_1 == true) temp = "colormap3.png";
				if(palette_value_2 == true) temp = "colormap2.png";
				if(palette_value_3 == true) temp = "colormap1.png";
				recolor(temp,target_coo,h);
				
				var cvs_1 = document.getElementById("myCanvas_1");
				var ctx_1 = cvs_1.getContext("2d");
				var x=0;
				var y=0;
				var imageData =  ctx.getImageData(0, 0, cvs.width, cvs.height);
				var data = imageData.data;
				
			  }
			  
				
			  loadImages(sources, function(images) {
				var target_coo = document.getElementById("dt_coo");
				target_coo.value = "from pyplasm_btn import *\nc = CUBOID([1,1,1]);\na = STRUCT([";
				  <?php
							$origin = $_POST['dataurl']; 
							$url = explode(",", $origin); 
							$counter = count($url);
							$effective_counter = $counter/2;
							
							$k=0;						
							$h_factor = $k;
							for($i = 0; $i < $effective_counter; $i = $i + 2){
								$name = "foto_" . $k;
								echo 'drawImage_func(images.' . $name . ',' . $h_factor .',target_coo);';
								$k = $k + 1;
								$h_factor = $h_factor + 3;
							}			
					?>
				
				//alert("COMPUTAZIONE FINITA");
			
			//var target_coo_2 = document.getElementById("dt_coo");
			//target_coo_2.value += "])\nVIEW(a)";
      });

	//canvas of the image to be colored
	var cvs;
	var ctx;

	//canvas to grab colormap pixels
	var colormap = new Image();
	var colormapCVS = document.createElement("canvas");
	var colormapCTX = colormapCVS.getContext("2d");
	
	function init(){
		cvs = document.getElementById("myCanvas");
		ctx = cvs.getContext("2d");
	
		var img1 = imageObj;
	};
	
	function grayscale(){
		cvs = document.getElementById("myCanvas");
		ctx = cvs.getContext("2d");
		
		//grayscale the image
		var imageData = ctx.getImageData(0, 0, cvs.width, cvs.height);
		var data = imageData.data;

		for(var i = 0; i < data.length; i += 4) {
			var brightness = 0.34 * data[i] + 0.5 * data[i + 1] + 0.16 * data[i + 2];
			//YUV -> PAL/NTSC
			//var brightness = 0.299 * data[i] + 0.587 * data[i + 1] + 0.114 * data[i + 2];
			data[i] = brightness; // red
			data[i + 1] = brightness; // green
			data[i + 2] = brightness; // blue
		}
		ctx.putImageData(imageData,0,0);
	}
	
	function recolor(_src,target_coo,h){
		var data_image;
		//once the colormap is loaded, we grab the pixel content of the canvas
		colormap.onload = function(target_coo){	
			//grab colormap pixels
			colormapCVS.width = colormap.width;
			colormapCVS.height = colormap.height;
			colormapCTX.drawImage(colormap,0,0);
			
			var colormapData = colormapCTX.getImageData(0,0, colormap.width, colormap.height);

			//grab the pixels of the image to colorize
			var myImageData = ctx.getImageData(0,0, cvs.width, cvs.height);
			//faster access
			var dataSrc = myImageData.data;
			var dataRes = myImageData.data;
			var height = cvs.height;
			var width = cvs.width;
			
			//loop on each pixel
			for(var y = 0; y < height; y++){
				for(var x = 0; x < width; x++){
					index = (x + y * width) * 4;
								
					//we grab the color from one channel (the red one)
					var luminosityValue = dataSrc[index+0];

					//we retrieve the corresponding (R,G,B) triplet from the colormap
					//we rewrite the new color
					dataRes[index+0] = colormapData.data[luminosityValue* 4+0]; //R
					dataRes[index+1] = colormapData.data[luminosityValue* 4+1]; //G
					dataRes[index+2] = colormapData.data[luminosityValue* 4+2]; //B
					//dataRes[index+3] = 255; //no need to change alpha value
					
				}
			}
			myImageData.data = dataRes;
			ctx.putImageData(myImageData,0,0);
			data_image = myImageData.data
			
			
			
			var  check_box	= document.getElementById('plasm_btn');
			//alert(cvs.toDataURL());
				var  mini 	= 255;
				
				var h_factor = 3;
				var tallness = h + 2;
				console.log(tallness);
				
				var j = 0;
				var stringa = '';
				for(var i = 0; i < data_image.length; i += 4) {
					//Function for resetting the value of the X-axis every time it touches the max width of the image
					if(j==1050){j=0};
				  
					 // red
					 r = data_image[i]
					 // green
					 g = data_image[i + 1]
					 // blue
					 b = data_image[i + 2]
					 
					 if(r > 5 && g > 5){
						//Make white the out of range
							y_1 = Math.floor(Math.floor(i/1050)/4);
							x_1 = j;
							
							var value_r = 1/255 * r;
							var value_g = 1/255 * g;
							var value_b = 1/255 * b;
							
							value_r = Math.round(value_r*100)/100;
							value_g = Math.round(value_g*100)/100;
							value_b = Math.round(value_b*100)/100;

							
							if(check_box.checked == true){	
							stringa += "T([1,2,3])([" + x_1 + "," + y_1  + "," + tallness + "])(COLOR([" + value_r + "," + value_g + "," + value_b + "])(c)),";
							}
					 } 
					 else{
					}  
					  
					 //Incrementing the value of the axis
					 j++;
				}
				//console.log(stringa);
				target_coo_1 = document.getElementById("dt_coo");
				target_coo_1.value += stringa;
				// overwrite original image
				//console.log(target_coo.value);			
		}	
		colormap.src = _src;
	};
	
	
			}
</script>
</head>

<body onLoad="changed()">
<!-- header web-lar -->
    <div id="header-wrapper">
        <div id="header">
            <div id="logo">
                <h1><a>3D COORD.</a></h1>
            </div>
            <div id="menu">
                <ul>
                    <li><a href="bihomed.html?#home"  title="home">Home</a></li>
                    <li><a id="weblar-link-about" href="#">About</a></li>
                    <li><a id="weblar-link-contact" href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>

<script language=>
function on() {
	$("body").css("overflow","hidden");
}

function out(){
	$("body").css("overflow","auto");
}

</script>

<div class="row-fluid">
<div id="wrapper">
	<div id="page-wrapper">
		<div class="span12" align="center">
		<table BORDER="0" style="width: 1050px">
			<tr><td COLSPAN="2">&nbsp;</td></tr>
				<td>Here you can see the Quantizzed and Denoised image, by applying the FAST BLUR EFFECT for denoising and QUANTIZZATION elaboration of the Source image sample. <br>By scrolling the "<strong>Detail Bar</strong>" you can make a variation of the sampling range dividing the continuum in a number of areas with the same average value of color, luminosity and texture. <br>Checking the "<strong>Palette</strong>" value you can see the quantized image mapped in Rainbow Palette.<br><br>
				Following the <strong>Palettes</strong>, you can find the button for calculate the coordinates (is enabled only for the first palette), if you want the PYPLASM coordinates check on "check if you want the coordinates" and click on the button: <strong>REFRESH PAGE AND CALCULATE COORDINATES</strong></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td align="center">The image you see, is one sample of the images in the array populated before, all the transformations are applied to array elements.</td>
			
			</tr>
			
			</table>
		<table>
			<tr><td COLSPAN="2" align="center">Detail: <input type="range" id="numbers_color"  value="5" min="0" max="10" step="1" / style="width: 100%;" onChange="changed()"><div id="minium">&nbsp;</div><br><br></td></tr>
			<tr><td COLSPAN="2" align="center">Palette: 
				<table>
					<tr><td><input type="radio" id="palette1" name="palette" value="colormap3.png" CHECKED onChange="changed()"/></td><td><img src="colormap3.png" style="width: 500px; height: 15px"></td></tr>
					<tr><td><input type="radio" id="palette2" name="palette" value="colormap2.png" onChange="changed()"/></td><td><img src="colormap2.png" style="width: 500px; height: 15px"></td></tr>
					<tr><td><input type="radio" id="palette3" name="palette" value="colormap1.png" onChange="changed()"/></td><td><img src="colormap1.png" style="width: 500px; height: 15px"></td></tr>
				</table>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td COLSPAN="2" align="center"><input type="button" value="REFRESH PAGE AND CALCULATE COORDINATES" onClick="changed()" class="no-style"> Check if you want the coordinates: <input type="checkbox" name="plasm_btn" id="plasm_btn" value="yes" style=""></td></tr>
		</table>
		<br><br>
		
			<div style="display: "><canvas id="myCanvas" width="1050" height="600"></canvas></div>
			
			<textarea rows="15" id="dt_coo" name="dt_coo" style="width: 90%"></textarea>
		</div>
</div>
</div>
</div>
    <footer class="footer">
        <div id="footer" class="container"></div>
    </footer>
</body>
</html>


