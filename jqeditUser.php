<?php
require_once("dbConnection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contactDetail = $_POST['contactDetail'];
    $password = $_POST['password'];
    $pay_date = $_POST['pay_date'];
    $pay =$_POST['status'];
    $user_id = $_POST['uid'];
    $transaction_id = $_POST['transaction_id'];
    $address =$_POST['address'];
    $istatus =$_POST['istatus'];
    $sql = "UPDATE users SET name='$name', username='$username', email='$email', contact_number='$contactDetail', password='$password',address='$address',istatus='$istatus' WHERE id=$user_id";
    if ($mysqli->query($sql) === TRUE) {
        echo "User information updated successfully.";
    } else {
        echo "Error updating user information: " . $mysqli->error;
    }
}
$mysqli->close();
?>
