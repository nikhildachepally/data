 <html>
<head>
</head>
<body bgcolor="skyblue">
<center>

<div style="width:300px;height:350px;">
<p style="text-align:center">
<form action="mydata.php" method="POST">
<b>DATE: </b><font color=red>*</font> <input type="text" name="name"><br>
TEXT:<font color=red>*</font><input type="text" name="email"><br>
<input type="reset" name="reset">
<input type="submit" name= "submit" value="todo">
</form>


<?php

$con = mysqli_connect("localhost","nikhil","nikhil");
	if(!$con){
		die("could not connect : ". mysql_error());
	}

$f = "CREATE DATABASE nikhil";	

if (mysqli_query($con,$f)){	
echo "your Database was created succesfully";
} else echo "Error: " . mysql_error();

mysqli_select_db($con,"nik");


	$s = "CREATE TABLE Details (
			name varchar(20),
			email varchar(45)
			
		)";
		mysqli_query($con,$s);
		mysqli_select_db($con,"nik");
	if (isset($_POST['submit']))
	{
	$s1 = "INSERT INTO Details(name,email)
	 VALUES ('$_POST[name]','$_POST[email]')";

	mysqli_query($con,$s1);
		}


	mysqli_select_db($con,"nik");

  
 

  if(isset($_POST['delete'])){
$DeleteQuery = "DELETE FROM details WHERE name='$_POST[hidden]'";
mysqli_query($con,$DeleteQuery);
};

if(isset($_POST['add'])){
$AddQuery = "INSERT INTO details (name,email) VALUES('$_POST[name]','$_POST[email]' WHERE name='$_POST[hidden]')";
mysqli_query($DeleteQuery, $con);
};


	$s = "SELECT * FROM Details";
	$myData = mysqli_query($con,$s);
	echo "<table border=1>
	<tr>
	<th>Date</th>
	<th>Text</th>
	</tr>";
	while($record = mysqli_fetch_array($myData)){
		echo "<form action = mydata.php method=post>";
		echo "<tr>";
		echo "<td>". "<input type=text name=date value=" . $record['name'] . " </td>";
		echo "<td>" . "<input type=text name=text value=" . $record['email'] . " </td>";
		echo "<td>" . "<input type=hidden name=hidden value=" . $record['name'] .  " </td>";
		echo "<td>" . "<input type=submit name=delete value=delete" . " </td>";
		echo "</tr>";
		echo "</form>";

	} 

echo "</table>";
mysqli_close($con);

	

     
?>
</center>
</body>
</html>
# data
