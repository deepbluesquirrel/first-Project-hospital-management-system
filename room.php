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
  $room=$_POST['room'];
  $dept=$_POST['department'];
  $r1 = mysqli_fetch_row(mysqli_query($conn,"select * from totalroom where roomno1=$room"));
  if(!empty($r1))
  {
    echo '<script>alert("Room no already exist")</script>';
  }
  else
  {
   if(mysqli_query($conn,"select * from totalroom where section='$dept'"))
   {
      if(mysqli_query($conn,"insert into totalroom (roomno1,section) values($room,'$dept')"))
      {
         echo '<script>alert("Successful")</script>';
         mysqli_close($conn);
      }
      else{echo '<script>alert("Error!! in adding new room")</script>';}
   }
   else
   {echo '<script>alert("No depaerment in that name")</script>';}
  }

}


if(isset($_POST['search']))
{
  $data=$_POST['data'];
  $opt=$_POST['option'];
  if($opt=="name")
  {
      $r0 = mysqli_fetch_row(mysqli_query($conn,"select id from patientreg where name='$data'"));
      $r1 = implode(',',$r0);
      if(empty($r1))
  		{
    		echo '<script>alert("No such patient found")</script>';
  		}
  		else
  		{
        $r2=mysqli_fetch_row(mysqli_query($conn,"select roomno from icuroom where id='$r1' union all select roomno from casroom where id='$r1' union all select roomno from vroom where id='$r1' union all select roomno from groom where id='$r1' union all select roomno from wroom where id='$r1'"));
        $row = implode(',',$r2);
        
        echo '<script type="text/javascript">alert("Room No :' . $row . '")</script>';
        
     	}
  }
  else
  {
    $result=mysqli_fetch_row(mysqli_query($conn,"select roomno from icuroom where id='$data' union all select roomno from casroom where id='$data' union all select roomno from vroom where id='$data' union all select roomno from groom where id='$data' union all select roomno from wroom where id='$data'"));
    $row = implode(',',$result);
    echo '<script type="text/javascript">alert("Room No :' . $row . '")</script>';
    
  }

}
?>
<!DOCTYPE html>
<html>
<style>
body {
  font-family: Arial;
}
p {display:inline-block}
input[type=text], select {
  width: 100%;
  background-color:#F9F5F6;
  padding: 12px 20px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width:25% ;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=button] {
  width: 5%;
  background-color: red;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
input[type=submit]:hover {
  background-color: #45a049;
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
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
<form action="room.php" method='post'>
<input class="button" type="button" value="Exit" onclick="location.href='home.php'" style="float: right;">
    <h1>Find</h1>
    <label>Search by : </label>
    <select name="option">
  	<option value="name">NAME</option>
  	<option value="id">ID</option>
  	</select>
    <input type="text"name="data" placeholder="Search">
    <input  type='submit' name='search' value='FIND'>
    
    </form>
  <form action="room.php" method='post'>
      <h1>Add New Room</h1>
    <label>Room No</label>
    <input type="text"  name="room" placeholder="Roomno">
    <label>Department</label>
    <select name="department">
  	<option value="GENERALROOM">GENERALROOM_(100)</option>
  	<option value="ICU BED">ICU BED_(200)</option>
  	<option value="VIP">VIP_(300)</option>
  	<option value="WARD BED">WARD BED_(400)</option>
    <option value="CASUALTY BED">CASUALTY BED_(500)</option>
		</select>
    <input type='submit' name='submit' value='SUBMIT'>
  </form>
  </div>
</body>
</html>