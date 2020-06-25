<?php
include 'connection.php';
include 'header.php';
if(!isset($_GET['id']))
header('Location:fees.php');
$id=mysqli_escape_string($conn,$_GET['id']);

if(isset($_POST['submit']))
{
    $category=mysqli_escape_string($conn,$_POST['category']);
    
    $feestype=mysqli_escape_string($conn,$_POST['feestype']);
    $fees=mysqli_escape_string($conn,$_POST['fees']);
    $query=" update feetable set Category='$category',FeesType='$feestype',Fees='$fees' where Id='$id'" ;
    $result= mysqli_query($conn,$query);
    if($result)
    header('Location:fees.php');
    else
    echo 'error in updation';
}

$query=" select Category,FeesType,Fees from feetable where Id='$id' ";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)<1)
header('Location:fees.php');
else $row=mysqli_fetch_row($result);
?>
<html>
<head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/feestyle.css">;
</head>
<body>
<form method="POST" action="">
    <h1>Fees Master</h1>
	<div class="styling">
    <div class="row">
    <table>
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
                
            <input type="text" name="category" value="<?=$row[0]?>">
            </td>
            <td>
                
            <input type="text" name="feestype" value="<?=$row[1]?>">
            </td>
            <td>
                <input type="text" name="fees" value="<?=$row[2]?>">
            </td>
        </tr>
        <tr>
            <td>
        <input type="submit" name="submit">
                </td>
        </tr>
    </table>
</div>
</div>
</form>
</body>
</html