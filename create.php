<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pdo_toets";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO pizza (id, bodemformaat, saus, pizzatopings, kruiden)
  VALUES (:id, :bodemformaat, :saus, :pizzatoppings, :kruiden)");
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':bodemformaat', $bodemformaat);
  $stmt->bindParam(':saus', $saus);
  $stmt->bindParam(':pizzatopings', $pizzatopings);
  $stmt->bindParam(':kruiden', $kruiden);

  // insert a row
  $id = NULL;
  $bodemformaat = $_POST["bodemformaat"];
  $saus = $_POST["saus"];
  $pizzatopings = $_POST["pizzatopings"];
  $kruiden3 = $_POST["kruiden"];
  $stmt->execute();


  echo "New records created successfully";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>