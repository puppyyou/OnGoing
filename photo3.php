<?php
	// include configuration file
	include('config.php');
 
	// connect to the database
	$dbc = @mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
 
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{

	  	$uploadpath = '/home/leslin3/leslieslin.com/ongoing/uploads/';


		$src = $uploadpath.$_GET["file"];
	 	$targ_w = $targ_h = 150;
	  	$jpeg_quality = 90;
		$img_r = imagecreatefromjpeg($src);
		$dst_r = imagecreatetruecolor( $targ_w, $targ_h );
		//$dst_r = imagetruecolortopalette( $targ_w, false, 255);

		imagecopyresampled(
	    	$dst_r, $img_r,0,0,$_POST['x'],$_POST['y'],
		  	$targ_w, $targ_h,$_POST['w'],$_POST['h']
	  	);

		//header('Content-type: image/jpeg');
		imagejpeg($dst_r, $src . "_cropped.jpg", $jpeg_quality);

		//header("Location: photo3.php");
		//exit;

            //savephoto
			$query = "INSERT into photos (photo_name) values ('".$src . "_cropped.jpg"."')"	;
			////echo($query);  ///this is for duble checking. After getting the files we can just hide it :))
	}
			$result = @mysqli_query($dbc, $query) or die('Query failed: ' . mysqli_error($dbc));
			////echo($results); /// this is for duble checking. After getting the files we can just hide it :))
	}
 

	// continue session
	
 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ON GOING </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="ongoing.css" rel="stylesheet" type="text/css">
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		  

	</head>

	<body>
	<div class="container" style="margin-top: 5px">
    

         <h1> <a href="http://leslieslin.com/ongoing/photo.php"> On Going </a> </h1>

         <h2>Step by step  </h2>

         <img src="2013Leslie.jpg" alt= "leslielin2013" align="center" />  </br>

     

     <?php
	
	//call photos
	$query = "SELECT photo_id, photo_name, uploaddate FROM photos ORDER BY uploaddate";
	$result = @mysqli_query($dbc, $query) or die('Query failed: ' . mysqli_error($dbc));
			while ($row = mysqli_fetch_assoc($result)) 
			{
				
				echo '<img src="http://leslieslin.com/ongoing/uploads/'. basename($row['photo_name']). '" /><br />';
			}
	
	
	?>
	
		
 		</br>	
		<p> © 2014 Leslie Lin</p>
		</Br>
		</br>

	</div>
		
	 </body>
</html>
	 		