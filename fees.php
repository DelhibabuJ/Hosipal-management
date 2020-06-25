<?php
include 'connection.php';
include 'header.php';
if(isset($_POST['submit']))
{
   
    $category=mysqli_escape_string($conn,$_POST['category']);
    $feestype=mysqli_escape_string($conn,$_POST['feestype']);
    $fees=mysqli_escape_string($conn,$_POST['fees']);
    $qurey="insert into feetable (Category,Feestype,Fees) 
    values ('$category','$feestype','$fees')";
    $result=mysqli_query($conn,$qurey);
    if($result)
    echo 'Success';
    else
    echo mysqli_error($conn);
}
$query="select ID,Category,Feestype,Fees from feetable";
$result=mysqli_query($conn,$query);
?>



<html>
<head>
<title>
fees</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/feestyle.css">;
</head>
<body>
    <form method="POST" action="">
    <h1>Fees Master</h1>
	<div class="styling">
    <div class="row">
    <table border = "2"  width="50%" height="5%">
</br>
</br>
<h3>Fees Master</h3>
        
        <tr>
            <td>
                Category
            </td>
            <td>
                Fees type
            </td>
            <td>
                Fees
            </td>
        </tr>
        <tr>
            <td>
                
            <input type="text" name="category">
            </td>
            <td>
                
            <input type="text" name="feestype">
            </td>
            <td>
                <input type="text" name="fees">
            </td>
        </tr>
        <tr>
            <td>
        <input type="submit" name="submit">
        <input type="reset" name="reset">
                </td>
        </tr>
    </table>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
<div class="row offset-lg-1">
<div class="col-lg-6 col-12">
<div class="table-responsive">
<table  class="table table-bordered" >
<thead>
<tr>
<th>Category</th>
<th>Fees Type</th>
<th>Fees</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody>
<?php
while($row=mysqli_fetch_assoc($result))
echo '<tr><td>'.$row['Category'].'</td><td>'.$row['Feestype'].'</td><td>'.$row['Fees'].'</td>
<td>
<a href="Update.php?id='.$row['ID'].'" class="btn btn-edit"><i class="fa fa-edit"></i></a>
</td>
<td>

<a href="Delete.php?page=fees&id='.$row['ID'].'" class="btn btn-danger"><i class="fa fa-trash"></i></a>
</td>
</tr>';
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
<form>
</body>
</html>