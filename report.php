<?php
include 'connection.php';
include 'header.php';
if(isset($_POST['submit']))
{
    $date=mysqli_escape_string($conn,$_POST['date']);
    if($date!==''){
    $convDate= DateTime::createFromFormat('Y-m-d',$date)->format('d/m/Y');
    
    $query="select distinct(Billno),Pid,Pname,Page,Pgender,Pnumber from labbilling where BillDate='$convDate'";
    $result=mysqli_query($conn,$query);
    }
}
?>


<html>
<head>
<title>Report</title>

<meta name="viewport" content="width=device-width,initital-scale=1">
<link rel="stylesheet" href="css/Report.css">
</head>
<body>
<form method="POST" action="">
<table class="center">
<div class="rep">
<tr>
<th>Select Date</th>
<td><input type="date" name="date" required/></td>
<div class="sub">
<td><input type="submit" name="submit">
</div>
    </td>
</tr>
</table>
<table class="center" border = "2" bordercolor="white" width="50%" height="5%" id="tblFees">
</br>
<thead>
<tr>
<td>
Bill Number
</td>

<td>
PatientID
</td>
<td>
Patient name
</td>
<td>
Patient age
</td>

<td>
    Patient gender
    </td>

    <td>
    Patient Mobile Number
    </td>
</tr>
</div>
</thead>
<tbody>
<?php
if(isset($result))
{
    while($row=mysqli_fetch_assoc($result))
    {
        echo '<tr><td>'.$row['Billno'].'</td><td>'.$row['Pid'].'</td><td>'.$row['Pname'].'</td> <td>'.$row['Page'].'</td><td>'.$row['Pgender'].'</td><td>'.$row['Pnumber'].'</td></tr>';
    }
}
?>
</tbody>
</table>
</form>
</body>
</html>