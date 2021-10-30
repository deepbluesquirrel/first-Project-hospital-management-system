<?php  
include('connection.php');  
$row1=null; 
$id=null; 
if( isset($_GET['id']) )  
{  
$id = $_GET['id'];
$res= mysqli_query($conn,"select*from patientreg where id='$id'");  
$row1= mysqli_fetch_array($res); 
$r1 = implode(',',$row1); 
}
if( isset($_POST['name']))  
{  
    $i   =$_POST['id']; 
    $n   = $_POST['name']; 
    $a   = $_POST['age'];
    $g   = $_POST['genter'];
    $b   = $_POST['bg'];
    $ad   = $_POST['add'];
    $c   = $_POST['contact'];
	$d   = $_POST['date']; 
    $res  = mysqli_query($conn,"update patientreg set name='$n',age=$a,sex='$g',bloodgroup='$b',address='$ad',contactno=$c,dateofad='$d' where id='$i'");
        echo "<meta http-equiv='refresh' content='0;url=viewpatient.php'>";  
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
<form action="editpatient.php" method="POST">
<h2>Edit</h2> 
NAME: <input type="text" name="id" value="<?php echo $row1[0]; ?>"><br />
NAME: <input type="text" name="name" value="<?php echo $row1[1]; ?>"><br />
AGE: <input type="text" name="age" value="<?php echo $row1[2]; ?>"><br />
GENTER: <input type="text" name="genter" value="<?php echo $row1[3]; ?>"><br />
BLOOD GROUP: <input type="text" name="bg" value="<?php echo $row1[4]; ?>"><br />
ADDRESS: <input type="text" name="add" value="<?php echo $row1[5]; ?>"><br />
CONTACT: <input type="text" name="contact" value="<?php echo $row1[6]; ?>"><br />
DATE OF ADMISSION: <input type="date" name="date" value="<?php echo $row1[7]; ?>"><br />
<input type="submit" name="submit" value=" Update "> 
</form> 