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
		$date=$_POST['dateofad'];
		$r=$_POST['room'];
		$test = mysqli_query($conn,"select id from patientreg where id='$i'");
		$r0 = mysqli_fetch_row($test);
		$check1=mysqli_query($conn,"select id from icu where id='$i'");			
		$check2=mysqli_query($conn,"select id from ward where id='$i'");
		$check3=mysqli_query($conn,"select id from general where id='$i'");
		$check4=mysqli_query($conn,"select id from vip where id='$i'");
		if(!empty($r0))
		{	
			$r1 = mysqli_fetch_row($check1);
			$r2 = mysqli_fetch_row($check2);
			$r3 = mysqli_fetch_row($check3);
			$r4 = mysqli_fetch_row($check4);
			if(!empty($r1))
					{echo '<script>alert("Already Exist in icu")</script>';}
			elseif(!empty($r2))
					{echo '<script>alert("Already Exist in ward")</script>';}
			elseif(!empty($r3))
					{echo '<script>alert("Already Exist in generalroom")</script>';}
			elseif(!empty($r4))
					{echo '<script>alert("Already Exist in vip")</script>';}
			else{
				//
					$ck=mysqli_query($conn,"select roomno from casroom where roomno='$r'");
					$r5 = mysqli_fetch_row($ck);
					if(empty($r5)&&(mysqli_query($conn,"select roomno1,section from totalroom where roomno1='$r' and section='CASUALTY BED'")))
					{
						$rm="insert into casroom(id,roomno)values('$i','$r')";
						if(mysqli_query($conn,$rm))
						{
							$sql="insert into casualty(id,date)values('$i','$date')";
							if(mysqli_query($conn,$sql))
							{
								echo '<script>alert("Successful")</script>';
							}
							else
							{
								$s="select id from casualty where id='$i'";
								if(mysqli_query($conn,$s))
								{echo '<script>alert("Already Exist")</script>';}
							}
						
						}
					}
					else
					{
					echo '<script>alert("Room is not available")</script>';
					}
			}	
		}
	 else	
		{echo '<script>alert("ID not registered")</script>';}
			
}
if(isset($_POST['delete']))
{
		$i=$_POST['id'];
		$date=$_POST['dateofad'];
		$dep='Casualty';
		$test = mysqli_query($conn,"select id from patientreg where id='$i'");
		$test1 = mysqli_query($conn,"select id from casualty where id='$i'");
		$r0 = mysqli_fetch_row($test);
		$r1=mysqli_fetch_row($test1);
		if(!empty($r0))
		{	
			if(!empty($r1))
			{
			$getinfo = "select date from casualty where id='$i'";
			$query = mysqli_query($conn,$getinfo);

				while ($row = mysqli_fetch_array($query)) 
				{
    				$re = $row['date'];
				}
				$date1 = $re;
				$date2 = $date; 
				$diff = abs(strtotime($date2) - strtotime($date1)); 
				$years   = floor($diff / (365*60*60*24)); 
				$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
				$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
				$rate=$days*2000;
				$s="insert into deletetable(id,indate,outdate,department,count,rate)values('$i','$re','$date','$dep',$days,$rate)";
				if(mysqli_query($conn,$s))
				{
					mysqli_query($conn,"delete from casroom where id='$i'");
					
					if(mysqli_query($conn,"delete from casualty where id='$i'"))
					{
						{echo '<script>alert("Successful")</script>';}
					}
					else{echo '<script>alert("Not deleted")</script>';}					
				}
				else
				{echo '<script>alert("Something went wrong")</script>';}
			}
			else{echo '<script>alert("ID not found")</script>';}
		}
	 else	
		{echo '<script>alert("ID not registered")</script>';}
			
}
?>

<html>
<head>
<title>Casualty</title>
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
.c{background-color: red;}
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
input[type=text],textarea {
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
<input class="button" type="button" value="Exit" onclick="location.href='patientmenu.php'" style="float: right;">
<form action='casualty.php' method='post'>
<h1>Casualty Registration Form</h1>
<br><h2>Admitting</h2>
<p>
<label>ID</label>
<input type='text' name='id' placeholder="Patientfirstletter,year,formno eg:N20201">
<label>Date of Admission:</label>
<input type="date"  name="dateofad">
<label>Room/Bed NO:</label>
<input type="number"  name="room"><br>
<input class="button" type="submit" name='submit' value="SUBMIT">
</p>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form action='casualty.php' method='post'>
<br><h2>Discharging</h2>
<p>
<label>ID</label>
<input type='text' name='id' placeholder="Patientfirstletter,year,formno eg:N20201">
<label>Date of Discharge:</label>
<input type="date"  name="dateofad"><br>
<input class="button" type="submit" name="delete" value="DELETE">
</p>
</form>

<form action='casualty.php' method='post'>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<input class="button" type="submit" name='view' value="VIEW">
<input class="button" type="submit" name='hide' value="CHECK AVAILABLE ROOM">

</form>
</body>
</html>

<?php
if(isset($_POST['view']))
{
	$result = mysqli_query($conn,"select patientreg.id,patientreg.name,casroom.roomno from patientreg join casualty on patientreg.id=casualty.id join casroom on casualty.id=casroom.id");

	echo"<table>

<tr>
<th>ID</th>
<th>ROOM/BED NO</th>
<th>NAME OF PATIENT</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" .$row['id']. "</td>";
echo "<td>" . $row['roomno'] . "</td>";
echo "<td class='b'>" . $row['name'] . "</td>";
echo "</tr>";
}
echo "</table>";


}
if(isset($_POST['hide']))
{
	$result = mysqli_query($conn,"select * from totalroom where roomno1 not in(select roomno from casroom) and section='CASUALTY BED'");
	echo"<table>

<tr>
<th>ROOM NO</th>
<th>SECTION</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
	
echo "<tr>";
echo "<td class='b'>" .$row['roomno1']. "</td>";
echo "<td>" . $row['section'] . "</td>";
echo "</tr>";
}
echo "</table>";


}
?>