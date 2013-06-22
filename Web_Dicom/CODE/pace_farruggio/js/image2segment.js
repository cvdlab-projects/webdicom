function drawImage(imageObj) {
		/*----------------------------------------------------------------------------
		-- Initializzation of the Canvas containers, in the first canvas
		-- myCanvas, we print the image, in the second one we can show
		-- the result of the Segmentation
		----------------------------------------------------------------------------*/
        var canvas = document.getElementById('myCanvas');
        var context = canvas.getContext('2d');
		var canvas_1 = document.getElementById('myCanvas_1');
        var context_1 = canvas_1.getContext('2d');
		
        var x = 0;
        var y = 0;
		var w =  imageObj.width;
		var h =  imageObj.height;		
		
        context.drawImage(imageObj, x, y);													//Starting pixels for the processing

        var imageData = context.getImageData(x, y, w, h);					//Creation of a long Array with the informations of every pixel, RGBA are stored sequentially in this array..
		
        var data = imageData.data;
		//context_1.putImageData(imageData, x, y);
		/*----------------------------------------------------------------------------
		-- This function checks if the color is 
		----------------------------------------------------------------------------*/
		function color(x, y) {
	
			var i=(y)*(w*4)+(x*4);
			var b=data[i+2];
			return (b === 150) ? 1 : 0;
		}
		function print_grid_utility(x,y){		
			context.fillStyle = "rgb(200,0,0)";
			context.fillRect(x,y,1,1);	
		}
		
		/*----------------------------------------------------------------------------
		-- This function checks the linear border points of the square and 
		-- gets the color changing with the sub-function "test".
		----------------------------------------------------------------------------*/
		function get_border_points (x0, y0, w, h) {
			  var x;
			  var y;
			  var prev;
			  var current;
			  var points = [];
			  var i;

			  function test (x, y) {															//Subfunction test for getting the color cange.
				current = color(x, y);														//Get the color match of the current pixel (1 or 0).
				if (current !== prev) {														//Check if it matches with the previous one.
				  points.push([x, y]);														//If match, push into points array.
				  prev = current;															//Update the previous with the current.
				}  
			  }
			  
				x = x0;																			//Upper left start to upper right end.
				y = y0;
				prev = color(x, y);
				for (i = 0; i < w; i += 1) {
					x += 1;
					test(x, y);
					print_grid_utility(x,y);
					
				}
			  
				prev = color(x, y);															//Upper right start to lower right end.
				for (i = 0; i < h; i += 1) {
					y += 1;
					test(x, y);
					print_grid_utility(x,y);
				}

				x = x0;																			//Lower left start to lower right end.
				prev = color(x, y);
				for (i = 0; i < w; i += 1) {
					x += 1;
					test(x, y);
					print_grid_utility(x,y);
					
				}

				x = x0;																			//Upper left start to lower left end.
				y = y0;
				prev = color(x, y);
				for (i = 0; i < h; i += 1) {
					y += 1;
					test(x, y);
					print_grid_utility(x,y);
								  
				}
			  return points;																	//Return the array of interception points.
			}
		
		/*----------------------------------------------------------------------------
		-- Function that pushes the segment coordinates into array Points
		----------------------------------------------------------------------------*/
		function get_segments (x0, y0, w, h) {
				var result = [];
				var segments;
				var points = get_border_points(x0, y0, w, h); 
				var ceil = Math.ceil;														//If the square medium point is not even, round it after the split.											
				var floor = Math.floor;														
				var var_w;
				var var_h;
				
																
				var w_f = floor(w/2);
				var w_c = ceil(w/2);
				var h_f = floor(h/2);
				var h_c = ceil(h/2);
				var push = Array.prototype.push;
			
				if (points.length === 0) {													//If the square has no color change points.
					return result;
				}

				if (points.length === 1) {													//If the square has only one color change point (rumor).
					return result;
				} 

				if (points.length === 2) {													//If the square has more than 2 points of interception.
					result.push(points);
					return result;
				}
		
			if(w_f === 1){
			  return result;
			}
			  segments = get_segments(x0, y0, w_f, h_f);
			  push.apply(result, segments);					//Function that adds the array of [x,y] coordinates in [results].
			  //debugger;

			  segments = get_segments(x0 + w_f, y0, w_c, h_f); 
			  push.apply(result, segments);

			  segments = get_segments(x0 + w_f, y0 + h_f, w_c, h_c);
			  push.apply(result, segments);

			  segments = get_segments(x0, y0 + h_f, w_f, h_c);
			  push.apply(result, segments);
			  return result;
			}
		
		
		/*----------------------------------------------------------------------------
		-- Navigate function replicate the square onto all the canvas and 
		-- calls all the scanning functions for check the points.
		----------------------------------------------------------------------------*/
		function navigate (w_d, h_d, w, h) {
		
			  var x = 0;
			  var y = 0;
			  var i = 0;
			  var j = 0;
			  var ni = Math.floor(w / w_d);
			  var nj = Math.floor(h / h_d);
			  var segments;
			  var result = [];

			  for (j = 0; j < nj; j += 1) {
				for (i = 0; i < ni; i += 1) {
				    x = i * (w_d-1);
					y = j * (h_d -1);
					segments = get_segments(x, y, w_d-1, h_d-1);
					Array.prototype.push.apply(result, segments);
				}
			  }
				//console.log(result);
				
			  return result;
			}
						
		/*----------------------------------------------------------------------------
		-- This print function graph all the segment pairs.
		-- We use the function "stroke" by Canvas that graph a line with
		-- a point start and a point end.
		----------------------------------------------------------------------------*/		
		function print_segments (segments) {
			   var i = 0;
			   var n =  segments.length;
			   var segment;
			   var p0;
			   var p1;
			   
				for(i=0; i < n; i++) {
				    segment = segments[i],
					p0 = segment[0];
					p1 = segment[1];
					
					console.log(segment);
					context_1.fillStyle = "rgb(200,0,0)";
					context_1.beginPath();
					context_1.moveTo(p0[0], p0[1]);
					context_1.lineTo(p1[0], p1[1]);
					context_1.stroke();	
				}
			
			}
		
		/*----------------------------------------------------------------------------
		-- Call to MAIN FUNCTION
		----------------------------------------------------------------------------*/
		function segment (w_d, h_d, w, h) {
			//debugger;
			  var segments = navigate(w_d, h_d, w, h);
			  //var result = order_segments(segments);
			  
			print_segments(segments);
				
			var lunghezza = segments.length;
		}
			
		/*----------------------------------------------------------------------------
		-- Function "On Mouse Click"
		----------------------------------------------------------------------------*/
			function getMousePos(canvas, evt) {
				var rect = canvas.getBoundingClientRect();
				return {
				  x: evt.clientX - rect.left,
				  y: evt.clientY - rect.top
				};
			  }
			
			canvas.addEventListener('click', function(evt) {
			var mousePos = getMousePos(canvas, evt);
			var message = 'Mouse position: ' + mousePos.x + ',' + mousePos.y;
			
				var  mini 	= document.getElementById('square_width').value;			  
				segment(mini, mini, imageObj.width, imageObj.height);
			
		}, false);		
      }
	  