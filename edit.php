<?php
require_once("config.php"); $id=$_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style4.css">
	<title>Edit </title>
</head>
<body>
	<?php
		if(isset($_POST['form_submit']))
		{	
			$title=$_POST['title'];
$folder = "uploads/";
$image_file=$_FILES['image']['name'];
 $file = $_FILES['image']['tmp_name'];
 $path = $folder . $image_file;  
 $target_file=$folder.basename($image_file);
 $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
//Allow only JPG, JPEG, PNG & GIF etc formats
if ($file!='')
{
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	 $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
	}
	//Set image upload size 
		if ($_FILES["image"]["size"] > 1048576) {
	   $error[] = 'Sorry, your image is too large. Upload less than 500 KB in size.';
	}
}

if(!isset($error))
{
	if($file!='')
	{
		$res=mysqli_query($db,"SELECT * from items where id=$id");
		if($row=mysqli_fetch_array($res))
		{
			$delimage=$row['image'];
			
		}
		unlink($folder.$delimage);
		move_uploaded_file($file,$target_file); 
		$result=mysqli_query($db,"UPDATE items SET image='$image_file', title='$title' WHERE id=$id");
	}
	else
	{
		$result=mysqli_query($db,"UPDATE items SET title='$title' WHERE id=$id");
	}
	
if($result)
{
	header("location:Admin Panel.php?update=1");  
}
else 
{
	echo 'Something went wrong'; 
}
}
		}


if(isset($error)){ 

foreach ($error as $error) { 
	echo '<div class="message">'.$error.'</div><br>'; 	
}

}
$res=mysqli_query($db,"SELECT * from items where id=$id");
if($row=mysqli_fetch_array($res))
{
    $image=$row['image'];
    $title=$row['title'];
}
	?> 
	<div class="container">
	<?php if(isset($image_success))
		{
		echo '<div class="success">Image Uploaded successfully</div>'; 
		} ?>
<form action="" method="POST" enctype="multipart/form-data">
	<label>Image Preview</label><br>
    <img src="uploads/<?php echo $image;?>" height="100"><br>
	<input type="file" name="image" class="form-control" >
	<label>Title</label>
	<input type="text" name="title" class="form-control" value="<?php echo $title;?>">
	<br><br>
	<button name="form_submit" class="btn-primary"> Upadte</button>
</form>
</div>
    </body>
</html>