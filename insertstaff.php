<?php
session_start();
include("connection.php");
$N=$_SESSION['admin'];
if(empty($N))
{
  exit(header('location:loginpage.php'));
}
if(isset($_POST['submit']))
{
		$i=$_POST['id'];
		$n=$_POST['name'];
        $d=$_POST['dep'];
        $s=$_POST['shift'];
		$sql="insert into staff(id,name,department,shift)values('$i','$n','$d','$s')";
							if(mysqli_query($conn,$sql))
							{
                                echo '<script>alert("Successful")</script>';
                                echo "<meta http-equiv='refresh' content='0;url=staff.php'>";
							}
							else
							{
								echo '<script>alert("Failed")</script>';
							}
						
}

?>

<html>
<head>
<title>ICU</title>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
<style>
	table{
	font-family: Arial, Helvetica, sans-serif;
	  border-collapse: collapse;
 	 width: 100%;
	 margin-left: auto;
	  margin-right: auto;
	}
td,th {
  border: 3px solid #ddd;
  padding: 8px;

}

th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}
.b {
   width:100%;
}
tr
{text-align:center}
tr:nth-child(even){background-color: #f2f2f2;}
tr:hover {background-color: #ddd;}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
input[type=text],textarea,select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
h1,h3{text-align:center;}
.j{text-align:center;}
p {
  width: 75% ;
  height:auto;	
  border: 5px solid purple;
  padding: 50px;
  margin: 20px;
  position: absolute;
  left: 5%; 
  background: #EADEE5; 
  border: 8px solid black"	
}
input[type=submit],[type=button] {
  width: ;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;	
  border-radius: 4px;
  cursor: pointer;
}
</style>
</head>
<header></header>
<body>
<form action='insertstaff.php' method='post'>
<br><h2>New Member</h2>
<p>
<label>ID</label>
<input type='text' name='id' placeholder="dep+no">
<label>Name:</label>
<input type="text"  name="name">
<label>Department</label>
    <select name="dep">
  	<option value="General">GENERAL</option>
  	<option value="Icu ">ICU </option>
  	<option value="Vip">VIP</option>
  	<option value="Ward">WARD </option>
    <option value="Casualty">CASUALTY </option>
    <option value="Cleaning">CLEANING </option>
    <option value="Admin">ADMIN </option>
		</select>
<label>Shift:</label>
<input type="text"  name="shift"><br>
<input class="button" type="submit" name="submit" value="SUBMIT">
</p>
</form>
</body>
</html>

