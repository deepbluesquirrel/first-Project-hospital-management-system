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
			$u=$_POST['admin'];
			$p=$_POST['password'];
			$c=$_POST['pass'];
			if($p==$c)
			{
                $r0=mysqli_fetch_row(mysqli_query($conn,"select*from adminlogin where admin='$u'"));
				if(empty($r0))
				{
                    mysqli_query($conn,"insert into adminlogin(admin,password)values('$u','$p')");
                    echo "<script>alert('Successfully added new admin!');window.location.href='viewadmin.php';</script>";
                }
				else
				{
                    echo "<script>alert('Username already exist please try another');window.location.href='viewadmin.php';</script>";
				}
			}
			else
			{
            echo "<script>alert('Password not matching');window.location.href='viewadmin.php';</script>";
			}
			
}
?>

<html>
<head>
<title>insert admin</title>
<style>
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
 body { 
        margin: 0; 
        padding: 0; 
        font-family: sans-serif; 
        background: url() no-repeat; 
        background-size: cover; 
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
<form action='insertadmin.php' method='post'>
<div class="login-box">
<h1>Add Admin</h1>
<div class="textbox">
		<input type='text' name='admin' placeholder='Admin'>
</div>
<div class="textbox">
		<input type='password' name='password' placeholder='Password'>
</div>
<div class="textbox">
		<input type='password' name='pass' placeholder='Confirm Password'>
</div>
<input class="button" type="submit" name='submit' value="Add">
</div>
</form>
</body>
</html>
