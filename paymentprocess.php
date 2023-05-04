<?php
include 'connection.php';
session_start();

//Gather details submitted from the $_POST array and store in local vars
if (isset($_POST['submit'])){
    if(empty($_POST['amount'])){
        $errors['amount']='Please enter the amount!';
    } 
    
    else if (empty($_POST['txtPass'])){
        $errors['txtPass']='Please enter the password!';
    }
    else{
        $amount=$_POST['amount'];
        $password =$_POST['txtPass'];
    } 
}

//build query to SELECT records from the users table WHERE
//the username AND password in the table are equal to those entered.
$query = "SELECT * FROM loginArtist userPassword='$password'";

$result = mysqli_query($connection, $query);

if ($row = mysqli_fetch_assoc($result)) {
    echo '<script>alert("Payment Successful!")</script>';
    header ('location:successfulpayment.php');
} 
else {
    echo '<script>alert("Payment Unsuccessful! Try Again!")</script>';
    header ('location:payment.php');
}

?>