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

	<title>Image2Segment v 2.1 - PACE, FARRUGGIO</title>
	<script src="js/html5slider.js"></script>
	<script src="js/image2segment_white.js"></script>
	<script>
	
    /*----------------------------------------------------------------------------
	-- This function gets the scrollbar value of the square width
	----------------------------------------------------------------------------*/
	onload = function() {
	  var $ = function(id) { return document.getElementById(id); };
	  $('square_width').oninput = function() { $('minium').innerHTML = this.value; };
	  $('square_width').oninput();
	};  
	  
    /*----------------------------------------------------------------------------
	-- Image canvas CALL.
	----------------------------------------------------------------------------*/
    var imageObj = new Image();	  												//Declaration of new Image Object in JS Canvas.
	
	function changed(){																//On chage (called in Body OnLoad) makes te Segmentation.
		drawImage(imageObj);
	};
	imageObj.src = '<?php print($_POST['dataurl']);?>';					//This PHP function gets the DataUrl of the previous image area.
    </script>
</head>

<body onLoad="changed()">
<!-- header web-lar -->
    <div id="header-wrapper">
        <div id="header">
            <div id="logo">
                <h1><a>SEGMENTER</a></h1>
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

			<table BORDER="0">
			<tr><td>&nbsp;</td></tr>
			<tr><td>Wellcome to the Direct Image Segmentation, here you can decide the dimension of the square, please click on the Image for start the segmentation. <br>You can see the result of the segmentation on the bottom of the source image. </td></tr>
			<tr><td>&nbsp;</td></tr>
				<tr><td COLSPAN="2" align="center">Square Width: <input type="range" id="square_width"  value="40" min="0" max="200" step="1" / style="width: 100%;" onChange="changed()"><div id="minium">&nbsp;</div><br><br></td></tr>
				<tr><td>&nbsp;</td></tr>
			   <tr>
					<td>
						<canvas id="myCanvas" width="1050" height="600"></canvas>
					</td>
				</tr>
				<tr>
					<td>
						<canvas id="myCanvas_1" width="1050" height="600"></canvas>
					</td>
				</tr>
				</table>

		</div>

	
</div>
</div>
</div>

    <footer class="footer">
        <div id="footer" class="container"></div>
    </footer>
</body>
</html>

