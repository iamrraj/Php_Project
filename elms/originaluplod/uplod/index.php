<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="main.js"></script>
</head>
<body>
<div class="container">
    <div class="header">
        <h2> Upload Your file </h2>
    </div>
    <div class = "form">
    
     <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
     <span class="text-success"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        <form method='post' enctype ='multipart/form-data' />
        <div class="form-group">
            <label class=""> Upload file </label><br>
            <input type='file' name='myfile' id='myfile'  class="form-control" /><br>
            <label> Description </label><br>
            <input type='text' name='name' id='myfile' class="form-control" /><br>
            <input type='submit' name='upload' id='upload' class="form-control" value='upload' class="btn btn-lg btn-success" />
        </div>
        </form>

    </div>
    <?php

include_once "dbconfig.php";
if(isset($_REQUEST['upload']))
{
$error=$_FILES['myfile']['error'];
	if($error!=0)
	{
	echo  "<Br />A File not uploaded, server seems busy, try later";
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
			echo "<Br />File upload successful <br>
			<a href='list_db.php'>Download Page</a>";
		}
		else
		{
	         echo"<Br />C File not uploaded, server seems busy, try later";
		}
	
	
	}
}

    ?>
</div>
</body>
</html>