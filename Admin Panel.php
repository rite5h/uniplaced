<?php
require_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style4.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
	<title>Uplaod image and download in PHP and MYSQL database </title>
</head>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">LOGIN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">SIGNUP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">CONTACT</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
	<br>
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
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
}
//Set image upload size 
    if ($_FILES["image"]["size"] > 1048576) {
   $error[] = 'Sorry, your image is too large. Upload less than 500 KB in size.';
}
if(!isset($error))
{
move_uploaded_file($file,$target_file); 
$result=mysqli_query($db,"INSERT INTO items(image,title) VALUES('$image_file','$title')"); 
if($result)
{
	$image_success=1;  
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
	?> 
	<div class="container">
	<?php if(isset($image_success))
		{
		echo '<div class="success">Image Uploaded successfully</div>'; 
		} ?>
		
<form action="" method="POST" enctype="multipart/form-data">
	<label>Image </label>
	<input type="file" name="image" class="form-control" required >
	<label>Title</label>
	<input type="text" name="title" class="form-control">
	<br><br>
	<button name="form_submit" class="btn-primary"> Upload</button>
</form>
</div>
<div class="container_display">
<?php if(isset($_GET['updated']))
		{
		echo '<div class="success">Saved</div>'; 
		} 
		if(isset($_GET['deleted']))
		{
			echo '<div class="success">Deleted sucessfully</div>'; 
			}
		?>
	<table cellpadding="10">
		<tr>
			<th> Image</th>
			<th>Title</th>
		</tr>
		<?php $res=mysqli_query($db,"SELECT* from items ORDER by id DESC");
			while($row=mysqli_fetch_array($res)) 
			{
				echo '<tr> 
                  <td><img src="uploads/'.$row['image'].'" height="200"></td> 
                  <td>'.$row['title'].'</td> 
                  <td><a href="download.php?id='.$row['id'].'"><button class="btn-primary download_btn">Download</button></a></td>
                  <td><a href="edit.php?id=' .$row['id']. '"><button class="btn-primary">Edit</button></a>
                 <a href=\'delete.php?id=' .$row['id'].'\' onClick=\'return confirm("are you sure you want to delete?")\'"><button class="btn-primary btn_del">
                 Delete</button></a>

				</tr>';

} ?>
		
	</table>
	</div>

</body>
</html>