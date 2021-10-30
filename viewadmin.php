<?php
session_start();
include("connection.php");
$N=$_SESSION['admin'];
if(empty($N))
{
  exit(header('location:loginpage.php'));
}
?>
<div class='b'><label>Current admin : </label><?php echo"$N"?><span class="dot"></span></div>
<input class="button" type="button" value="Exit" onclick="location.href='home.php'" style="float: right;">
<?php
$result = mysqli_query($conn,"select admin from adminlogin ");
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
tr:nth-child(even){background-color: #f2f2f2;opacity:0.9;}
tr:nth-child(odd){background-color: #f2f2f2;opacity:0.9;}
tr:hover {background-color: #ddd;}
</style>
<tr>
<th>Admin</th>
<th>Operation</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
  $e = "Remove";
  $f="+Add";
echo "<tr>";
echo "<td>" . $row['admin'] . "</td>";
echo "<td><a href='deleteadmin.php?admin=$row[admin]'>Remove<br></td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>
<input class="button" type="button" value="Add +" onclick="location.href='insertadmin.php'" style="float: left;">
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
body{
  background-image: url('https://www.usnews.com/dims4/USNEWS/9e32c47/2147483647/thumbnail/640x420/quality/85/?url=http%3A%2F%2Fmedia.beam.usnews.com%2F16%2F33%2F599bb1cb4d6aaa375f5c685bf1bf%2F181012-datacenter-stock.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

input[type=button] {
  width: ;
  background-color: red;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;	
  border-radius: 4px;  
  font-weight : bold ;
  cursor: pointer;
}

.b{
        width: 18%; 
        padding: 8px; 
        color: #ffffff; 
        background: none #191970; 
        border: none; 
        border-radius: 6px; 
        font-size: 18px; 
        cursor: pointer; 
        margin: 12px 0; 
        
    }
    .dot {
  height: 10px;
  width: 10px;
  background-color: #5FF01B;
  border-radius: 50%;
  display: inline-block;
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