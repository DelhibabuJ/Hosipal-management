<?php
include 'header.php';

if(isset($_POST['submit']))
{
    include 'connection.php';
    $patient=mysqli_real_escape_string($conn,$_POST['fn']);
    $salutations=mysqli_real_escape_string($conn,$_POST['salutation']);
    
    $age=mysqli_real_escape_string($conn,$_POST['age']);
    $gender=mysqli_real_escape_string($conn,$_POST['gender']);
    $mobile=mysqli_real_escape_string($conn,$_POST['mobile']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $address=mysqli_real_escape_string($conn,$_POST['address']);
    $dob=mysqli_real_escape_string($conn,$_POST['date']);
    $doctor=mysqli_real_escape_string($conn,$_POST['doctor']);
//insert into table (column1,column2) values ('value1','value2');
    $query="insert into regtable (PatientName,Salutations,Age,Gender,Mobile,Email,Address,Dob,Doctor) 
    values ('$patient','$salutations','$age','$gender','$mobile','$email','$address','$dob','$doctor')";

    $result=mysqli_query($conn,$query);
    if($result)
    {
    $query="select Max(Patientid) from regtable";
    $result=mysqli_query($conn,$query);
    $id=mysqli_fetch_row($result)[0];
    echo "<script>localStorage.setItem('id',$id);window.location='labbilling.php'</script>";
    }
    else
    echo mysqli_error($conn);
}
?>
<html>
<head>
<title>
Registration form
</title>
<meta name="viewport" content="width=device-width,initital-scale=1">
<link rel="stylesheet" href="css/Registration.css">
</head>

<body>
<div class="loginbox">
<form method="POST" action="">
<h2>Patient registration</h2></br>
<table  >
<tr>
<th>Salutations</th>
<td>
<select name="salutation" required>
<option value="" selected="selected" disabled="disabled">Select Salutation</option>
<option value="1">Mr</option>
<option value="2">Ms</option>

<option value="3">Mrs</option>

<option value="4">Baby</option>

<option value="5">Childern</option>
</select>
</td>
</tr>
<tr>
<tr>
<th>Patient name</th>
<td><input type="text" name="fn" id="fn1"  title="enter your name" placeholder="enter your name" required/></td>
</tr>
<tr>

<th>Age</th>
<td><input type="number" name="age" placeholder="enter your age" required/></td>
<th>Gender</th>
<td>
<select name="gender" required>
<option value="" selected="selected" disabled="disabled">Select gender</option>
<option value="1">Male</option>
<option value="2">Female</option>
</select>
</td>
</tr>

<tr>
<th>Enter your mobile</th>
<td><input type="number" name="mobile" placeholder="enter your number" required/></td>
</tr>
<tr>
<tr>
<th>Enter your email</th>
<td><input type="email" name="email" placeholder="enter your email" required/></td>
</tr>
<tr>
<th>Select your DOB</th>
<td><input type="date" name="date"/></td>
</tr>
<tr>
<th>Enter your address</th>
<td><textarea rows="8" cols="20" name="address"></textarea></td>
</tr>
<tr>
<th>Consultant</th>
<td>
<select name="doctor">
<option value="" selected="selected" disabled="disabled">Select</option>
<option value="1">Demo Doctor</option>
</select>
</td>
</tr>

<td colspan="2" align="center"><input type="submit" name="submit" value="Save "/>
<input type="reset" value="Reset"/><input type="button" value="View patients"/>
</td>
</tr>
</table>
</form>
</div>
</body>
</html>