<?php
session_start();
include("connection.php");
$N=$_SESSION['admin'];
if(empty($N))
{
  exit(header('location:loginpage.php'));
}

$result = mysqli_query($conn,"select*from patientreg ");
echo "<table>
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
tr
{text-align:center}
tr:nth-child(even){background-color: #f2f2f2;}
tr:hover {background-color: #ddd;}
</style>
<tr>
<th>ID</th>
<th>NAME</th>
<th>AGE</th>
<th>GENTER</th>
<th>BLOOD GROUP</th>
<th>ADDRESS</th>
<th>CONTACT</th>
<th>DATE OF ADMISSION</th>
<th>DOCTOR IN CHARGE</th>
<th>OPERATION</th>

</tr>";
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['age'] . "</td>";
echo "<td>" . $row['sex'] . "</td>";
echo "<td>" . $row['bloodgroup'] . "</td>";
echo "<td>" . $row['address'] . "</td>";
echo "<td>" . $row['contactno'] . "</td>";
echo "<td>" . $row['dateofad'] . "</td>";
echo "<td>" . $row['doctor'] . "</td>";
echo "<td> <a href='editpatient.php?id=$row[id]'>Edit<br></td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>
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

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>