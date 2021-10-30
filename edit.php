<?php  
include('connection.php');  
$row1=null; 
$name=null; 
if( isset($_GET['edit']) )  
{  
$name = $_GET['edit'];
$res= mysqli_query($conn,"select*from staff where name='$name'");  
$row1= mysqli_fetch_array($res); 
$r1 = implode(',',$row1); 
}  
 
if( isset($_POST['shift']))  
{
	$shift   = $_POST['shift'];
	$id   = $_POST['id'];  
	$res  = mysqli_query($conn,"update staff set shift='$shift'where id='$id' ");   
    echo "<meta http-equiv='refresh' content='0;url=staff.php'>";  
}
if( isset($_POST['delete']))  
{
	$delete   = $_POST['delete'];
	$res  = mysqli_query($conn,"delete from staff where id='$delete'");   
    echo "<meta http-equiv='refresh' content='0;url=staff.php'>";  
}
  
?>  
  <style>
  input[type=text]{
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width: ;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;	
  border-radius: 4px;
  cursor: pointer;
}
  }
  </style>
<form action="edit.php" method="POST">
<h2>Change shift</h2> 
ID: <input type="text" name="id" value="<?php echo $row1[0]; ?>"><br />
Shift: <input type="text" name="shift" value="<?php echo $row1[3]; ?>"><br />
<input type="submit" name="submit" value=" Update "> 
</form> 
<form action="edit.php" method="POST">
<h2>Remove</h2>
ID: <input type="text" name="delete" value="<?php echo $row1[0]; ?>"><br />
Name: <input type="text" name="n" value="<?php echo $row1[1]; ?>"><br />
Department: <input type="text" name="d" value="<?php echo $row1[2]; ?>"><br />
<input type="submit" name="remove" value=" Remove "> 
</form> 