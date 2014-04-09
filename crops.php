<?php
$uploadpath = '/home/leslin3/leslieslin.com/ongoing/uploads/';
/**
 * Jcrop image cropping plugin for jQuery
 * Example cropping script
 * @copyright 2008-2009 Kelly Hallman
 * More info: http://deepliquid.com/content/Jcrop_Implementation_Theory.html
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

  //if (!$_POST['x']) {
  $src = $uploadpath.$_FILES["file"]["name"];
  move_uploaded_file($_FILES["file"]["tmp_name"], $src);
  $filename = $_FILES["file"]["name"];
  
 //  $targ_w = $targ_h = 150;
 //  $jpeg_quality = 90;
	// $img_r = imagecreatefromjpeg($src);
	// $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	// imagecopyresampled(
 //    $dst_r, $img_r,0,0,$_POST['x'],$_POST['y'],
	//   $targ_w, $targ_h,$_POST['w'],$_POST['h']
 //  );

	// //header('Content-type: image/jpeg');
	// imagejpeg($dst_r, $uploadpath."cropped_".$_FILES["file"]["name"], $jpeg_quality);

	//header("Location: photo3.php");
	//exit;
}

// If not a POST request, display page below:

?>

<!DOCTYPE html>
<html lang="en">
<head>

		<title>ON GOING </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
   	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	  <link href="ongoing.css" rel="stylesheet" type="text/css">
  	<script src="http://code.jquery.com/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		  

  <script src="jcrop/js/jquery.min.js"></script>
  <script src="jcrop/js/jquery.Jcrop.js"></script>
  <link rel="stylesheet" href="demo_files/main.css" type="text/css" />
  <link rel="stylesheet" href="demo_files/demos.css" type="text/css" />
  <link rel="stylesheet" href="jcrop/css/jquery.Jcrop.css" type="text/css" />

<script type="text/javascript">

  $(function(){

    $('#cropbox').Jcrop({
      aspectRatio: 1,
      onSelect: updateCoords
    });

  });

  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };

</script>

</head>
<body>

 <div class="container" style="margin-top: 5px">


<h1> <a href="http://leslieslin.com/ongoing/photo.php"> On Going </a> </h1>


<h2>Cropping the picture you uploaded </h2>


<!-- This is the image we're attaching Jcrop to -->
<div class="crop_container" style="width:100%;">      
<img src="uploads/<?php echo $filename; ?>" id="cropbox"/>
</div>
         

 	
     	<!-- This is the form that our event handler fills -->
		  <form action="photo3.php?file=<?php echo $filename; ?>" method="post" onsubmit="return checkCoords();">
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
			<input type="submit" value="Crop Image" class="btn btn-large btn-inverse" />
		</form>
		
			<p>
			<b>An example server-side crop script.</b> Hidden form values
			are set when a selection is made. If you press the <i>Crop Image</i>
			button, the form will be submitted and a 150x150 thumbnail will be
			dumped to the browser. Try it!
			</br>
				</p>
		
		<h2> <!-- <b>Tip! Cropping any similar area from the picture you just saw. </b> </h2>
            <img src="cover.jpg" height="30%" width="30%" align="middle"
            alt= "leslielin2013" />  -->
	
			</br>
	
	
			</br>	
		<p>© 2014 Leslie Lin<p>
		</Br>
		</br>
	</div>	
	</body>

</html>
