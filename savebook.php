<?php
  // Connect to the database
  $conn = new mysqli("localhost", "root", "", "library");
  

  // Get the posted data
 $authorId = $_POST["author_id"];
$categoryId = $_POST["category_id"];
$edituraId = $_POST["editura_id"];
$bookName = $_POST["book_name"];

 // Test if data is being received correctly
  echo "Author ID: " . $authorId . "<br>";
  echo "Category ID: " . $categoryId . "<br>";
  echo "Editura ID: " . $edituraId . "<br>";
  echo "Book Name: " . $bookName . "<br>";
  

  // Prepare and bind the SQL statement
  $stmt = $conn->prepare("INSERT INTO books (id_author, id_category, id_editura, name) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("iiis", $authorId, $categoryId, $edituraId, $bookName);
  echo "test";

  // Execute the statement
  $stmt->execute();

  // Get the number of affected rows
  $affectedRows = $stmt->affected_rows;

  // Close the statement
  $stmt->close();

  // Close the connection
  $conn->close();

  // Return the number of affected rows
  echo $affectedRows;
?>