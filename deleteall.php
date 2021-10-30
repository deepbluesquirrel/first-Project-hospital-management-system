<?php
session_start();
include("connection.php");
if(isset($_POST['submit']))
{
  $p1=$_POST['password1'];
  $p2=$_POST['password2'];
  $p3=$p1+$p2;
  if($p3==9841)
  {
    mysqli_query($conn,"delete from bigreg");
    mysqli_query($conn,"delete from casroom");
    mysqli_query($conn,"delete from casualty");
    mysqli_query($conn,"delete from deletetable");
    mysqli_query($conn,"delete from general");
    mysqli_query($conn,"delete from groom");
    mysqli_query($conn,"delete from icu");
    mysqli_query($conn,"delete from icuroom");
    mysqli_query($conn,"delete from patientreg");
    mysqli_query($conn,"delete from vip");
    mysqli_query($conn,"delete from vroom");
    mysqli_query($conn,"delete from ward");
    mysqli_query($conn,"delete from wroom");
    
      echo "<script>alert('Successfully All data');window.location.href='loginpage.php';</script>";?></div><?php
    
  }
  else
  {
    session_destroy();  
    echo "<script>alert('Unauthorised access detected , Logging out');window.location.href='loginpage.php';</script>";//use for the redirection to some page 
  }

}
?>
<!DOCTYPE html>
<html>
 <head>
 <link rel="stylesheet" href= 
"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <link rel="stylesheet" href="login.css">
<style> 
<style> 
body { 
        margin: 0; 
        padding: 0; 
        font-family: sans-serif; 
        /background: url() no-repeat; 
        background-size: cover; 
    } 
    body{
  background-image: url('https://image.freepik.com/free-photo/concrete-wall-spot-light-3d-render-background_35906-37.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  background-size:;
}
  
    .login-box { 
        width: 280px;
        background:;
        position: absolute; 
        top: 50%; 
        left: 50%; 
        transform: translate(-50%, -50%); 
        border-radius: 5%;
       
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
        float: auto; 
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
</style>
 </head>
 <body>
  <form action='deleteall.php' method='post'>

 <?php
 if(isset($err_m))
 {
 echo $err_m;
 }
 ?>

 <br>

 <div class="login-box">
	<img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" style="width:120px">  
            <h1>Login</h1> 
  
            <div class="textbox"> 
                <i class="fa fa-lock" aria-hidden="true"></i> 
                <input type="password" placeholder="Key 1"name="password1" value=""> 
            </div> 
            <div class="textbox"> 
                <i class="fa fa-lock" aria-hidden="true"></i> 
                <input type="password" placeholder="Key 2"name="password2" value=""> 
            </div>
  
            <input class="button" type="submit"name='submit' value="Log In"> 
        </div> 
 </form>
</div>      
 </form>
 </body>
 </html>
