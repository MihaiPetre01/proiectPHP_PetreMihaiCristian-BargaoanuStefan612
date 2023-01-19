<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['register_editura'])) {
    // Get the name and password from the form
    $name = $_POST['name'];
    $sql = "INSERT INTO editura (name) VALUES ('$name')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<form method="post" action="addbook.php">
  <label>Nume editura:</label>
  <input type="text" id="name" name="name" required>
  <input type="submit" name="register_editura" value="Adauga">
</form>

<?php
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['register_authors'])) {
    // Get the name and password from the form
    $name = $_POST['name'];
    $sql = "INSERT INTO authors (name) VALUES ('$name')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<form method="post" action="addbook.php">
  <label>Nume autor:</label>
  <input type="text" id="name" name="name" required>
  <input type="submit" name="register_authors" value="Adauga">
</form>

<?php
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['register_category'])) {
    // Get the name and password from the form
    $name = $_POST['name'];
    $sql = "INSERT INTO category (name) VALUES ('$name')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<form method="post" action="addbook.php">
  <label>Nume categorie:</label>
  <input type="text" id="name" name="name" required>
  <input type="submit" name="register_category" value="Adauga">
</form>

