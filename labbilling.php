<?php
include 'connection.php';
include 'header.php';

if(!empty($_POST))
{
  $billNo=1;
  $billnoQuery =" select MAX(Billno) from labbilling";
  $result=mysqli_query($conn,$billnoQuery);
  if(mysqli_num_rows($result)>0)
  $billNo=mysqli_fetch_row($result)[0]+1;

  $id=mysqli_escape_string($conn,$_POST['patientid']);
  $name=mysqli_escape_string($conn,$_POST['pname']);
  $age=mysqli_escape_string($conn,$_POST['page']);
  $gender=mysqli_escape_string($conn,$_POST['gender']);
  $number=mysqli_escape_string($conn,$_POST['pno']);
  $consultant=mysqli_escape_string($conn,$_POST['consultant']);
  $total=mysqli_escape_string($conn,$_POST['total']);

  
  $values=json_decode($_POST['hidValues']);
// var_dump($values);
$dbValues=[];
$date=date('d/m/Y');
  foreach($values as $val){
  $category=mysqli_escape_string($conn,$val[0]);
  
  $feestype=mysqli_escape_string($conn,$val[1]);
  
  $fees=mysqli_escape_string($conn,$val[2]);
$dbValues[]="($id,'$age','$name','$gender','$number','$consultant','$total','$category','$feestype','$fees',$billNo,'$date')";
  }
  $query=" insert into labbilling (Pid,Page,Pname,Pgender,Pnumber,Pconsultant,Total,Category,Feestype,Fees,Billno,BillDate) values ".implode(',',$dbValues);
  $result2=mysqli_query($conn,$query);
  if($result2)
  
  echo '<script>alert("success");</script>';
  else
  echo mysqli_error($conn);


  // insert into tblName (colName)values(),()
}

$query="select PatientId from regtable order by PatientId desc";
$result=mysqli_query($conn,$query);

$query2="select Feestype from feetable";
$result2=mysqli_query($conn,$query2);
$feesType=[];
while($type=mysqli_fetch_assoc($result2))
$feesType[]=$type['Feestype'];
?>

<html>
<head>
<title>
lab billing
</title>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
var feesTypes=<?php echo json_encode($feesType)?>;
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="css/billing.css">
<script src="js/Billing.js"></script>
</head>
<body>
<form id="frmBill" method="POST" action="">

<div class="styleone">
<table >
<th>Patient details</th></br>
</br>

<tr>
<td>
Patient ID
</td>
<td>
<select name="patientid" id="ddlID" onchange="GetPatientDetails()" required>
<option value=""> Select</option>

<?php
while($row=mysqli_fetch_assoc($result))
echo '<option value="'.$row["PatientId"].'">'.$row['PatientId'].'</option>';
?>>
</select>
</td>
<td>
Patient Name
</td>
<td>
<input type="text" name="pname" id="txtPtName">
</td>
<td>
Age
</td>
<td>
<input type="number" name="page" id="txtPtAge">
</td>
<td>
Gender
</td>
<td>
<select name="gender" id="txtPtGender" >
<option value="">Select</option>
<option value=1>Male</option>
<option value=2>Female</option>
</select>
</tr>
<tr>
<td>
Patient Mobile
</td>
<td>
<input type="text" name="pno" id="txtPtMobile">
</td>
<td>
Consultant
</td>
<td>
<select name="consultant" id="txtPtConsultant">
<option value="">Select</option>
<option value=1>Demo Doctor</option>
</select>
</td>
</tr>
</div>
</table>
</div>
<div class="styletwo">
<table>
<th>Bill Details</th>
</br>
<tr>
<td>
TestName:
</td>
<td>
Fees
</td>
</tr>
<tr>
<td>
<input type="hidden" id="hidCategory">
<input type="text" name="testname" id="txtFeesType" onkeyup="GetFees(event)">
</td>
<td>
<input type="number" name="fees" id="txtFees" onkeyup="AddFees(event)">
</td>
</tr>
</table>
<div style="max-height:200px;min-height:200px;">
<table border = "2" bordercolor="white" width="50%" height="5%" id="tblFees">
</br>
<thead>
<tr>
<td>
Category
</td>

<td>
Fees Type
</td>
<td>
Fees
</td>
</tr>
</thead>
<tbody>

</tbody>
</table>
</div>
</table>
</div>
<input type="hidden" id="hidRowCount">
<input type="hidden" id="hidValues" name="hidValues">
</table>
<table width="100%" >

  <tr>
      <td class="right"><input type="number" name="total" placeholder="Total" id="txtTotal"/></td>
  </tr>
</table>
<div class="container">
<div class="row">
<div class="col">
<input type="submit" value="Save" name="submit1">
</div>
</div>
</div>
</div>
</form>
</body>
</html>