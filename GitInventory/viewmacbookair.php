<?php

session_start();

echo "Logged in as:" . $_SESSION["username"] . ".<br>";


?>
<a href="logout.php"> Click here to logout </a><br><br><br>
<a href="productspage.php"> Click here to go back to the Products page </a><br><br><br>

<!DOCTYPE html>
<html lang="en">
<head>
<img src="macbookair.jpeg" alt="Apple Macbook Air" width="100" height="100">

<p>Macbook Air Inventory</p>
<h2>Edit Stock</h2>
<p>Type out your new quantity of this product below.</p>

<form action="editmacbookair.php" method = "post">
  <textarea name="message" rows="3" cols="5"></textarea>
  <br>
  <input type="submit">
</form>


<div id="wrapper">

<h1>Inventory</h1>
<br>
<!DOCTYPE html>
<html>
<body>
<style> table, th, td { border: 1px solid black; } </style>



<?php

include '../../../private_html/inventoryDBlogin.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
{
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Stock_Key, Creation, Quantity FROM `Macbook Air`";
$result = $conn-> query ($sql);

if ($result->num_rows > 0)
{
while($row = $result->fetch_assoc ())
{
echo "<table><h3>Stock #" .$row["Stock_Key"]. "</h3>";
echo "<tr><td> <h4>Date:</h4>" . $row["Creation"]. "</td>" .  "<td> <h4>Quantity:</h4>" . $row["Quantity"]. "</td></tr>";
echo "</table>" . "<br>";

}
}
else
{
echo "0 results";
}

$conn->close();

?>
</div>
</body>
</html>
