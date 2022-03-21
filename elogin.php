<?php
session_start();
include 'dbh.php';
if(isset($_POST['elogin'])){
session_start();


$username=$_POST['username']; // Get username
$password=$_POST['password']; // get password

//query for match  the user inputs
$ret=mysqli_query($con,"SELECT * FROM login WHERE userName='$username'  and password='$password'");
$num=mysqli_fetch_array($ret);

// if user inputs match if condition will runn
if($num>0){
	$_SESSION['login']=$username; // hold the user name in session
	$_SESSION['id']=$num['id']; // hold the user id in session
	$uip=$_SERVER['REMOTE_ADDR']; // get the user ip
	// query for inser user log in to data base
	mysqli_query($con,"insert into userlog(userId,username,userIp) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip')");
	// code redirect the page after login
	$extra="eloginwel.php";
	$host=$_SERVER['HTTP_HOST'];
	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("location:http://$host$uri/$extra");
	exit();
}
// If the userinput no matched with database else condition will run
else{
	$_SESSION['msg']="Invalid username or password";
	$extra="elogin.php";
	$host  = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("location:http://$host$uri/$extra");
exit();
 }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In | Tapau Food</title>
	<link rel="stylesheet" type="text/css" href="stylelogin.css">
</head>
<body>
	<header>
		<nav>
			<h1>TapauFood</h1>
			<ul id="navli">
				<li><a class="homeblack" href="index.html">HOME</a></li>
				<li><a class="homered" href="elogin.php">Employee Login</a></li>
				<li><a class="homeblack" href="alogin.html">Admin Login</a></li>
				
			</ul>
		</nav>
	</header>
	<div class="divider"></div>

	<div class="loginbox">
    <img src="assets/employee.png" class="avatar">
        <h1>Login Here</h1>
        <form action="process/eprocess.php" method="POST">
            <p>Email</p>
            <input type="text" name="mailuid" placeholder="Enter Email Address" required="required">
            <p>Password</p>
            <input type="password" name="pwd" placeholder="Enter Password" required="required">
            <input type="submit" name="login-submit" value="Login">
           
        </form>
        
    </div>
			
			
</body>
</html>