<?php
session_start();
include("connection.php");
if(isset($_POST['submit']))
{
			$u=$_POST['admin'];
			$p=$_POST['password'];
			$query="select * from adminlogin where admin='$u' and password='$p'";
			$results=mysqli_query($conn,$query);
			$count=mysqli_num_rows($results);
					
if($count)
			{ 
						$_SESSION['admin']=$u;
						header('Location:home.php');
			}
			else
			{
                echo "<script>alert('Incorrect username or password');window.location.href='loginpage.php';</script>";
			}
}
?>

 
 <html>
 <head>
 <link rel="stylesheet" href= 
"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <link rel="stylesheet" href="login.css">
<style> 
  
    .login-box { 
        width: 280px; 
        position: absolute; 
        top: 50%; 
        left: 50%; 
        transform: translate(-50%, -50%);
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
img {
  border-radius: 50%;
}
body{
  background-image: url('https://pbs.twimg.com/media/DtJHr1AX4AALoHM.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  background-size: ;
}

</style>
 </head>
 <body>
 <form action='loginpage.php' method='post'>

 <?php
 if(isset($err_m))
 {
 echo $err_m;
 }
 ?>

 <br>

 <div class="login-box">
	<img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" style="width:120px">  
            <h1 >Login</h1> 
  
            <div class="textbox"> 
		
		<i class="fa fa-user" aria-hidden="true"></i> 
                <i class="fa fa-user" aria-hidden="true"></i> 
                <input type="text" placeholder="Admin"
                         name="admin" value="" autocomplete='off'> 
            </div> 
  
            <div class="textbox"> 
                <i class="fa fa-lock" aria-hidden="true"></i> 
                <input type="password" placeholder="Password"
                         name="password" value=""> 
            </div> 
  
            <input class="button" type="submit"
                     name='submit' value="Sign In"> 
        </div> 
 </form>
 </body>
 </html>