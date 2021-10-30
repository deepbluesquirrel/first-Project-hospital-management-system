<?php
session_start();
include ('connection.php');
$N=$_SESSION['admin'];
if(empty($N))
{
  exit(header('location:loginpage.php'));
}
?>
<HTML>
<HEAD>
<TITLE>Admin logged in</TITLE>
<style>
img {
  border: 2px solid #drd;
  border-radius:20px;
  padding: 0px;
  width: 200px;
}
img {
  border-radius: 50%;
}
img:hover {
  box-shadow: 0 0 5px 10px rgba(0, 140, 186, 0.5);
}
img {
    float: center;
    width:  300px;
    height: 300px;
    object-fit: cover;
}
.b{
        width: 15%; 
        padding: 8px; 
        color: #ffffff; 
        background: none #191970; 
        border: none; 
        border-radius: 6px; 
        font-size: 18px; 
        cursor: pointer; 
        margin: 12px 0; 
    }
    .button{
        width: ; 
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
p{display:inline-block;}
body{
  background-image: url('https://cdn.hipwallpaper.com/i/15/72/wgMLUS.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  background-size: auto;
  background: linear-gradient(to top, silver, black);
}
img {
  opacity: 0.9;
}

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class='b'><label>Current admin : </label><?php echo"$N"?><span class="dot"></span><br><input class="button" type="button" value='Log out' onclick="location.href='logout.php'" ><i class="fa fa-sign-out"></i></div>
</HEAD>
<BODY>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="viewadmin.php"><img src="https://www.w3schools.com/howto/img_avatar.png" style="width:25%"></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;
<a href="patientmenu.php"><img src="https://www.chcrr.org/wp-content/uploads/2016/06/New-Patient-Registration.jpg" style="width:25%"></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;
<a href="staff.php"><img src="https://cached.imagescaler.hbpl.co.uk/resize/scaleWidth/743/cached.offlinehbpl.hbpl.co.uk/news/OMC/staff-20161206094148580.jpg" style="width:25%"></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;
<h2 STYLE="COLOR:black">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspADMIN SETTINGS&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPATIENT MANAGEMENT&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSTAFF DETAILS</h2>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="room.php"><img src="https://www.aai.aero/sites/default/files/passenger_info_image/Rest-Room.jpg" style="width:25%"></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;
<a href="billing.php"><img src="https://s3-prod.modernhealthcare.com/s3fs-public/NEWS_171039990_AR_0_CWWAPFRYOSRV.jpg"style="width:25%"></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;
<a href="destruction.php"><img src="https://t3.ftcdn.net/jpg/01/24/73/26/360_F_124732622_I19K6vaQK1oKgQJlHypRuBFd2eqt1Bc9.jpg"style="width:25%"></a>
<h2 STYLE="COLOR:black">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspROOM DETAILS&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspBILLING&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDESTRUCTION</h2>
</BODY>
</HTML>