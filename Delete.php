<?php
include 'connection.php';
if(isset($_GET['page']))
{
    $page=$_GET['page'];
    if($page==='fees')
    {
        $id=mysqli_escape_string($conn,$_GET['id']);
        $query=" delete from feetable where Id='$id'";
        $result= mysqli_query($conn,$query);
        if($result)
        echo '<script>alert("Deleted");window.location="fees.php";</script>';
        else
        echo 'error in deletion';

    }
}