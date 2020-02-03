<?php
//session_start ();
include '../../../private_html/inventoryDBlogin.php';

$newQuantity = $_POST["message"];
$newDate = date("Y-m-d");
$_SESSION["username"] = $newUsername;

echo "Logged in as:" . $_SESSION["username"] .".<br>";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `Macbook Air` (Quantity, Creation)
VALUES ('$newQuantity','$newDate')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: viewmacbookair.php');

?>
