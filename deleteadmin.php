<?php
session_start();
include("connection.php");
$N=$_SESSION['admin'];
$row1=null; 
if( isset($_GET['admin']) )  
{  
$admin = $_GET['admin'];
$res= mysqli_query($conn,"select*from adminlogin where admin='$admin'");  
$row1= mysqli_fetch_array($res); 
$r1 = implode(',',$row1); 
} 
if(isset($_POST['submit']))
{
    
			$u=$_POST['admin'];
			$p=$_POST['dadmin'];
			$r=$_POST['dp'];
			$query="select * from adminlogin where admin='$p' and password='$r'";
			$results=mysqli_query($conn,$query);
			$count=mysqli_num_rows($results);
					
if($count)
			{ 
                        $_SESSION['admin']=$p;
                        $r=mysqli_fetch_row(mysqli_query($conn,"select*from adminlogin where admin='$u'"));
						if(!empty($r))
						{
                         mysqli_query($conn,"delete from adminlogin where admin='$u'");
                         echo "<script>alert('Successfully Removed Admin');window.location.href='viewadmin.php';</script>";
						}
						else
						{
                            echo "<script>alert('Error!!');window.location.href='viewadmin.php';</script>";
						}
						mysqli_close($conn);
					
						
			}
			else
			{
                		echo "<script>alert('You are not permitted to delete the admin');window.location.href='viewadmin.php';</script>";
			}
}
?>

<html>
<head>
<title>delete admin</title>
<style>
    body { 
        margin: 0; 
        padding: 0; 
        font-family: sans-serif; 
        background: url() no-repeat; 
        background-size: cover; 
    } 
  
    .login-box { 
        width: 280px; 
        position: absolute; 
        top: 50%; 
        left: 50%; 
        transform: translate(-50%, -50%); 
        color: ; 
    } 
  
    .login-box h1 { 
        float: left; 
        font-size: 40px; 
  
        border-bottom: 4px solid #191970; 
        margin-bottom: 50px; 
        padding: 13px; 
    } 
  
    .textbox { 
        width: 100%; 
        overflow: hidden; 
        font-size: 20px; 
        padding: 8px 0; 
        margin: 8px 0; 
        border-bottom: 1px solid #191970; 
    } 
  
    .fa { 
        width: px; 
        float: left; 
        text-align: center; 
    } 
  
    .textbox input { 
        border: none; 
        outline: none; 
        background: none; 
  
        font-size: 18px; 
        float: left; 
        margin: 0 10px; 
    } 
  
    .button { 
        width: 100%; 
        padding: 8px; 
        color: #ffffff; 
        background: none #191970; 
        border: none; 
        border-radius: 6px; 
        font-size: 18px; 
        cursor: pointer; 
        margin: 12px 0; 
    } 
.login-box h1 { 
        float: left; 
        font-size: 40px; 
  
        border-bottom: 4px solid #191970; 
        margin-bottom: 50px; 
        padding: 13px; 
    }

</style>

</head>
<body>
<form action='deleteadmin.php' method='post'>

<div class="login-box">
	<h1>Delete admin</h1>
	<div class='textbox'>
    <input type='text' name='admin' placeholder='Admin' value='<?php echo $row1[0]; ?>'>
	</div>
	<div class='textbox'>
    	<input type='text' name='dadmin' placeholder='Current admin'>
	</div>
	<div class='textbox'>
		<input type='password' name='dp' placeholder='Current admin password'>
	</div>
	<input class='button' type='submit' name='submit' value='Delete'>
</div>
</form>
</body>
</html>
