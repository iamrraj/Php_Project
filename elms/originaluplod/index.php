<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>

.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.btn {
  border: 2px solid gray;

  border-radius: 8px;
  font-size: 20px;
  padding: 8px 20px;
  font-weight: bold;
  background-color: #2AB3D1;
  color: white;

}
.btn:focus{
background-color: red;
}
.btn:hover{
background-color: purple;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
.form{
	height: 35px;
	width: 200px;
	border-radius: 8px;
	border: 2px solid gray;
	font-size: 20px;
}

#a{
  float: right;
  font-size: 21px;
  font-weight: bold;
  padding: 10px;
  text-transform: capitalize;

}
#a:focus {
	background-color: red;

}


	  </style>

<head>
<title>Upload to database as blob</title>
</head>
<body>
<center><h3 style="color: blue; border-radius: 8px; border: 2px solid black; padding: 10px; text-align: center; width: 50%;">Upload Documents To Student</h2></center><br>
<div class="container">
	<a href ="list_db.php" target="_blank" id="a" class= "btn btn-lg btn-warning col-sm-3"><i class="fa fa-download">Download Page</i>
	<a href ="../admin/dashboard.php"  id="a" class= "btn btn-lg btn-warning col-sm-3" style="font-size: 20px;"><i class="fa fa-home">Back To Home</i> </a><br><br> </a><br><br>
<form method='post' enctype='multipart/form-data' class="form-horizontal">

	<div class="form-group ">
		<label class="control-label col-sm-2">File Upload</label><br>
			<div class="col-sm-10">
				
				<div class="upload-btn-wrapper">
  					<button class="btn"><i class="fa fa-upload"> Upload a file</i></button> 
					<input type='file' name='myfile' id='myfile' class="form-control" />
			   </div>
			</div><br><br>

		<label class="control-label col-sm-2">About File</label><br>
			<div class="col-sm-10"> 
				<textarea name="name" id="name" rows="1" class="form" ></textarea>
		   </div><br><br>

			<div class="col-sm-10">
				<input type='submit' name='upload' id='upload' class=" btn btn-lg btn-success" value='Upload' />
			</div>
	</div>
</form>
<footer>
	<script type="text/javascript">window.onload = date_time('date_time');</script>
</footer>
</div>
<?php
include_once "dbconfig.php";
if(isset($_REQUEST['upload']))
{
$error=$_FILES['myfile']['error'];
	if($error!=0)
	{
	echo "<Br />A File not uploaded, server seems busy, try later";
	}
	else
	{
	$fname=$_FILES['myfile']['name'];
	$ftype=$_FILES['myfile']['type'];
	$fsize=$_FILES['myfile']['size'];
	$ftname=$_FILES['myfile']['tmp_name'];


	$fp=fopen($ftname,'r');
	$filedata=fread($fp,$fsize);
		
		$name = $_POST['name'];
   
	$filedata=addslashes($filedata);
		$query="insert into up_db (filename,filetype,filesize,filedata,name) values ('$fname','$ftype',$fsize,'$filedata','$name')";
		$n=my_iud($query);
		if($n==1)
		{
			echo "<Br /><h3>File upload successful </h3><br>
			<a href='list_db.php' class= 'btn btn-lg btn-warning col-sm-2'><i class='fa fa-download'>Download Page</i></a></a>";
		}
		else
		{
	echo "<Br />C File not uploaded, server seems busy, try later";
		}
	
	
	}
}




?>
</body>
</html>