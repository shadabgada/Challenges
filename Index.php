<!Doctype html>
<html>

<head>
	
	<title>YouFrame</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style>

	.imageUpload{
		background: #e2e8f0;
        color: #2c5282;
		margin: 20px;
	}
	#eachBox{
		
		margin-bottom:6px;
	}
	.bodyClass{
		background-color:#e2e8f0;
		padding-top: 70px;
		padding-bottom: 50px;
		font-family: "Verdana";
		display: block;
		
	}
	</style>
</head>	

<body class="bodyClass">
	<?php include('header.php')?>
	
	<center>
	<form action="" method="POST" enctype="multipart/form-data" class="form1">
			<input type="file" name="image"  class="imageUpload" required>
			<input type="submit" name="submit" value="Upload" class="imageUpload"/>
	</form>
	<hr>
	</center>
	<?php
	
	//This section is to display images
	echo '<div class="container" >';
	foreach(glob('upload/'.'*.{jpg,JPG,jpeg,JPEG,png,PNG}',GLOB_BRACE) as $filename)
	{
		echo '<div class="col-md-4  " id = "eachBox">';
		echo '<div class="img-rounded" style="margin-bottom:25px  ">';
		echo "<img src='".$filename."' width='100%' class='img-rounded'> <br>";

		echo '<div class="caption" style="background-color:white ;text-align:center " >';	// Caption block
		echo basename($filename);
		echo '</div>';
		
		echo '</div>';
		echo '</div>';
	}
	echo '</div>';
	
		//This Code is to upload images
		if($_SERVER['REQUEST_METHOD'] == "POST" )
		{
		
			$flag=true;
			$file_name = $_FILES['image']['name'];
			$file_tmp =$_FILES['image']['tmp_name'];
			$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
					  
			$expensions= array("png","jpg","jpeg");
					  
			if(in_array($file_ext,$expensions)=== false)
			{
				echo "<script type='text/javascript'>alert('Extension not allowed!')</script>";
				$flag=false;
			}
			
			if(move_uploaded_file($file_tmp,"upload/".$file_name))
			{	
				header('location:index.php');
			}
		}
	?>
	
	
	<?php include('footer.php')?>
</body>
</html>
