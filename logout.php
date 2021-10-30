<?php  
session_start();//session is a way to store information (in variables) to be used across multiple pages.  
session_destroy();  
echo "<script>alert('Logging out');window.location.href='loginpage.php';</script>";//use for the redirection to some page 
?>