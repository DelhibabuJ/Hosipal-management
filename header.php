<?php
session_start();
if(isset($_SESSION['login'])===false)
header('Location:index.php');
?>

<html>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Internship</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/navbar.css">

</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand active" href="menu.php">Internship</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="fees.php">Fees master</a></li>
      <li><a href="reg.php" name="register">Registration</a></li>
      <li><a href="labbilling.php" name="labbilling">Lab billing</a></li>
      
      <li><a href="report.php" name="labbilling">Report</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
</body>
</html>