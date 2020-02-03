<?php
session_start();
include '../../../private_html/inventoryDBlogin.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


 if(isset($_POST["username"]))
    {

        $newUsername = $_POST["username"];
        $newPassword = $_POST["password"];

        $stmt = mysqli_prepare ($conn, "SELECT * FROM Admins WHERE Username = ? &&  Password = ?");
        mysqli_stmt_bind_param ($stmt,'ss', $newUsername, $newPassword);
        mysqli_stmt_execute ($stmt);

        if(mysqli_stmt_fetch ($stmt)==true)
        {

            $_SESSION["username"] = $newUsername;

        header('Location:productspage.php');
        exit();
           }
        }        else
                {
               echo "The username or password are incorrect!";
                header('Location:index.html');
                }
        $conn->close();
        ?>
