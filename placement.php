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
	<title>bca placement details </title>
</head>
<body background="images/background.jpg">
<div class="container-fluid">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">BACK</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">CONTACT</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
	<br>
</div>
<div class="container_display" >
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
        <h1>BCA PLACEMENT INFORMATION</h1>
		<tr>
			<th>Placement company</th>
			<th>Information</th>
		</tr>
		<?php $res=mysqli_query($db,"SELECT* from items ORDER by id DESC");
			while($row=mysqli_fetch_array($res)) 
			{
				echo '<tr> 
                  <td><img src="uploads/'.$row['image'].'" height="200"></td> 
                  <td>'.$row['title'].'</td> 
                  <td><a href="download.php?id='.$row['id'].'"><button class="btn-primary download_btn">Download</button></a></td>
				</tr>';

} ?>
		
	</table>
	</div>

</body>
</html>