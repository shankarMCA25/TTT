<!DOCTYPE html>
<?php include 'header.php';
include 'footer.php' ?>
<html>

		<head>

		  <script type="text/javascript" src="/js/jquery.js"></script>
		  <script type="text/javascript" src="/js/jquery-ui.js"></script>
		  <script type="text/javascript" src="/js/jquery-ui-1.10.4.min.js"></script>
		  <script type="text/javascript" src="/js/ jquery-ui-1.9.2.custom.min.js"></script>
		  
		  
		  <script type="text/javascript">

			$(function() {
			  $( "#crop_div" ).draggable({ containment: "parent" });
			});
		   
			function crop()
			{
			  var posi = document.getElementById('crop_div');
			  document.getElementById("top").value=posi.offsetTop;
			  document.getElementById("left").value=posi.offsetLeft;
			  document.getElementById("right").value=posi.offsetWidth;
			  document.getElementById("bottom").value=posi.offsetHeight;
			  return true;
			}

		  </script>
		</head>

	<body>

		<div id="crop_wrapper">
		  <img src="images/image1.jpg">
		  <div id="crop_div">
		  </div>
		</div>

		<form method="post" action="#" onsubmit="return crop();">
			  <input type="hidden" value="" id="top" name="top">
			  <input type="hidden" value="" id="left" name="left">
			  <input type="hidden" value="" id="right" name="right">
			  <input type="hidden" value="" id="bottom" name="bottom">
			  <input type="submit" name="crop_image">
		</form>
<?php
		if(isset($_POST['crop_image']))
		{
		  $y1=$_POST['top'];
		  $x1=$_POST['left'];
		  $w=$_POST['right'];
		  $h=$_POST['bottom'];
		  $image="images/image1.jpg";

		  list( $width,$height ) = getimagesize( $image );
		  $newwidth = 600;
		  $newheight = 400;

		  $thumb = imagecreatetruecolor( $newwidth, $newheight );
		  $source = imagecreatefromjpeg($image);

		  imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		  imagejpeg($thumb,$image,100); 


		  $im = imagecreatefromjpeg($image);
		  $dest = imagecreatetruecolor($w,$h);
			
		  imagecopyresampled($dest,$im,0,0,$x1,$y1,$w,$h,$w,$h);
		  imagejpeg($dest,"images/crop_image.jpg", 100);
		}
		?>
	</body>
		
</html>