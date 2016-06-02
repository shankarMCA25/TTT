<html>

<head>
  
  <link rel="stylesheet" type="text/css" href="css/imgareaselect-default.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.imgareaselect.pack.js"></script>
  
</head>
<body>


	<img id="ladybug" src="nature.jpg" alt="" />

<div>
   <form action="#" method="post" name="formdata" id="formdata">
   
      <input id="x1" type="hidden" name="x1" value="" />
      <input id="y1" type="hidden" name="y1" value="" />
      <input id="x2" type="hidden" name="x2" value="" />
      <input id="y2" type="hidden" name="y2" value="" />
      <input id="width" type="hidden" name="width" value="" />
      <input id="height" type="hidden" name="height" value="" />
	  
      <input type="submit" name="submit" value="Submit" />
   </form>
</div>
 <div>
 
 </div>
  



<script type="text/javascript">
$(document).ready(function () {
    $('#ladybug').imgAreaSelect({
        onSelectEnd: function (img, selection) {
            $('input[name="x1"]').val(selection.x1);
            $('input[name="y1"]').val(selection.y1);
            $('input[name="x2"]').val(selection.x2);
            $('input[name="y2"]').val(selection.y2);  
			$('input[name="width"]').val(selection.width); 			
            $('input[name="height"]').val(selection.height);            
                       
        }
    });
});



</script>

<?php
	if(isset($_POST['submit']))
	{
		
			// Original image
			$original_image = 'nature.jpg';
			$new_image = 'nature1.jpg';
			$image_quality = '95';

			// Get dimensions of the original image
			list( $current_width, $current_height ) = getimagesize( $original_image );

			// Get coordinates x and y on the original image from where we
			// will start cropping the image, the data is taken from the hidden fields of form.
			$x1 = $_POST['x1'];
			$y1 = $_POST['y1'];
			$x2 = $_POST['x2'];
			$y2 = $_POST['y2'];
			$width = $_POST['width'];
			$height = $_POST['height'];     
			//print_r( $_POST ); die;

			// Define the final size of the image here ( cropped image )
			$crop_width = 200;
			$crop_height = 200;
			// Create our small image
			$new = imagecreatetruecolor( $crop_width, $crop_height );
			// Create original image
			$current_image = imagecreatefromjpeg( $original_image );
			// resampling ( actual cropping )
			imagecopyresampled( $new, $current_image, 0, 0, $x1, $y1, $crop_width, $crop_height, $width, $height );
			// this method is used to create our new image
			imagejpeg( $new, $new_image, $image_quality );
				echo '<div class="container" >
					<h3> Cropped Image </h3>
					<p>
						<img id="photo" src="nature1.jpg" alt="Cropped Image" title="Cropped Image" style="width: 200px; height: 200px" />
					</p>
				</div>';
	}
 ?>

</body>
</html>



