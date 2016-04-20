<?php
    //Dynamically resize, crop, watermark and save images using Imagick
    function image_create($imagePath,$imageName,$imageExt,$width,$height,$copy) {
        /*** Check to see if file already exists ***/
        $file = "img/".$imageName."-".$width."x".$height.".".$imageExt;
        if (!file_exists($file)) {
            /*** If file does not exist create it ***/
            try {
                    /*** the image file ***/
                    $image = $imagePath;
                    /*** a new imagick object ***/
                    $im = new Imagick();
                    /*** ping the image ***/
                    $im->pingImage($image);
                    /*** read the image into the object ***/
                    $im->readImage($image);
                    /*** thumbnail the image ***/
                    $im->setImageFormat($imageExt);
                    /*** resize and crop the image ***/
                    $im->resizeImage($width,$height,Imagick::FILTER_CUBIC,0.5,true);
                    $im->cropThumbnailImage($width,$height);
                    /*** Create Copyright Watermark ***/
                    if (!$copy==null) {
                        /* Create a drawing object and set the font size */
                        $draw = new ImagickDraw();
                        /*** set the font ***/
                        $draw->setFont( "font/Arial.ttf" );
                        /*** set the font size ***/
                        $draw->setFontSize( 25 );
                        /*** add some transparency ***/
                        $draw->setFillAlpha( 0.4 );
                        /*** set gravity to the center ***/
                        $draw->setGravity( Imagick::GRAVITY_CENTER );
                        /*** overlay the text on the image ***/
                        $im->annotateImage($draw,0,0,25,$copy);
                    }
                    /*** Write the thumbnail to disk ***/
                    $im->writeImage("img/".$imageName."-".$width."x".$height.".".$imageExt);
                    /*** Free resources associated with the Imagick object ***/
                    $im->destroy();
                    return "img/".$imageName."-".$width."x".$height.".".$imageExt;
            }
            catch(Exception $e) { echo $e->getMessage(); }
        }
    };
?>
<?php
/*** CODE FOR RUNTIME ***/
  $imgPath = "https://farm6.staticflickr.com/5576/14557295838_afc0b7f946_o.jpg";
  $imgName = "abandoned_shack";
  $imgAlt = "An abandoned shack in the middle of Colorado's nowhere. -Spencer Thayer";
  $imgExt = "jpg";
  $imgWidth = "600";
  $imgHeight = "400";
  $imgCopyright = "@spencerthayer";
 ?>
 <?php
  image_create($imgPath,$imgName,$imgExt,$imgWidth,$imgHeight,$imgCopyright);
  print "<img";
  print "src=\"img/".$imgName."-".$imgWidth."x".$imgHeight.".".$imgExt."\"";
  print "alt=\"".$imgAlt."\"";
  print "/>";
?>