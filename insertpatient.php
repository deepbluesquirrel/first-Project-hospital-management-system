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
			$d=$_POST['doctor'];
			$n=$_POST['name'];
			$a=$_POST['age'];
			$s=$_POST['gender'];
   			$b=$_POST['bloodgroup'];
			$ad=$_POST['address'];
			$c=$_POST['contactno'];
      $date=$_POST['dateofad'];
      if(empty($i))
      {echo '<script>alert("Id not entered")</script>';}
      else
      {
       $check=mysqli_query($conn,"select id from deletetable where id='$i'");
       $r1=mysqli_fetch_row($check);

        if(empty($r1))
        {
        $sql="insert into patientreg(id,name,age,sex,bloodgroup,address,contactno,dateofad,doctor)values('$i','$n',$a,'$s','$b','$ad',$c,'$date','$d')";
				if(mysqli_query($conn,$sql))
					{
						echo '<script>alert("Successful.")</script>';
            echo "<meta http-equiv='refresh' content='0'>";
					}
					else
					{
          	echo '<script>alert("Something went wrong.")</script>';
									}
          mysqli_close($conn);
         }
        else{echo '<script>alert("Patient with id already registered")</script>';}
      }
	
}
?>
<html>
<head>
<title>Add patient</title>
<style>

input[type=text],[type=date],textarea,select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit]{
  width: ;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;	
  border-radius: 4px;
  cursor: pointer;
}
h1{text-align:center;}
p {
  width: 75% ;
  height:auto;	
  border: 5px solid purple;
  padding: 50px;
  margin: 20px;
  position: absolute;
  left: 5%; 
  background: #EADEA5; 
  border: 8px solid black"	
}
.button{background:red;}
</style>
</head>
<body>
<form action='insertpatient.php' method='post'>
<h1>Patient Registration Form</h1>
<input class="button" type="button" value="X" onclick="location.href='patientmenu.php'" style="float: right;">
<p>
<label>ID</label>
<input type='text' name='id' placeholder="Patientfirstletter,year,formno eg:N20201">
<label>Doctor Name:</label>
    <select name="doctor">
  	<option value="Dr.David S Albert">Dr.David S Albert</option>
  	</select>
<label>Name:</label>
<input type='text' name='name'>
<label>Age:</label>
<input type='text' name='age'>
<input type="radio" id="male" name="gender" value="male">
<label for="male">Male</label><br>
<input type="radio" id="female" name="gender" value="female">
<label for="female">Female</label><br>
<input type="radio" id="other" name="gender" value="other">
<label for="other">Other</label><br><br>
<label>Blood group:</label>
<input type='text' name='bloodgroup'>
<label>Address:</label>
<textarea id="subject" name="address" placeholder="Address.." style="height:200px"></textarea>
<label>Contact No:</label>
<input type="text"  name="contactno">
<label>Date of Admission:</label>
<input type="date"  name="dateofad"><br>
<input class="button" type="submit" name='submit' value="SUBMIT">
</p>
<form>
</body>
</html>