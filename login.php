<?php

//start session
session_start();

//connect to database
$conn = mysqli_connect('localhost', 'root', '', 'library');

//check connection
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

$show_register_button = false;

//check for form submission
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $password = $_POST['password'];

    //query to check if name and password match
    $query = "SELECT * FROM users WHERE name = '$name' AND password = '$password'";
    $result = mysqli_query($conn, $query);
	if (!$result) {
    die("Query failed: " . $conn->error);
}

    //check if there is a matching name and password
    if(mysqli_num_rows($result) > 0){
        //start a session
        $_SESSION['name'] = $name;
if (!$result) {
    die("Query failed: " . $conn->error);
}
        //redirect to homepage
        header("Location: homepage.php");
    }else{
        echo "Incorrect name or password";
        $show_register_button = true;
    }
}

?>

<form method="post" action="login.php">
    Name: <input type="text" name="name">
    Password: <input type="password" name="password">
    <input type="submit" name="submit" value="Login">
    <?php if($show_register_button): ?>
    <a href="register.php">Don't have an account? Register</a>
    <?php endif; ?>
</form>