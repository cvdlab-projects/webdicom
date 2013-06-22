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

	<title>Region Selection Border finding v 1.7 - PACE, FARRUGGIO</title>
	<script src="js/pXY.js"></script>
	<script src="js/pxChkr.js"></script>
	<script src="js/pxTrcr.js"></script>
	<script src="js/rAF.js"></script>
	
	<script src="js/html5slider.js"></script>
	<script src="js/region_selection.js"></script>
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
    var imageObj = new Image();
	  
	function changed(){
		drawImage(imageObj);		
	};
	  
    imageObj.src = '<?php print($_POST['dataurl']);?>';
	  
	  
	/*----------------------------------------------------------------------------
	-- UTILS FUNCTION FOR POST THE CANVAS
	----------------------------------------------------------------------------*/
	function showDataURL(){
            var canvas = document.getElementById('myCanvas');
            var context = canvas.getContext('2d'); 
            var dataURL = canvas.toDataURL();
			return dataURL;
        };
		
	function postwith (to,p) {
		  var myForm = document.createElement("form");
		  myForm.method="post" ;
		  myForm.action = to ;
		  var k = 'dataurl';
			var myInput = document.createElement("input") ;
			myInput.setAttribute("name", k) ;
			myInput.setAttribute("value", p);
			myForm.appendChild(myInput) ;
		  document.body.appendChild(myForm) ;
		  myForm.submit() ;
		  document.body.removeChild(myForm) ;
		};
		
		function send_to_segmenter(){
			var url = showDataURL();
			console.log(url);
			postwith('/pace_farruggio/image2segment.php',url);
		}
    </script>
</head>

<body onLoad="changed()">
<!-- header web-lar -->
    <div id="header-wrapper">
        <div id="header">
            <div id="logo">
                <h1><a>REGION</a></h1>
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
			<tr><td>Click on the region you are interested to and Submit it to Segmenter by Clicking on the button "Send to Segmenter". You can select the detail of the recognition by scrolling this bar.</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td align="center">Border Approx.:<br> 1 <input type="range" id="square_width"  value="1" min="1" max="5" step="1" / style="width: 200px;"> 5 <div id="minium">&nbsp;</div></td></tr>
			<tr>
				<td>
					<canvas id="myCanvas" width="1050" height="600"></canvas>
				</td>
			</tr>
			
			
			<tr>
				<td>
					<canvas id="myCanvas_1" width="1050" height="600"></canvas>
				</td>
			</tr><tr><td>&nbsp;</td></tr>
			<tr><td> <input type="button" value="Send to Segmenter" onClick="send_to_segmenter()" style="width: 100%"></td></tr>
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


