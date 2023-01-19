<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['register'])) {
    // Get the name and password from the form
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Hash the password for security
    //$password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the name and hashed password into the database
    $sql = "INSERT INTO users (name, password) VALUES ('$name', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the connection
mysqli_close($conn);
?>

<form method="post" action="register.php">
  <label>Name:</label>
  <input type="text" id="name" name="name" required>
  
  <label>Password:</label>
  <input type="password" id="password" name="password" required>
  
  <input type="submit" name="register" value="Register">
</form>

<form action="login.php">
    <input type="submit" value="Go back to login">
</form>