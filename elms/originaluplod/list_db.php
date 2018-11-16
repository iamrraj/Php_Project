
<!DOCTYPE html>
<html>
<head>
	<title></title>


<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta name="description" content="">


    
<link href="globe.png" rel="shortcut icon">

<style type="text/css">
	table{
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    


}

h2{

	display: grid;
	text-align: center;
	background-color: brown;
	height: 60px;
	line-height: 60px;
	text-transform: uppercase;
	color: white;

}

.btn {
  border: 2px solid gray;

  border-radius: 8px;
  font-size: 15px;
  font-weight: bold;
  background-color: green;
  color: white;

}

.btn:hover {
  border: 2px solid gray;
  border-radius: 8px;
  font-size: 15px;
  font-weight: bold;
  background-color: green;
  color: white;

}

a{
	color: white;
	text-transform: capitalize;
}
a:hover{
	color: white;
	text-transform: capitalize;
}
a:focus{
	background-color: red;
}
#b{
	color: black;
	list-style: none;
	text-decoration: none;
}

 td,  th {
    border: 2px solid red;
    font-size: 15px;
    font-weight: bold;
    
   

}


 tr:nth-child(even){background-color: white;}
 tr:nth-child(odd){background-color: #D0D0D0;}

 tr:hover {background-color: yellow;}

</style>
</head>
<body>

<div class ="container">
	<div class="header">
	<h2>List Of all file</h2>

	<span class="text-success">
		<?php if (isset($successmsg))
		 { 
		 	echo $successmsg;
	 	 } ?>
	 	 	
	 	 </span>
	<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>

	</div>


	<?php
include_once "dbconfig.php";
$query="select fileid,filename,filetype,filesize from up_db";
$rs=my_select($query);
$n=mysql_num_rows($rs);
if($n==0)
{	
	echo "<br />No files found";
}
else
{

	echo "<table border='1' align='center' class='table' cellpadding='3' cellspacing='0' width='500'>";
	echo "<tr>
	<th width='80'>Fileid</th>
	<th width='80'>Filename</th>
	
	<th width='80'>filetype</th>
	<th width='80'>filesize</th>
	<th width='80'>Download</th>
	<th width='80'>Delete</th>
	
	

	</tr>";
	while($row=mysql_fetch_array($rs))
	{
		echo "<tr>
		<td>$row[0]</td>
		<td ><a href='down_db.php?fid=$row[0]' id='b' >$row[1]</a><buton></td>
		<td>$row[2]</td>
		<td>$row[3]</td>
		<td ><button class='btn btn-lg btn-link btn-primary'><i class='fa fa-download'><a href='down_db.php?fid=$row[0]' >Dwnload</a><i><buton></td>

		<td ><button class='btn btn-lg btn-link btn-danger' style='background-color:red;' ><i class='fa fa-trash'><a href='download.php?fid=$row[0]'  >Delete</a><i><buton></td>
		
	
		

		</tr>";

	}
	echo "</table>";


}
?>
</div>

 <a href ="../admin/dashboard.php"  id="a" class= "btn btn-lg btn-warning col-sm-3" style="font-size: 20px;"><i class="fa fa-home">Back To Home</i> </a><br><br>
 
 

</body>
</html>