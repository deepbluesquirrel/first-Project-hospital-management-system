<?php
session_start();
include("connection.php");
if(isset($_POST['submit']))
{
			$u1=$_POST['admin1'];
            $p1=$_POST['password1'];
            
			$u2=$_POST['admin2'];
			$p2=$_POST['password2'];
            $query1="select * from adminlogin where admin='$u1'and password='$p1'";
            $query2="select * from adminlogin where admin='$u2' and password='$p2'";
            $results1=mysqli_query($conn,$query1);
            $results2=mysqli_query($conn,$query2);
            $count1=mysqli_num_rows($results1);
            $count2=mysqli_num_rows($results2);
					
if($count1 && $count2)
			{ 
						echo "<script>alert('Admin login Completed....Admins:[".$u1."][".$u2."]');window.location.href='deleteall.php';</script>";
			}
			else
			{
                
                session_destroy();  
                echo "<script>alert('Unauthorised access detected , Logging out');window.location.href='loginpage.php';</script>";//use for the redirection to some page 
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
    body { 
        margin: 0; 
        padding: 0; 
        font-family: sans-serif; 
        background: url() no-repeat; 
        background-size: cover; 
    } 
    body{
  background-image: url('https://image.freepik.com/free-photo/concrete-wall-spot-light-3d-render-background_35906-37.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  background-size: ;
}
  
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
  		color:white;
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
</style>
 </head>
 <body>
 <form action='destruction.php' method='post'>


 <br>

 <div class="login-box">
	<img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" style="width:120px">  
    <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" style="width:120px">  
            <h2>Destruction</h2> 
  
            <div class="textbox"> 
		
		<i class="fa fa-user" aria-hidden="true"></i> 
                <i class="fa fa-user" aria-hidden="true"></i> 
                <input type="text" placeholder="Admin 1"
                         name="admin1" value=""> 
            </div> 
  
            <div class="textbox"> 
                <i class="fa fa-lock" aria-hidden="true"></i> 
                <input type="password" placeholder="Password 1"
                         name="password1" value=""> 
            </div> 
            <div class="textbox"> 
		
		<i class="fa fa-user" aria-hidden="true"></i> 
                <i class="fa fa-user" aria-hidden="true"></i> 
                <input type="text" placeholder="Admin 2"
                         name="admin2" value=""> 
            </div> 
  
            <div class="textbox"> 
                <i class="fa fa-lock" aria-hidden="true"></i> 
                <input type="password" placeholder="Password 2"
                         name="password2" value=""> 
            </div>
  
            <input class="button" type="submit"
                     name='submit' value="Sign In"> 
        </div> 
 </form>
 </body>
 </html>