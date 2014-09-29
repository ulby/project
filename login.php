<?php 
include("front/connect.php");
session_start();		
if ($_GET['login']) {
     // Only load the code below if the GET
     // variable 'login' is set. You will
     // set this when you submit the form
	 $passID = mysql_query("select pass from login");
	 $pass = mysql_result($passID,0);
	 $userID = mysql_query("select user from login");
	 $user = mysql_result($userID,0);
	 $passinput = $_POST['password'];
	 $hash = md5($passinput);
     if ($_POST['username'] == $user
         && $hash == $pass) {
 
         $_SESSION['loggedin'] = 1;
          // Set session variable
 
         header("Location: admin.php");
         exit;
         // Redirect to a protected page
 
     } else echo "Wrong details";
     // Otherwise, echo the error message
 
}
 
?>
Log in:
<form action="?login=1" method="post">
Username: <input type="text" name="username" />
Password: <input type="password" name="password" />
<input type="submit" />
</form>