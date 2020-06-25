<?php
session_start();
unset($_SESSION['login']);
if(isset($_POST['submit']))
{
    include 'connection.php';
    $userName=mysqli_real_escape_string($conn,$_POST['userName']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);

    $result=mysqli_query($conn,"select * from tblLogin where UserName='$userName' and Password='$password'");
    if(mysqli_num_rows($result)>0)
    {
        $_SESSION['login']='';
        header('Location:menu.php');
    }
    else
    echo 'Login Failed';
}
?>
<html>
<head>
<title>
Login form</title>
<link rel="stylesheet" type="text/css" href="css/login.css">
<body>
<div class="loginbox">
<img src="Images/avathar.jpg" class="avatar">
<h1>Login here</h1>
<form method="POST" action="">
<p>Username</p>
<input type="text" name="userName" placeholder="Enter Username">
<p>Password</p>
<input type="password" name="password" placeholder="Enter Password">
<input type="submit" name="submit" value="Login">
<a href="#">forget password?</a><br>
</form>
</div>
</body>
</head>
</html>