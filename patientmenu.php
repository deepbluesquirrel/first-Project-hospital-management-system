<?php
session_start();
include ('connection.php');
$N=$_SESSION['admin'];
if(empty($N))
{
  exit(header('location:loginpage.php'));
}
?>
<html>
<head>
<title>Patient menu</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #ddedfd;
}
input[type=button] {
  width: ;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;	
  border-radius: 4px;
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
 </style>
 <div class='b'><label>Current admin : </label><?php echo"$N"?><span class="dot"></span></div>
</head>
<body>
<h1>PATIENT MANAGEMENT</h1><br>
<div>
<input class="button" type="button" value="Exit" onclick="location.href='home.php'" style="float: right;">
<table>
<tr>
<td><h3>Patient Registration</td>
<td><a href="insertpatient.php">Register</a></td>
</tr>
<tr>
<td><h3>View Registration<h3></td>
<td><a href="viewpatient.php">View Registration</a></td>
</tr>
<tr>
<td><h3>View Status</td>
<td><a href="status.php">View status</a></td>
</tr>
<tr>
<td><h3>ICU Management</td>
<td><a href="icu.php">Admit</a></td>
</tr>
<tr>
<td><h3>Casualty Management</td>
<td><a href="casualty.php">Admit</a></td>
</tr>
<tr>
<td><h3>Ward Management</td>
<td><a href="ward.php">Admit</a></td>
</tr>
<tr>
<td><h3>General Room Management</td>
<td><a href="generalroom.php">Admit</a></td>
</tr>
<tr>
<td><h3>Vip Room Management</td>
<td><a href="viproom.php">Admit</a></td>
</tr>
</table>
</div>
</body>
</html>