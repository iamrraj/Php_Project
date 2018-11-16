
<!DOCTYPE html>
<html>
<head>
	<title></title>


<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
<link href="globe.png" rel="shortcut icon">

<style type="text/css">
	table{
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    


}

 td,  th {
    border: 2px solid red;
    font-size: 15px;
    font-weight: bold;
    padding: 10px;
   

}


 tr:nth-child(even){background-color: white;}
 tr:nth-child(odd){background-color: #D0D0D0;}

 tr:hover {background-color: yellow;}

</style>
</head>
<body>
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
	echo "<table border='1' align='center' cellpadding='3' cellspacing='0' width='500'>";
	echo "<tr>
	<th width='80'>Fileid</th>
	<th width='80'>Filename</th>
	
	<th width='80'>Name</th>
	<th width='80'>filesize</th>
	<th width='180'>Pic</th>

	</tr>";
	while($row=mysql_fetch_array($rs))
	{
		echo "<tr>
		<td>$row[0]</td>
		<td><a href='down_db.php?fid=$row[0]'>$row[1]</a></td>
		<td>$row[2]</td>
		<td>$row[3]</td>
		
		<td align='center'>
			<img src='down_db.php?fid=$row[0]' width='100'>
		</td>
		

		</tr>";

	}
	echo "</table>";


}
?>
 <a href="index.php">Back Home</a>
</body>
</html>