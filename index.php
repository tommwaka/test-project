<?php
session_start();
include('connect_db.php');
if(isset($_POST['submit']))
{
$uname=$_POST['username'];
$password=$_POST['password'];
$sql ="SELECT username,password FROM admin WHERE username=:uname and password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'admin.php'; </script>";
} else{

	echo "<script>alert('Invalid Details');</script>";

}

}

?>
<!DOCTYPE html>
<html>
<head>
<title>Pharmacy Sys</title>
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="includes/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="includes/css/main.css" rel="stylesheet" type="text/css" />
<style>
#content {
height: auto;
}
#main{
height: auto;}
</style>
 
</head>
<body>
<div id="content">
<div id="header">
<h1><img src="images/logo.jpg"><i><h2>Pharmcare Sys</h2></i></h1>
</div>
<div id="main">

  <section class="container">

     <div class="login">
	 <img src="images/logo.jpg">
      <h1>Login here</h1>
	  
      <form method="POST" action=" ">
      
		 <p><input type="text" name="username" value="" placeholder="Username"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
		
        <p class="submit"><input type="submit" name="submit" value="Login"></p>
      </form>
    </div>
    </section>
</div>
<div id="footer" align="Center"> life is good</div>
</div>
</body>
</html>

