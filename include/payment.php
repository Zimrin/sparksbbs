<!DOCTYPE html>
<html lang="en">
<head>
    <title>reciever</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>body {
    background-size: cover;
    height: 100%;
    width: 100%;
    background-repeat: no-repeat;
    background-attachment: fixed;
    }</style>
</head>
<body>

<?php
include 'navhome.php';
?>

<?php  
    
    include 'config.php';

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
    $sender = $_POST['patron'];
    $rec = $_POST['rec'];
    $amount = $_POST['amount'];
    }
     $query = "UPDATE customers SET Balance=(Balance-$amount) where Name='$sender';";
     $query1 = "UPDATE customers SET Balance=(Balance+$amount) where Name='$rec';";
     $query2 = "INSERT INTO transactions (patron,recipient,amount)VALUES('$sender','$rec',$amount)";

            $result=mysqli_query($sql,$query);
            $result1=mysqli_query($sql,$query1);
            $result2=mysqli_query($sql,$query2);
            echo "<script> alert('Transaction Successful')</script>";
 ;
    
?>
</body>
</html>