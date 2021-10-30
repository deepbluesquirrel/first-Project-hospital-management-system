<html>
<head>
<title>Billing</title>
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
	table.table1{
	font-family: Arial, Helvetica, sans-serif;
	  border-collapse: collapse;
 	 width: 100%;
	 margin-left: auto;
	  margin-right: auto;
	}
  table.table2{
	font-family: Arial, Helvetica, sans-serif;
	  border-collapse: collapse;
 	 width: 100%;
	 margin-left: auto;
	  margin-right: auto;
	}
table.table1 td,th {
  border: 3px solid #ddd;
  padding: 8px;

}
table.table2 td,th {
  border: 3px solid #ddd;
  padding: 8px;

}

table.table1 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}
table.table2 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}
.b {
   width:100%;
}
table.table1 tr
{text-align:center}
table.table2 tr
{text-align:center}
tr:nth-child(even){background-color: #f2f2f2;}
tr:hover {background-color: #ddd;}

tr:nth-child(even){background-color: #f2f2f2;}

tr:hover {background-color: #ddd;}

table.table1 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}
table.table2 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #E7163F;
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
<form action='billing.php' method='post'>
<h1>Billing</h1>
<p>
<label>ID</label>
<input type='text' name='id' placeholder="Patientfirstletter,year,formno eg:N20201">
<input class="button" type="submit" name='submit' value="SUBMIT">
<input class="button" type="button" value="Exit" onclick="location.href='patientmenu.php'" style="float: right;">
</p>
</form>
</body>
</html>
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
		$test = mysqli_query($conn,"select id from patientreg where id='$i'");
        $r0 = mysqli_fetch_row($test);
        $check5=mysqli_query($conn,"select id from icu where id='$i'");
		$check1=mysqli_query($conn,"select id from casualty where id='$i'");			
		$check2=mysqli_query($conn,"select id from ward where id='$i'");
		$check3=mysqli_query($conn,"select id from general where id='$i'");
    $check4=mysqli_query($conn,"select id from vip where id='$i'");    
    if(!empty($r0))
		{	
			$r1 = mysqli_fetch_row($check1);
			$r2 = mysqli_fetch_row($check2);
			$r3 = mysqli_fetch_row($check3);
            $r4 = mysqli_fetch_row($check4);
            $r5 = mysqli_fetch_row($check5);
			if(!empty($r1))
					{echo '<script>alert("Already Exist in casualty")</script>';}
			elseif(!empty($r2))
					{echo '<script>alert("Already Exist in ward")</script>';}
			elseif(!empty($r3))
					{echo '<script>alert("Already Exist in generalroom")</script>';}
			elseif(!empty($r4))
                    {echo '<script>alert("Already Exist in vip")</script>';}
      elseif(!empty($r5))
					{echo '<script>alert("Already Exist in ICU")</script>';}        
			else{
              if(mysqli_query($conn,"insert into bigreg select *from patientreg where id='$i'"))
              	{
                  $result1 = mysqli_query($conn,"select * from bigreg where id='$i'");
                  echo"<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                  <table class='table1'>
                  <tr>
                  <th>ID</th>
                  <th>NAME </th>
                  <th>AGE </th>
                  <th>GENDER </th>
                  <th>BLOOD GROUP </th>
                  <th>ADDRESS </th>
                  <th>CONTACT NO: </th>
                  <th>DATE OF ADMISSION </th>
                  <th>DOCTOR </th>
                  </tr>";
                  
                  while($row = mysqli_fetch_array($result1))
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
                  echo "</tr>";
                  }
                  echo "</table>";
                  
                            $result = mysqli_query($conn,"select department,indate,outdate,count,rate from deletetable where id='$i'");
                            $result1 = mysqli_query($conn, "select sum(rate) as value_sum from deletetable where id='$i'"); 
                            $row = mysqli_fetch_assoc($result1);
                            $sum = $row['value_sum']; 
                           
                        echo"<table class='table2'>
                        <tr>
                        <th>DEPARTMENT</th>
                        <th>INDATE</th>
                        <th>OUTDATE</th>
                        <th>DAYS</th>
                        <th>RATE</th>
                        </tr>";
                        
                        while($row = mysqli_fetch_array($result))
                        {
                        echo "<tr>";
                        echo "<td>" . $row['department'] . "</td>";
                        echo "<td>" .$row['indate']. "</td>";
                        echo "<td>" .$row['outdate']. "</td>";
                        echo "<td>" . $row['count'] . "</td>";
                        echo "<td>" . $row['rate'] . "</td>";
                        echo "</tr>";
                        }
                        echo "<tr>
                        <td> </td>;
                        <td> </td>;
                        <td>Incuding Doctor Fee </td>;
                        <th> Total </th> <td> $sum </td>;
                        <tr>";
                         echo "</table>";
                        mysqli_query($conn,"delete from patientreg where id='$i'");
                        
               }					
							else{echo '<script>alert("Encounter problem in displaying patient status")</script>';}					
				
			 }
		}
	 else	
		{echo '<script>alert("ID not registered")</script>';}
			
}
?>

